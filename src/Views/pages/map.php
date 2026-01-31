<?php
// src/Views/pages/map.php
$base = $base ?? "";
$title = $title ?? "Žemėlapis – CityEvents";

$events = $events ?? []; // array of events: id,title,location,event_date,event_time,price_eur,is_free,lat,lng,cover_image
$filters = $filters ?? [];

// optional: current filters from controller/query
?>

<?php require __DIR__ . "/../partials/header.php"; ?>

<main class="bg-slate-950 text-slate-100">
  <div class="container-ce py-6">

    <?php require __DIR__ . "/../partials/map/breadcrumbs.php"; ?>

    <?php require __DIR__ . "/../partials/map/hero.php"; ?>

    <section class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-[280px_minmax(0,1fr)_360px]">
      <!-- Filters -->
      <aside class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
        <?php require __DIR__ . "/../partials/map/filters.php"; ?>
      </aside>

      <!-- Results -->
      <section class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
        <?php require __DIR__ . "/../partials/map/results.php"; ?>
      </section>

      <!-- Map -->
      <aside class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
        <?php require __DIR__ . "/../partials/map/map.php"; ?>
      </aside>
    </section>

  </div>
</main>

<?php require __DIR__ . "/../partials/footer.php"; ?>
