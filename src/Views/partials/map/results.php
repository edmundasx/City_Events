<section class="space-y-4 text-sm text-slate-300">
    <p class="text-xs text-slate-400">Rasta <?= isset($events)
        ? count($events)
        : 0 ?> renginių</p>

    <?php if (!empty($events)): ?>
        <div class="space-y-3">
            <?php foreach ($events as $event): ?>
                <article class="rounded-xl border border-white/10 bg-white/5 p-4">
                    <h3 class="text-sm font-semibold text-white">
                        <?= htmlspecialchars($event["title"] ?? "Renginys") ?>
                    </h3>
                    <p class="mt-1 text-xs text-slate-400">
                        <?= htmlspecialchars($event["location"] ?? "Vieta") ?>
                    </p>
                    <p class="mt-2 text-xs text-slate-500">
                        <?= htmlspecialchars(
                            ($event["event_date"] ?? "") .
                                " " .
                                ($event["event_time"] ?? ""),
                        ) ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="rounded-xl border border-white/10 bg-white/5 px-4 py-10 text-center text-xs text-slate-400">
            Šiuo metu renginių nėra.
        </div>
    <?php endif; ?>
</section>
