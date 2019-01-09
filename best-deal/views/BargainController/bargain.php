<!DOCTYPE html>
<html>

<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__).'/menubar.html') ?>

<div class="row">
    <div class="col-md-12">

        <div id="mdb-lightbox-ui"></div>

        <div class="mdb-lightbox no-margin">

                <figure class="col-md-4">
                    <a class="black-text" href="?page=bargain&id=<?php echo $files['id']; ?>">
                        <img src="../../public/upload/<?php echo $files['image']; ?>" height="250" width="250" />
                        <h2 class="text-center my-3"><?php echo $files['title']; ?></h2>
                        <h3 class="text-left my-3"><?php echo $files['price']; ?></h3>
                        <h3 class="text-left my-3"><?php echo $files['description']; ?></h3>
                        <h3 class="text-left my-3"><?php echo $files['username']; ?></h3>

                    </a>
                </figure>
        </div>
    </div>
</div>



<div class="row bootstrap snippets">
    <div class="col-md-6 col-md-offset-2 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Comment panel
                </div>
                    <form id="Bargain" action="?page=bargain&id=<?php echo $files['id']; ?>" method="POST">

                    <div class="panel-body">
                        <textarea name="comment" class="form-control" placeholder="write a comment..." rows="3"></textarea>
                        <br>
                        <button type="submit" class="btn btn-warning pull-right">Post</button>
                        <div class="clearfix"></div>
                        <hr>
                        <ul class="media-list">
                            <?php foreach($comments as $key => $comment1): ?>
                                <?php foreach($comment1 as $row => $comment): ?>

                                    <li class="media">
                                        <div class="media-body">
                                            <span class="text-muted pull-right">
                                                <small class="text-muted"><?php echo $comment['time']; ?></small>
                                            </span>
                                            <strong class="text-success"><?php echo $comment['username']; ?></strong>
                                            <p>
                                                <?php echo $comment['content']; ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </ul>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
