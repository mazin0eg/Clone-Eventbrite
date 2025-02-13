<?php

abstract class Controller
{
    public function model($model)
    {
        return new $model();
    }
    public function view($view, $data = [])
    {
        if (file_exists('../views/' . $view . '.php')) {
            require_once '../views/' . $view . '.php';
        } else {
            require_once '../views/404.php';
        }
    }
}

?>