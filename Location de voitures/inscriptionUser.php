<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
require_once 'libraries/autoloader.php';

$controller = new \Controllers\Client_controller();
$controller->inscription();