<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<h1>LOGIN</h1>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form action="?page=login" method="POST">
    <input name="email" placeholder="email" required/>
    <input name="password" placeholder="password" type="password" required/>
    <input type="submit" value="Sign in"/>
</form>

</body>
</html>