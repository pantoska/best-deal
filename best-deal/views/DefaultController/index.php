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
            <article class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="?page=bargain&id=<?php echo $file['id']; ?>" class="zoom">
                            <img src="../../public/upload/<?php echo $file['image']; ?>" height="250" width="250" />
                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                        </a>
                    </div>
                    <div class="panel-footer">
                        <span><a href="?page=bargain&id=<?php echo $file['id']; ?>" ><?php echo $file['title']; ?></a></span>
                        <?php if(isset($_SESSION) && !empty($_SESSION) && $file['user'] != $_SESSION['id']) {?>
                            <div class="pull-right">
                                <button id="like<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-up"></button>
                                <button id="dislike<?php echo $file['id']; ?>" class="glyphicon glyphicon-thumbs-down"></button>
                                <span id="rate<?php echo $file['id']; ?>" ><?php echo $file['rates'] ?></span>
                            </div>
                        <?php }?>
                    </div>
                    <h4 class="describe" style="color:#069"><?php echo $file['price']; ?></h4>
                    <h4 class="describe" style="color:#069"><?php echo $file['description']; ?></h4>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</div>

</body>
</html>

