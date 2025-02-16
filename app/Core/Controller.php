<?php
namespace App\Core;
abstract class Controller
{
    protected $middlewares = [];
    public function model($model)
    {
        return new $model();
    }
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            require_once '../app/views/404.php';
        }
    }

    public function redirect($url)
    {
        header("Location: " . ROOTURL . "/$url");
        exit();

    }

    public function registerMiddleware($method, $middleware)
    {
        $this->middlewares[$method][] = $middleware;
    }

    public function getMiddlewares($method = null)
    {
        $methodMiddlewares = $method ? ($this->middlewares[$method] ?? []) : [];
        $globalMiddlewares = $this->middlewares['*'] ?? [];
        
        return array_merge($globalMiddlewares, $methodMiddlewares);
    }
}

?>