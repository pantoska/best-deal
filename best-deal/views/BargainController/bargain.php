<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<h1>BARGAIN</h1>

<?php foreach ($img as $images): ?>
        <img width="250" height="300" src="../../public/upload/<?= $images ?>">
<?php endforeach; ?>


</body>
</html>
