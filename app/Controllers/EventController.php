<?php
namespace App\Controllers;
use App\core\Controller;
use App\Models\Event;
use App\Middlewares\RoleMiddleware;
use App\Models\Ticket;
use App\Middlewares\AuthMiddleware;
use Exception;



class EventController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware('*', AuthMiddleware::class);
        $this->registerMiddleware('ticket', new RoleMiddleware(['participant']));
        $this->registerMiddleware('reserve', new RoleMiddleware(['participant']));

        $this->registerMiddleware('*', AuthMiddleware::class);
        $this->registerMiddleware('ticket', new RoleMiddleware(['participant']));
        $this->registerMiddleware('reserve', new RoleMiddleware(['participant']));

    }

    public function index()
    {
        $data['events'] = Event::getAllEvents();
        $this->view('Event', $data);
    }
    public function event()
    {

        $data['events'] = Event::getAllEvents();
        $this->view('Event', $data);
    }
    public function details($id)
    {
        $data['event'] = Event::getEventById($id);
        if ($data['event']) {
            $data['ticket'] = Ticket::getEventTicket($data['event']['id']);
        }
        if ($data['event']) {
            $data['ticket'] = Ticket::getEventTicket($data['event']['id']);
        }
        $this->view('detail', $data);
    }

    public function ticket()
    {
        $this->view('ticket');
    }
    public function reserve($ticketId)
    {
        $user = unserialize($_SESSION['user']);

        try {
            $user->reserveTicket($ticketId);
            $_SESSION['success'] = "Ticket reserved successfully!";
        } catch (Exception $e) {
            $_SESSION['error'] = "Failed to reserve the ticket.";
        }

        $this->redirect('ticket');
    }

}

?>