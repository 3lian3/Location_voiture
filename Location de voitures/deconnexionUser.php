<?php
session_start(); 
include_once 'libraries/autoloader.php';

$controller = new \Controllers\Client_controller();
$controller->deconnexion();