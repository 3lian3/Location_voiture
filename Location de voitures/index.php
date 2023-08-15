<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//page d'accuiel
session_start();
require_once 'libraries/autoloader.php';

$controller = new \Controllers\Voiture_controller();
$controller->index();


