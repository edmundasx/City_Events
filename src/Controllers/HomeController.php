<?php
declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
    public function index(): void
    {
        // Layout expects these variables
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";

        // Legacy includes (until Db/Repository are moved to namespaces + Composer autoload)
        require_once __DIR__ . "/../Core/Db.php";
        require_once __DIR__ . "/../Repositories/EventsRepository.php";

        // Db + EventRepository are GLOBAL classes, so use leading backslash
        $repo = new \EventRepository(\Db::pdo());
        $events = $repo->homepageEvents(12, true); // only future approved events

        require __DIR__ . "/../Views/layouts/main.php";
    }
}
