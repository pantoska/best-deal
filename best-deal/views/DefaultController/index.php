<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>
<h1>HOMEPAGE</h1>

<?php
if(isset($_SESSION) && !empty($_SESSION)) {
    print_r($_SESSION);
}
?>

</body>

</html>

