<!DOCTYPE html>
<html>
<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__) . '/menubar.php') ?>

<script type="text/javascript">
    var sessionId= '<?php echo $_SESSION['id'];?>';
</script>

<div class="container mt40">
    <section class="row">

        <?php foreach($files as $key => $file): ?>

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


                            <?php if(isset($_SESSION) && !empty($_SESSION))
                            {?>
                                <span class="pull-center">

                                    <?php  if ($rate[$key] >= 1) {?>

                                        <div class="likebutton<?php echo $file['id']; ?>">
                                            <button id="like<?php echo $file['id']; ?> " class="glyphicon glyphicon-thumbs-up" disabled="disabled"></button>
                                        </div>
                                        <div class="dislikebutton<?php echo $file['id']; ?>" >
                                            <button id="dislike<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-down"></button>
                                        </div>

                                    <?php } else if($rate[$key] <= -1) {?>

                                        <div class="likebutton<?php echo $file['id']; ?>">
                                            <button id="like<?php echo $file['id']; ?> " class="glyphicon glyphicon-thumbs-up"></button>
                                        </div>
                                        <div class="dislikebutton<?php echo $file['id']; ?>" >
                                            <button id="dislike<?php echo $file['id']; ?> " class="glyphicon glyphicon-thumbs-down" disabled="disabled"></button>
                                        </div>

                                    <?php } else {?>
                                        <div class="likebutton<?php echo $file['id']; ?>">
                                            <button id="like<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-up"></button>
                                        </div>
                                        <div class="dislikebutton<?php echo $file['id']; ?>" >
                                            <button id="dislike<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-down"></button>
                                        </div>
                                    <?php }?>

                                    <h4 id="rate<?php echo $file['id']; ?>" ><?php echo $file['rates'] ?></h4>


                                </span>

                            <?php }?>

                        </div>

                        <h4 class="text-left my-3"><?php echo $file['price']; ?></h4>
                        <h4 class="text-left my-3"><?php echo $file['description']; ?></h4>

                    </div>
                </article>

        <?php endforeach; ?>

    </section>
</div>

</body>


</html>

