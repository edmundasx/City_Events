<?php
$flash = $_SESSION["flash"] ?? null;
unset($_SESSION["flash"]);

if (!$flash) {
    return;
}

$type = $flash["type"] ?? "info"; // info | success | warning | error
$msg = $flash["message"] ?? "";
if ($msg === "") {
    return;
}

$map = [
    "success" => "border-green-300 bg-green-50 text-green-800",
    "error" => "border-red-300 bg-red-50 text-red-800",
    "warning" => "border-yellow-300 bg-yellow-50 text-yellow-800",
    "info" => "border-blue-300 bg-blue-50 text-blue-800",
];

$classes = $map[$type] ?? $map["info"];
?>
<div class="mb-4 rounded-lg border px-4 py-3 <?= $classes ?>">
  <?= htmlspecialchars($msg, ENT_QUOTES, "UTF-8") ?>
</div>
