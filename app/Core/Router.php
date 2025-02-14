<?php

namespace App\Core;
class Router
{
    private $currentController = 'HomeController';
    private $currentMethod = 'index';
    private $params = [];
    private $namespace = 'App\\Controllers\\';


    public function __construct()
    {

        $url = $this->getUrl();

        if (!empty($url) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        $controllerClass = $this->namespace . $this->currentController;

        if (!class_exists($controllerClass)) {
            $this->notFound();
        }

        $this->currentController = new $controllerClass();


        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    private function notFound()
    {
        http_response_code(404);
        require_once '../app/views/404.php';
        exit();
    }
}

