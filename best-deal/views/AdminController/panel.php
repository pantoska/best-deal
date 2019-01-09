<!DOCTYPE html>
<html>


<?php include_once(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__).'/menubar.html') ?>


<div class="well">
    <form id="Admin" action="?page=panel" method="POST" ENCTYPE="multipart/form-data">
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th style="width: 36px;"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td>
                    <button name="button" value="<?php echo $user['id']; ?>" type="submit" class="btn btn-primary">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>

</body>
</html>
