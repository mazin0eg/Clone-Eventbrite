<?php
$env = parse_ini_file(__DIR__ . '/../.env');
$rooturl = $env['ROOTURL'];

define('ROOTURL', $rooturl);
define('APPROOT', dirname(__DIR__));
?>