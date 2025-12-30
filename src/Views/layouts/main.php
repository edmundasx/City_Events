<?php $base = "/cityevents/public"; ?>
<!DOCTYPE html>
<html lang="lt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ??
      "City Events – Atrask renginius, kurie tau patinka" ?></title>
  <meta name="description" content="Rask ir dalyvauk renginiuose, naršyk organizatorius arba sukurk savo renginį.">
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
</head>
<body>

<?php require __DIR__ . "/../partials/header.php"; ?>

<main>
  <?php
  if (!isset($view)) {
      throw new RuntimeException("View not defined");
  }
  require $view;
  ?>
</main>

<?php
// If you want exact match, keep footer empty or remove this include
?>
<?php require __DIR__ . "/../partials/footer.php"; ?>

<script src="<?= $base ?>/assets/js/script.js"></script>
</body>
</html>
