<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;
use App\Models\Event;
use App\Middlewares\RoleMiddleware;

class AdminController extends Controller
{
    public function __construct(){
        $this->registerMiddleware('*', new RoleMiddleware(['admin']));
    }
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

    public function manageBan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['user_id'], $_POST['action'])) {
                $_SESSION['error'] = "Invalid request data.";
                $this->redirect('AdminController/manageUsrs');
            }

            $userId = (int) $_POST['user_id'];
            $action = $_POST['action'];

            if (!in_array($action, ['ban', 'unban'])) {
                $_SESSION['error'] = "Invalid action.";
                $this->redirect('AdminController/manageUsrs');
            }

            $admin = unserialize($_SESSION['user']);
            if ($action == 'ban') {
                $admin->banUser($userId);
            } elseif ($action == 'unban') {
                $admin->unbanUser($userId);
            }

            $_SESSION['success'] = "User has been " . ($action === 'ban' ? "banned" : "unbanned") . " successfully.";
            $this->redirect('AdminController/manageUsrs');

        }

        $this->redirect('AdminController/manageUsrs');

    }

}


?>