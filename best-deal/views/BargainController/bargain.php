<!DOCTYPE html>
<html>

<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__) . '/menubar.php') ?>

<div class="row">
    <?php if(isset($_SESSION) &&  $_SESSION['role'] == 'admin') {?>
        <form id="Bargain">
            <button onclick="deleteBargain(<?php echo $files['id']; ?>)" type="button" class="btn btn-warning pull-right">Delete bargain</button>
        </form>
    <?php } ?>
    <div>
        <figure class="offer">
            <a class="black-text" href="?page=bargain&id=<?php echo $files['id']; ?>">
                <img src="../../public/upload/<?php echo $files['image']; ?>" height="250" width="250" />
                <h2 ><?php echo $files['title']; ?></h2>
                <h3 class="left"><?php echo $files['price']; ?></h3>
                <h3 class="left"><?php echo $files['description']; ?></h3>
                <h5 class="left">Posted by: <?php echo $files['username']; ?></h5>
            </a>
        </figure>
    </div>
</div>

<div class="comments">
    <div >
        <div class="panel panel-info">
            <div class="panel-heading">Comment panel</div>
            <?php if(isset($_SESSION) && !empty($_SESSION)) {?>
                <form action="?page=bargain&id=<?php echo $files['id']; ?>" method="POST">
                    <div class="panel-body">
                        <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                        <br>
                        <div class="buttonpost">
                            <button name='post' value="post" type="submit" class="btn btn-warning pull-right">Post</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            <?php } ?>
            <ul class="list">
                <?php foreach($comments as $key => $comment): ?>
                    <li class="media">
                        <div class="media-body">
                            <span class="pull-right">
                                <small class="text-muted"><?php echo $comment['time']; ?></small>
                                <?php if(isset($_SESSION) &&  $_SESSION['role'] == 'admin') {?>
                                    <button style="height:35px;width:35px" onclick="deleteComment(<?php echo $comment['id']; ?>)" type="button" class="btn btn-warning pull-right">X</button>
                                <?php } ?>
                            </span>
                            <strong class="text-success"><?php echo $comment['username']; ?></strong>
                            <p>
                                <?php echo $comment['content']; ?>
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
