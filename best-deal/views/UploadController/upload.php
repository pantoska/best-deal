<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<h1>UPLOAD</h1>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form action="?page=upload" method="POST" ENCTYPE="multipart/form-data">
    <input type="file" name="file"/><br/>
    <input type="submit" value="send"/>
</form>

</body>
</html>
