<?php

// public/index.php — frontend-first “home” page (no MVC yet, just runs)
// Later you can replace the page body with a controller + view render.

$title = "CityEvents — Home";
$description = "CityEvents homepage (frontend-first).";
?>
<!doctype html>
<html lang="lt">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>">

  <!-- Tailwind output (must exist) -->
  <link rel="stylesheet" href="/assets/css/app.css">

  <!-- Your existing repo CSS (keeps old look identical). Remove later when fully Tailwind. -->
  <?php if (file_exists(__DIR__ . "/assets/css/style.css")): ?>
    <link rel="stylesheet" href="/assets/css/style.css">
  <?php endif; ?>
</head>

<body class="bg-gray-50 text-gray-900">

  <!-- ===== NAVBAR ===== -->
  <!-- If you already have a repo navbar structure, paste it here or include a partial later -->
  <header class="bg-white border-b sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
      <a href="/"
         class="text-xl font-bold text-orange-600 no-underline">
        CityEvents
      </a>

      <nav class="hidden md:flex items-center gap-6">
        <a class="hover:underline" href="/#events">Renginiai</a>
        <a class="hover:underline" href="/city-map.php">Žemėlapis</a>
        <a class="hover:underline" href="/for-organizers.php">Organizatoriams</a>
        <a class="hover:underline" href="/help-center.php">Pagalba</a>
      </nav>

      <div class="flex gap-2">
        <a href="/login.php"
           class="px-4 py-2 rounded-lg border bg-white hover:bg-gray-50">
          Prisijungti
        </a>
        <a href="/signup.php"
           class="px-4 py-2 rounded-lg bg-orange-600 text-white hover:opacity-90">
          Registruotis
        </a>
      </div>
    </div>
  </header>

  <!-- ===== TAILWIND TEST BLOCK ===== -->
  <section class="max-w-3xl mx-auto mt-10 p-6 rounded-2xl border bg-white shadow">
    <h1 class="text-3xl font-bold">Tailwind is working ✅</h1>
    <p class="mt-2 text-gray-600">
      If this looks like a white card with rounded corners and a shadow — Tailwind is loaded.
    </p>
    <div class="mt-4 flex gap-3">
      <a href="#"
         class="px-4 py-2 rounded-lg bg-black text-white hover:opacity-80 transition">
        Button
      </a>
      <span class="px-3 py-2 rounded-lg bg-gray-100 text-gray-700">
        Badge
      </span>
    </div>
  </section>

  <!-- ===== YOUR EXISTING INDEX CONTENT (OPTIONAL) ===== -->
  <!-- Paste your CityEvents index.html sections below (hero, categories, events grid). -->
  <main class="max-w-6xl mx-auto px-4 py-10">
    <section class="rounded-2xl border bg-white p-6">
      <h2 class="text-2xl font-semibold">Home content</h2>
      <p class="mt-2 text-gray-600">
        Paste your existing index.html body sections here to replicate the repo 1:1.
      </p>
    </section>

    <section id="events" class="mt-10">
      <h3 class="text-xl font-semibold">Events</h3>
      <div id="eventsGrid" class="mt-4 text-gray-600">
        Įkeliami renginiai...
      </div>
    </section>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="mt-14 border-t bg-white">
    <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-600">
      © <?= date("Y") ?> CityEvents
    </div>
  </footer>

  <!-- Your existing repo JS (if you have it) -->
  <?php if (file_exists(__DIR__ . "/assets/js/script.js")): ?>
    <script src="/assets/js/script.js"></script>
  <?php endif; ?>
</body>
</html>
