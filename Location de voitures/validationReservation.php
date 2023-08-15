<?php
session_start();
require_once 'libraries/autoloader.php';

$controller = new \Controllers\Reservation_controller();
$controller->validationDuUser();


