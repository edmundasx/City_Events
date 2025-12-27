<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
  <?php include __DIR__ . "/../partials/navbar.php"; ?>

  <div class="container mx-auto px-4 py-6">
    <?php include __DIR__ . "/../partials/flash.php"; ?>
    <?php include $view; ?>
  </div>

  <?php include __DIR__ . "/../partials/footer.php"; ?>

  <script src="/assets/js/app.js"></script>
</body>
</html>
