<?php

class AuthMiddleware implements MiddlewareInterface
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . ROOTURL . "/login");
            exit();
        }
    }
}