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

        // Legacy includes (until you move Db/Repository to namespaces + autoload)
        require_once __DIR__ . "/../Core/Db.php";
        require_once __DIR__ . "/../Repositories/EventsRepository.php";

        // IMPORTANT: Db and EventRepository are in the global namespace (no "namespace" in their files)
        $repo = new \EventRepository(\Db::pdo());
        $events = $repo->homepageEvents(12, true); // only future approved events

        require __DIR__ . "/../Views/layouts/main.php";
    }
}
