<?php
session_start();
require __DIR__ . "/../src/Controllers/HomeController.php";
$base = rtrim(dirname($_SERVER["SCRIPT_NAME"]), "/\\");
$base = $base === "" ? "" : $base;

$controller = new HomeController();
$controller->index();
