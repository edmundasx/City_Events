<?php $base = $base ?? ""; ?>

<header class="site-header">
  <div class="container-ce">
    <div class="header-row">
      <a href="<?= $base ?>/home" class="logo">CityEvents</a>

      <nav class="nav">
        <a class="nav-link" href="<?= $base ?>/home#events">Renginiai</a>
        <a class="nav-link" href="<?= $base ?>/map">Žemėlapis</a>
        <a class="nav-link" href="<?= $base ?>/create">Organizatoriams</a>
        <a class="nav-link" href="<?= $base ?>/home#help">Pagalba</a>
      </nav>

      <div class="header-actions">
        <a class="btn-outline" href="<?= $base ?>/login">Prisijungti</a>
        <a class="btn-primary" href="<?= $base ?>/signup">Registruotis</a>
      </div>
    </div>
  </div>
</header>
