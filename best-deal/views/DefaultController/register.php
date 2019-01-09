<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html') ?>

<body>

<?php include_once(dirname(__DIR__).'/menubar.html') ?>


<div class="container">
    <h1 class="form-heading">Login Form</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Register</h2>
                <p>Please enter your data</p>
            </div>
            <form id="Register" action="?page=register" method="POST">

                <?php if(isset($message)): ?>
                    <?php foreach($message as $item): ?>
                        <div><?= $item ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="form-group">

                    <input name="name" type="name" class="form-control" id="inputName" placeholder="name" required/>

                </div>

                <div class="form-group">

                    <input name="surname" type="surname" class="form-control" id="inputSurname" placeholder="surname" required/>

                </div>

                <div class="form-group">

                    <input name="username" type="username" class="form-control" id="inputUsername" placeholder="username" required/>

                </div>

                <div class="form-group">

                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="email" required/>

                </div>

                <div class="form-group">

                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="password" required/>

                </div>

                <div class="form-group">

                    <input name="password_confirmation" type="password" class="form-control" id="inputPassword" placeholder="password confirmation" required/>

                </div>

                <button type="submit" class="btn btn-primary">Sign in</button>


            </form>
        </div>
    </div></div></div>

</body>
</html>