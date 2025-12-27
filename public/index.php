<?php
session_start();
require __DIR__ . "/../src/Controllers/HomeController.php";

$controller = new HomeController();
$controller->index();
