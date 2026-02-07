<?php
declare(strict_types=1);

/**
 * VIEW ONLY (no layout, no header/footer).
 * Layout main.php already wraps this view inside <main> and includes header/footer.
 */

// Optional: if partials need data, define/validate it here (or in controller)
$partialsDir = __DIR__ . "/../partials/map";

// If you want to fail fast with a clear message (dev only):
$required = ["breadcrumbs", "hero", "filters", "results", "map"];
foreach ($required as $name) {
    $file = $partialsDir . "/" . $name . ".php";
    if (!is_file($file)) {
        throw new RuntimeException("Missing map partial: {$file}");
    }
}
?>

<section class="bg-[#0f0f10] text-slate-100">
    <div class="mx-auto flex w-full max-w-6xl flex-col gap-6 px-4 py-8 lg:px-6">
        <?php require $partialsDir . "/breadcrumbs.php"; ?>
        <?php require $partialsDir . "/hero.php"; ?>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-[260px_1fr_360px]">
            <?php require $partialsDir . "/filters.php"; ?>
            <?php require $partialsDir . "/results.php"; ?>
            <?php require $partialsDir . "/map.php"; ?>
        </div>
    </div>
</section>

<script>
    window.__MAP_EVENTS__ = <?= json_encode(
        $events ?? [],
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP,
    ) ?>;
</script>
