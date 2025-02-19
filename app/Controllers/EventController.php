<?php
namespace App\Controllers;
use App\core\Controller;
use App\Models\Event;
use App\Middlewares\RoleMiddleware;
use App\Middlewares\AuthMiddleware;



class EventController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware('*', new AuthMiddleware());
        $this->registerMiddleware('ticket', AuthMiddleware::class);
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
        $this->view('detail', $data);
    }

    public function ticket()
    {
        $this->view('ticket');
    }
}

?>