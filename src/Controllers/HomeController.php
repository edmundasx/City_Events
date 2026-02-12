<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Db;
use App\Repositories\EventRepository;

final class HomeController
{
    public function index(): void
    {
        // Layout expects these variables
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";
        $base = "/cityevents/public";
        $pageStyles = [
            "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
        ];
        $pageScripts = [
            "https://unpkg.com/leaflet@1.9.4/dist/leaflet.js",
        ];

        $repo = new EventRepository(Db::pdo());
        $events = $repo->homepageEvents(12, true); // only future approved events

        require __DIR__ . "/../Views/layouts/main.php";
    }
}
