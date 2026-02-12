<?php
$base = $base ?? "";
$container = "container-ce";

// assuming you already created .container-ce in input.css
?>

<section class="hero">
  <div id="homeHeroMap" class="hero-map" aria-label="Renginių žemėlapis" data-events='<?= htmlspecialchars(
      json_encode($events ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP),
      ENT_QUOTES,
      "UTF-8",
  ) ?>'></div>
  <div class="hero-map-overlay"></div>
  <div class="hero-glow"></div>

  <div class="<?= $container ?> hero-inner">
    <div class="hero-content">
      <h1 class="hero-title">Atrask renginius viskam, ką mėgsti</h1>

      <p class="hero-lead">
        Rask ir dalyvauk renginiuose, bendrauk su organizatoriais arba sukurk savo renginį
      </p>

      <div class="search-wrap">
        <div class="search-bar">
          <input id="searchInput" type="text" placeholder="Ieškoti renginių" class="search-input">
          <input id="locationInput" type="text" placeholder="Vieta" class="search-input">

          <button type="button" onclick="searchEvents()" class="search-btn">
            Ieškoti
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="<?= $container ?> section-pad">
  <div class="cats-grid">
    <?php
    $cats = [
        ["music", "🎵", "Muzika"],
        ["arts", "🎨", "Menas"],
        ["charity", "❤️", "Labdara"],
        ["business", "💼", "Verslas"],
        ["education", "📚", "Švietimas"],
        ["food", "🍽️", "Maistas ir gėrimai"],
    ];
    foreach ($cats as [$key, $icon, $label]): ?>
      <button type="button" onclick="filterByCategory('<?= $key ?>')" class="cat-btn">
        <span class="cat-icon"><?= $icon ?></span>
        <span class="cat-label"><?= $label ?></span>
      </button>
    <?php endforeach;
    ?>
  </div>
</section>

<section id="events" class="<?= $container ?> section">
  <div class="section-head">
    <div>
      <h2 class="section-title">Renginiai tavo mieste</h2>
      <p class="section-subtitle">Atrask įdomiausius įvykius šalia tavęs</p>
    </div>

    <button type="button" class="section-action">Peržiūrėti visus</button>
  </div>

  <?php
  $gridId = "eventsGrid";
  $gridClass = "events-grid";
  $emptyText = "Renginiai nerasti";
  $basePath = ($base ?? "") . "/events";
  $events = $events ?? [];

  $partial = __DIR__ . "/../partials/events-grid.php";

  // diagnostika į source (nematoma UI)
  echo "<!-- PARTIAL: {$partial} exists=" .
      (is_file($partial) ? "yes" : "no") .
      " -->";

  if (!is_file($partial)) {
      throw new RuntimeException("Missing partial: " . $partial);
  }

  require $partial;
  ?>
</section>
