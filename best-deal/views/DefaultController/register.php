<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html') ?>

<body>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="?page=index">Best deal</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="?page=index">Home</a></li>
            <li><a href="?page=login">Sign in</a></li>
            <li><a href="?page=register">Sign up</a></li>
            <li><a href="?page=logout">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="form-heading">Login Form</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Register</h2>
                <p>Please enter your data</p>
            </div>
            <form id="Register" action="?page=register" method="POST">

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