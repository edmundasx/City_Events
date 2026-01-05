<?php
$base = $base ?? "";
$container = "container-ce"; // assuming you already created .container-ce in input.css
?>

<section class="hero">
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
      foreach ($cats as [$key, $icon, $label]):
    ?>
      <button type="button" onclick="filterByCategory('<?= $key ?>')" class="cat-btn">
        <span class="text-xl"><?= $icon ?></span>
        <span class="text-sm"><?= $label ?></span>
      </button>
    <?php endforeach; ?>
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

  <div id="eventsGrid" class="events-grid">
    <div class="card card-pad muted">Įkeliami renginiai...</div>
  </div>
</section>

<section id="help" class="<?= $container ?> section">
  <div class="card card-pad">
    <h2 class="text-xl font-extrabold text-slate-900">Pagalba</h2>
    <p class="mt-2 muted">
      Jei kažkas neveikia — parašyk mums (vėliau prijungsi realų support)
    </p>
  </div>
</section>

<?php /* If script.js is already included in footer.php, do NOT include it here. */ ?>
