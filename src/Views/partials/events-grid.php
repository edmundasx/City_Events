<?php
$events = $events ?? [];
$gridId = $gridId ?? "eventsGrid";
$gridClass = $gridClass ?? "events-grid";
$emptyText = $emptyText ?? "Renginiai nerasti";
$basePath = $basePath ?? "/events";

$e = static fn($v) => htmlspecialchars((string) $v, ENT_QUOTES, "UTF-8");
?>

<div id="<?= $e($gridId) ?>" class="<?= $e($gridClass) ?>">
  <?php if (empty($events)): ?>
    <div><?= $e($emptyText) ?></div>
  <?php else: ?>
    <?php foreach ($events as $event):

        $id = $event["id"] ?? "";
        $href = rtrim($basePath, "/") . "/" . rawurlencode((string) $id);
        ?>
      <a class="event-card" href="<?= $e($href) ?>">
        <div class="event-title"><?= $e($event["title"] ?? "") ?></div>
        <div><?= $e($event["date"] ?? "") ?> <?= $e(
     $event["time"] ?? "",
 ) ?></div>
        <div><?= $e($event["location"] ?? "") ?></div>
        <div><?= $e($event["price"] ?? "") ?></div>
      </a>
    <?php
    endforeach; ?>
  <?php endif; ?>
</div>
