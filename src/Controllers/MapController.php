<?php
declare(strict_types=1);

namespace App\Controllers;

final class MapController
{
    public function index(array $params = []): void
    {
        // Base path like "/cityevents/public" (works behind index.php front controller)
        $base = rtrim(dirname($_SERVER["SCRIPT_NAME"] ?? ""), "/");
        if ($base === "" || $base === ".") {
            $base = "/cityevents/public"; // fallback if server vars are weird
        }

        $title = "Žemėlapis";

        // Provide ALL data your partials might rely on (so they can't silently output nothing)
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

        $breadcrumbs = [
            ["label" => "Renginiai", "href" => $base . "/events"],
            ["label" => "Žemėlapis", "href" => $base . "/map"],
        ];

        $filters = [
            "q" => (string) ($params["q"] ?? ""),
            "category" => (string) ($params["category"] ?? ""),
            "date" => (string) ($params["date"] ?? ""),
            "district" => (string) ($params["district"] ?? ""),
        ];

        // Paths (fail hard if wrong — otherwise you get "empty main" confusion)
        $view = realpath(__DIR__ . "/../Views/pages/map.php");
        $layout = realpath(__DIR__ . "/../Views/layouts/main.php");

        if ($view === false) {
            http_response_code(500);
            throw new \RuntimeException(
                "View not found: src/Views/pages/map.php",
            );
        }
        if ($layout === false) {
            http_response_code(500);
            throw new \RuntimeException(
                "Layout not found: src/Views/layouts/main.php",
            );
        }

        require $layout;
    }
}
