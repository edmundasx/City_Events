<?php
declare(strict_types=1);

use App\Core\Router;

return function (Router $router): void {
    // Home
    $router->get("/", "HomeController@index");

    // Map
    $router->get("/map", "MapController@index");

    // Events (optional, keep if you have these controllers)
    $router->get("/events", "EventController@index");
    $router->get("/events/{id:\d+}", "EventController@show");
};
