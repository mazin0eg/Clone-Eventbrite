<?php
session_start();
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;


$router = new Router();
