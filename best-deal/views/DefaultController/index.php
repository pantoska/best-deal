<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__).'/menubar.html') ?>



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
                    <a class="black-text" href="?page=bargain&id=<?php echo $file['id']; ?>">
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

