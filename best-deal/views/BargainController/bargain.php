<!DOCTYPE html>
<html>

<?php include_once(dirname(__DIR__).'/head.html') ?>


<body>

<h1>BARGAIN</h1>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<?php //foreach ($img as $images): ?>
<!--        <img width="250" height="300" src="../../public/upload/--><?//= $images ?><!--">-->
<?php //endforeach; ?>

</body>
</html>
