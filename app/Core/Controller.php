<?php
namespace App\Core;
abstract class Controller
{
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
}

?>