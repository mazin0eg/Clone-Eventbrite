<?php
namespace App\Middlewares;
use App\Core\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "You must be logged in to access this page.";
            header("Location: " . ROOTURL . "/AuthController/index");
            exit();
        }
    }
}
