<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<?php include_once(dirname(__DIR__) . '/menubar.php') ?>

<div class="container">
    <h1 class="form-heading"></h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Login</h2>
                <?php if(isset($message)): ?>
                    <?php foreach($message as $item): ?>
                        <div><?= $item ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <p>Please enter your email and password</p>
            </div>
            <form id="Login" action="?page=login" method="POST">
                <div class="form-group">
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="email" required/>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="password" required/>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>




</body>
</html>