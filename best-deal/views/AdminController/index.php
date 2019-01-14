<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include_once(dirname(__DIR__).'/menubar.php') ?>

<?php if(isset($_SESSION) && $_SESSION['role'] == 'admin') {?>

    <div class="container">
        <div class="row">
            <h1 class="col-12 pl-0">ADMIN PANEL</h1>

            <h4 class="mt-4">Your data:</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?= $user->getName(); ?></td>
                    <td><?= $user->getSurname(); ?></td>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?= $user->getRole(); ?></td>
                    <td>-</td>
                </tr>
                </tbody>
                <tbody class="users-list">
                </tbody>
            </table>

            <button class="btn btn-warning pull-left" type="button" onclick="getUsers()">Get all users</button>
        </div>
    </div>

<?php } ?>

</body>
</html>
