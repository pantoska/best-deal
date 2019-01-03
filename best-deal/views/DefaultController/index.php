<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="?page=index">Best deal</a>
        </div>

        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="?page=index">Home</a></li>
                <li><a href="?page=upload">Upload bargain</a></li>
            </ul>

            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="?page=login">Sign in</a></li>
                <li><a href="?page=register">Sign up</a></li>
                <li><a href="?page=logout">Logout</a></li>
            </ul>

        </div>
    </div>
</nav>

<?php
if(isset($_SESSION) && !empty($_SESSION)) {
    print_r($_SESSION);
}
?>

<div class="row">
    <div class="col-md-12">

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox no-margin">

            <?php foreach($files as $file): ?>
                <figure class="col-md-4">
                    <a class="black-text" href="?page=bargain">
                        <img src="../../public/upload/<?php echo $file['image']; ?>" height="250" width="250" />
                        <h2 class="text-left my-3"><?php echo $file['title']; ?></h2>
                        <h3 class="text-left my-3"><?php echo $file['price']; ?></h3>
                        <h3 class="text-left my-3"><?php echo $file['description']; ?></h3>

                    </a>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</div>


</body>

</html>

