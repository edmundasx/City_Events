<?php

final class HomeController
{
    public function index(): void
    {
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";

        require_once __DIR__ . "/../Core/Db.php";
        require_once __DIR__ . "/../Repositories/EventsRepository.php";

        $repo = new EventRepository(Db::pdo());
        $events = $repo->homepageEvents(12, true); // only future approved events

        require __DIR__ . "/../Views/layouts/main.php";
    }
}
