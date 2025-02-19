<?php
namespace App\Middlewares;
use App\Core\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . ROOTURL . "/AuthController/index");
            exit();
        }
    }
}