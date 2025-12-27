<?php
final class HomeController
{
    function index(): void
    {
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";
        require __DIR__ . "/../Views/layouts/main.php";
    }
}
