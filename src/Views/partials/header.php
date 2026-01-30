<?php $base = $base ?? ""; ?>

<header class="site-header">
  <div class="container-ce">
    <div class="header-row">
      <a href="<?= $base ?>/home" class="logo">CityEvents</a>

      <nav class="nav">
        <a class="nav-link" href="<?= $base ?>/home#events">Renginiai</a>
        <a class="nav-link" href="<?= $base ?>/admin">Žemėlapis</a>
        <a class="nav-link" href="<?= $base ?>/create">Organizatoriams</a>
        <a class="nav-link" href="<?= $base ?>/home#help">Pagalba</a>
      </nav>

      <div class="flex items-center gap-2">
        <a class="btn-outline" href="<?= $base ?>/login">Prisijungti</a>
        <a class="btn-primary" href="<?= $base ?>/signup">Registruotis</a>
      </div>
    </div>
  </div>
</header>
