<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;
use App\Core\Database;

$router = new Router();
