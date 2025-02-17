<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Middlewares\RoleMiddleware;
use App\Models\Participant;
use App\Models\Organizer;

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
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/events', $data);
    }
    public function tickets()
    {
        $data['currentPage'] = 'tickets';
        $data['user'] = unserialize($_SESSION['user']);
        $this->view('organizer/tickets', $data);
    }





}