<?php
declare(strict_types=1);

$events = $events ?? [];
$base = $base ?? "";

// map payload: keep it small and safe
$mapEvents = array_map(static function ($e) {
    return [
        "id" => (int) ($e["id"] ?? 0),
        "title" => (string) ($e["title"] ?? ""),
        "location" => (string) ($e["location"] ?? ""),
        "lat" => isset($e["lat"]) ? (float) $e["lat"] : null,
        "lng" => isset($e["lng"]) ? (float) $e["lng"] : null,
        "date" => (string) ($e["event_date"] ?? ""),
        "price" => $e["price"] ?? null,
        "cover" => (string) ($e["cover_image"] ?? ""),
    ];
}, $events);
?>


<section class="space-y-3">
    <div class="overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-[0_10px_40px_rgba(0,0,0,0.35)]">
        <div class="relative h-[520px]">
            <!-- Leaflet will render into this -->
            <div
                id="ce-map"
                class="h-full w-full"
                data-events='<?= json_encode(
                    $mapEvents,
                    JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP,
                ) ?>'
            ></div>

            <!-- Custom zoom controls -->
            <div class="absolute left-3 top-3 flex flex-col overflow-hidden rounded-lg border border-white/10 bg-black/60 text-white">
                <button id="ce-zoom-in" type="button" class="h-8 w-8 text-lg" aria-label="Zoom in">+</button>
                <div class="h-px w-full bg-white/10"></div>
                <button id="ce-zoom-out" type="button" class="h-8 w-8 text-lg" aria-label="Zoom out">−</button>
            </div>

            <div class="absolute bottom-2 right-2 text-[10px] text-slate-300">
                © OpenStreetMap contributors | Leaflet
            </div>
        </div>
    </div>
</section>
