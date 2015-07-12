<?php
    require_once('config.php');
    require_once("../admin/php/connection.php");
    $connection  =  connect();
    if($connection === false) {
        header('Location: error.php');
    }
    else if(file_exists('../admin/config.php')){
        header('Location:'.YOUR_ORIGINAL_SITE);
    }
    require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Final Installation Steps | shortiT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
        <!-- BootStrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- Import Font Face -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom JS file -->
        <script src="js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="errorArea">
                <?php
                    if(isset($_GET['found'])&&($_GET['found']=='f')) {
                        echo "Please enter valid details";
                    }
                    else if(isset($_GET['found'])&&($_GET['found']=='er')) {
                        echo "Connection error.";
                    }
                ?>
            </div>
            <div class="row center">
                <form role="form" action="install.php" METHOD="POST">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control input-lg" id="inputEmail" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control input-lg" id="inputUsername" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control input-lg" id="inputPassword" name="password" placeholder="Enter Password">
                    </div>
                    <input type="submit" value="Install" name="submit" class="btn btn-default input-lg">
                </form>
            </div>
        </div>
    </body>
</html>