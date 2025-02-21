<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Middlewares\RoleMiddleware;
use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;

class OrganizerController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware('*', new RoleMiddleware(['organisateur']));
    }

    public function index()
    {
        $data['currentPage'] = 'dashboard';
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/dashboard', $data);
    }

    public function dashboard()
    {
        $data['currentPage'] = 'dashboard';
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/dashboard', $data);
    }

    public function createEvent()
    {
        $data['currentPage'] = 'createevent';
        $data['user'] = unserialize($_SESSION['user']);
        $data['categories'] = Category::getAllCategories();
        $this->view('organizer/createevent', $data);
    }

    public function profile()
    {
        $data['currentPage'] = 'profile';
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/profile', $data);
    }

    public function events()
    {
        $data['currentPage'] = 'events';
        $user = unserialize($_SESSION['user']);
        $data['user'] = $user;
        $data['events'] = Event::getEventsByOrganisateur($user->getId());
        $this->view('organizer/events', $data);
    }

    public function tickets()
    {
        $data['currentPage'] = 'tickets';
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/tickets', $data);
    }

    public function addEvent()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('OrganizerController/createEvent');
            return;
        }

        $user = unserialize($_SESSION['user']);
        $id_organisateur = $user->getId();

        $requiredFields = ['titre', 'description', 'date', 'time', 'lieu', 'prix', 'capacite', 'id_category'];
        foreach ($requiredFields as $field) {
            if (empty($_POST[$field])) {
                $_SESSION['error'] = 'All fields are required.';
                $this->redirect('OrganizerController/createEvent');
                return;
            }
        }

        $dateTime = $_POST['date'] . ' ' . $_POST['time'] . ':00';

        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = 'Event image is required.';
            $this->redirect('OrganizerController/createEvent');
            return;
        }

        $image = $_FILES['image'];
        if ($image['size'] > 5 * 1024 * 1024) {
            $_SESSION['error'] = 'Image size should not exceed 5MB';
            $this->redirect('OrganizerController/createEvent');
            return;
        }

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($image['type'], $allowedImageTypes)) {
            $_SESSION['error'] = 'Only JPG and PNG images are allowed.';
            $this->redirect('OrganizerController/createEvent');
            return;
        }

        $imageTmpName = $image['tmp_name'];
        $imageName = uniqid('event_') . basename($image['name']);
        $targetDir = APPROOT . '/storage/uploads/';
        $targetFile = $targetDir . $imageName;

        if (!move_uploaded_file($imageTmpName, $targetFile)) {
            $_SESSION['error'] = 'Error uploading image.';
            $this->redirect('OrganizerController/createEvent');
            return;
        }

        $eventData = [
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date' => $dateTime,
            'lieu' => $_POST['lieu'],
            'prix' => (float) $_POST['prix'],
            'capacite' => (int) $_POST['capacite'],
            'id_category' => $_POST['id_category']
        ];

        $event = new Event();
        $eventId = $event->addEvent($eventData, $id_organisateur, $imageName);

        if ($eventId) {
            $ticket = new Ticket('null', 'paid', (int) $_POST['capacite'], (float) $_POST['prix'], $eventId);
            $ticket->save();
            $_SESSION['success'] = 'Event created successfully!';
            $this->redirect('OrganizerController/events');
        } else {
            $_SESSION['error'] = 'Failed to create event. Please try again.';
            $this->redirect('OrganizerController/createEvent');
        }
    }
}