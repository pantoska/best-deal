<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html') ?>

<body>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="?page=index">Best deal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="?page=index">Home</a></li>
            <li><a href="?page=login">Sign in</a></li>
            <li><a href="?page=register">Sign up</a></li>
        </ul>
    </div>
</nav>

<form action="?page=register" method="POST">
    <input name="name" placeholder="name" required/><br>
    <input name="surname" placeholder="surname" required/><br>
    <input name="email" placeholder="email" required/><br>
    <input name="password" placeholder="password" type="password" required/><br>
    <input type="submit" value="Sign in"/><br>
</form>

</body>
</html>