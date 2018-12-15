<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Best deal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Zaloguj się</a></li>
            <li><a href="#">Zarejestruj się</a></li>
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

