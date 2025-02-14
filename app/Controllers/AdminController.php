<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;
use App\Models\Event;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::getAllUsers();
        $this->view('manageUsers', ['users' => $users]);
    }
    public function manageUsers()
    {
        $users = User::getAllUsers();
        $this->view('manageUsers', ['users' => $users]);
    }

    public function manageEvents()
    {
        $events = Event::getAllEvents();
        $this->view('manageEvents');
    }
}


?>