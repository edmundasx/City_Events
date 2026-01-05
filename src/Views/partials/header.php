<?php $base = $base ?? ""; ?>

<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-slate-200">
  <div class="mx-auto max-w-6xl px-4">
    <div class="flex h-16 items-center justify-between gap-4">

      <a href="<?= $base ?>/home" class="text-xl font-extrabold text-brand">
        CityEvents
      </a>

      <nav class="hidden md:flex items-center gap-6 text-sm font-semibold text-slate-700">
        <a class="hover:text-brand transition" href="<?= $base ?>/home#events">Renginiai</a>
        <a class="hover:text-brand transition" href="<?= $base ?>/create">Sukurti renginį</a>
        <a class="hover:text-brand transition" href="<?= $base ?>/admin">Admin</a>
        <a class="hover:text-brand transition" href="<?= $base ?>/home#help">Pagalba</a>
      </nav>

      <div class="flex items-center gap-2">
        <a href="<?= $base ?>/login"
           class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-semibold
                  border border-slate-300 text-slate-800 hover:border-brand hover:text-brand transition">
          Prisijungti
        </a>

        <a href="<?= $base ?>/signup"
           class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-semibold
                  bg-brand text-white hover:bg-brand/90 transition shadow-sm">
          Registruotis
        </a>
      </div>

    </div>
  </div>
</header>
