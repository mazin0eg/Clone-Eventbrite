<?php
class AuthorizationMiddleware implements MiddlewareInterface
{
    private $requiredRoles = [];
    public function __construct($requiredRoles)
    {
        $this->requiredRoles = $requiredRoles;
    }
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . ROOTURL . "/");
            exit();
        }

        $user = unserialize($_SESSION['user']);

        if (!in_array($user->getRole(), $this->requiredRoles)) {
            header("Location:" . ROOTURL . "/");
            exit();
        }
    }
}