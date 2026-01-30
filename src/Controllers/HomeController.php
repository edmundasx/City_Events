<?php
<<<<<<< HEAD
declare(strict_types=1);

namespace App\Controllers;
=======
>>>>>>> e917266ee7c9fbc65838c93fad57ffe2da735dfc

final class HomeController
{
    public function index(): void
    {
<<<<<<< HEAD
        // Layout expects these variables
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";

        // Legacy includes (until you move Db/Repository to namespaces + autoload)
        require_once __DIR__ . "/../Core/Db.php";
        require_once __DIR__ . "/../Repositories/EventsRepository.php";

        // IMPORTANT: Db and EventRepository are in the global namespace (no "namespace" in their files)
        $repo = new \EventRepository(\Db::pdo());
=======
        $title = "Home";
        $view = __DIR__ . "/../Views/pages/home.php";

        require_once __DIR__ . "/../Core/Db.php";
        require_once __DIR__ . "/../Repositories/EventsRepository.php";

        $repo = new EventRepository(Db::pdo());
>>>>>>> e917266ee7c9fbc65838c93fad57ffe2da735dfc
        $events = $repo->homepageEvents(12, true); // only future approved events

        require __DIR__ . "/../Views/layouts/main.php";
    }
}
