<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

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

<p>
    <?= $text ?>
</p>


<?php
if(isset($_SESSION) && !empty($_SESSION)) {
    print_r($_SESSION);
}
?>

</body>

</html>

