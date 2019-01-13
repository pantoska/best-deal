<!DOCTYPE html>
<html>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="?page=index">Best deal</a>
        </div>

        <div>
            <?php if(isset($_SESSION) && !empty($_SESSION))
            {?>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="?page=index">Home</a></li>
                    <li><a  class='upload' href="?page=upload">Upload bargain</a></li>
                </ul>

                 <form action="?page=searcher" method="POST" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input name="text" type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>


                <ul class="nav navbar-nav navbar-right" id="right">
                    <li><a>You are logged as:<?php echo $_SESSION['username']?></a></li>
                    <li><a class="logout" href="?page=logout">Logout</a></li>
                </ul>

            <?php } else { ?>

                <form action="?page=searcher" method="POST" class="navbar-form navbar-left">
                    <div class="form-group">
                        <input  name="text" type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

                <ul class="nav navbar-nav navbar-right" id="right">
                    <li><a href="?page=login">Sign in</a></li>
                    <li><a href="?page=register">Sign up</a></li>
                </ul>

            <?php } ?>

        </div>
    </div>
</nav>

</html>
