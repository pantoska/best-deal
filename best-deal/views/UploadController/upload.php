<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__).'/menubar.html') ?>

<div class="container">
    <h1 class="form-heading">Upload Form</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Upload bargain</h2>
                <p>Please select image and describe the bargain</p>
                <?php if(isset($message)): ?>
                    <?php foreach($message as $item): ?>
                        <div><?= $item ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <form id="Upload" action="?page=upload" method="POST" ENCTYPE="multipart/form-data">

                <div class="form-group">

                    <input name="file" type="file" id="inputFile" required/>

                </div>

                <div class="form-group">

                    <input name="title" type="text" class="form-control" id="inputTitle" placeholder="title" required/>

                </div>

                <div class="form-group">

                    <input name="price" type="text" class="form-control" id="inputPrice" placeholder="price" required/>

                </div>

                <div class="form-group">

                    <input name="description" type="text" class="form-control" id="inputDescription" placeholder="description" required/>
                </div>

                <button type="submit" name="submit" value="send" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div></div></div>

</body>
</html>
