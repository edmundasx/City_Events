<?php
declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
  public function index(): void
  {
    // Later you will render a view here (from src/Views)
    echo "CityEvents MVC is running.";
  }
}
