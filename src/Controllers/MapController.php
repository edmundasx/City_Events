<?php
declare(strict_types=1);

namespace App\Controllers;

final class MapController
{
    public function index(array $params = []): void
    {
        // If you already compute $base in layout/header, remove this.
        $base = "/cityevents/public";

        // TODO: Replace with DB fetch. For map markers you need lat/lng.
        $events = [
            [
                "id" => 1,
                "title" => "Vasaros muzikos festivalis",
                "location" => "Vingio parkas, Vilnius",
                "event_date" => "2026-02-01",
                "event_time" => "18:00",
                "price_eur" => 0,
                "is_free" => true,
                "category" => "music",
                "district" => "Naujamiestis",
                "lat" => 54.6879,
                "lng" => 25.2355,
                "cover_image" => "",
            ],
        ];

        // Your layout probably expects these:
        $title = "Žemėlapis";
        $view = __DIR__ . "/../Views/pages/map.php";

        // If your app already includes a main layout file:
        require __DIR__ . "/../Views/layouts/main.php";
    }
}
