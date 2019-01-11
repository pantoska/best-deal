<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__) . '/head.html') ?>

<body>

<?php include_once(dirname(__DIR__) . '/menubar.php') ?>

<div class="container mt40">
    <section class="row">


        <?php foreach($files as $key => $f): ?>
            <?php foreach($f as $row => $file): ?>

                <article class="col-xs-12 col-sm-6 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="?page=bargain&id=<?php echo $file['id']; ?>" class="zoom">
                                <img src="../../public/upload/<?php echo $file['image']; ?>" height="250" width="250" />
                                <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                            </a>
                        </div>
                        <div class="panel-footer">

                            <h4><a href="?page=bargain&id=<?php echo $file['id']; ?>" ><?php echo $file['title']; ?></a></h4>


                            <span class="pull-right">
                                <i id="<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-up"></i>
                                <i id="<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-down"></i>

                                <p><?php echo $file['rate']; ?></p>

                            </span>

                        </div>

                        <h4 class="text-left my-3"><?php echo $file['price']; ?></h4>
                        <h4 class="text-left my-3"><?php echo $file['description']; ?></h4>

                    </div>


                </article>

            <?php endforeach; ?>
        <?php endforeach; ?>

    </section>
</div>


</body>

</html>