<?php
class AuthorizationMiddleware
{
    public static function handle(array $requiredRoles)
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . ROOTURL . "/");
            exit();
        }

        $user = unserialize($_SESSION['user']);

        if (!in_array($user->getRole(), $requiredRoles)) {
            header("Location:" . ROOTURL . "/");
            exit();
        }
    }
}
