<?php
namespace App\Middlewares;
use App\Core\MiddlewareInterface;


class RoleMiddleware implements MiddlewareInterface
{
    private $requiredRoles = [];
    public function __construct($requiredRoles)
    {
        $this->requiredRoles = $requiredRoles;
    }
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You must be logged in to access this page.";

            header("Location:" . ROOTURL . "/");
            exit();
        }

        $user = unserialize($_SESSION['user']);

        if (!in_array($user->getRole(), $this->requiredRoles)) {
            $_SESSION['error'] = "You do not have permission to access this page.";
            header("Location: " . ROOTURL . "/");
            exit();
        }
    }
}