<?php
<<<<<<< HEAD
class AuthorizationMiddleware implements MiddlewareInterface
{
    private $requiredRoles = [];
    public function __construct($requiredRoles)
    {
        $this->requiredRoles = $requiredRoles;
    }
    public function handle()
=======
class AuthorizationMiddleware
{
    public static function handle(array $requiredRoles)
>>>>>>> 13a069fce8ccbdafc96b21810b630d574c1c0427
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . ROOTURL . "/");
            exit();
        }

        $user = unserialize($_SESSION['user']);

<<<<<<< HEAD
        if (!in_array($user->getRole(), $this->requiredRoles)) {
=======
        if (!in_array($user->getRole(), $requiredRoles)) {
>>>>>>> 13a069fce8ccbdafc96b21810b630d574c1c0427
            header("Location:" . ROOTURL . "/");
            exit();
        }
    }
}
