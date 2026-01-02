<?php
// header.php (partial)
// Assumes $base is defined in your layout (main.php) and points to your app base URL.
// Example: $base = '/cityevents/public'; or '' if hosted at domain root.
?>
<header class="sticky top-0 z-[100] bg-white border-b border-gray-200 shadow-sm">
  <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
    <!-- Left: logo + nav -->
    <div class="flex items-center gap-8">
      <a href="<?= $base ?>/index.php" class="text-2xl font-bold text-[#ff6b35] no-underline">
        CityEvents
      </a>

      <nav class="hidden md:flex items-center gap-8">
        <a
          href="<?= $base ?>/index.php#events"
          title="Renginiai – pagrindinė renginių peržiūra"
          class="text-gray-800 font-medium hover:text-[#ff6b35] transition-colors"
        >
          Renginiai
        </a>

        <a
          href="<?= $base ?>/city-map.php"
          title="Žemėlapis – vizualus renginių žemėlapis"
          class="text-gray-800 font-medium hover:text-[#ff6b35] transition-colors"
        >
          Žemėlapis
        </a>

        <a
          href="<?= $base ?>/for-organizers.php"
          title="Organizatoriams – informacija renginių organizatoriams"
          class="text-gray-800 font-medium hover:text-[#ff6b35] transition-colors"
        >
          Organizatoriams
        </a>

        <a
          href="<?= $base ?>/help-center.php"
          title="Pagalba – DUK ir pagalbos centras"
          class="text-gray-800 font-medium hover:text-[#ff6b35] transition-colors"
        >
          Pagalba
        </a>
      </nav>
    </div>

    <!-- Right: auth buttons -->
    <div class="flex items-center gap-2" id="authActions">
      <a
        class="btn btn-outline js-login-trigger inline-flex items-center justify-center rounded-lg px-6 py-2 font-semibold text-gray-800 border-2 border-gray-200 hover:border-[#ff6b35] hover:text-[#ff6b35] transition-colors"
        href="#login"
      >
        Prisijungti
      </a>

      <a
        class="btn btn-primary js-signup-trigger inline-flex items-center justify-center rounded-lg px-6 py-2 font-semibold text-white bg-[#ff6b35] hover:bg-[#e85a2a] transition-colors"
        href="#signup"
      >
        Registruotis
      </a>
    </div>
  </div>
</header>
