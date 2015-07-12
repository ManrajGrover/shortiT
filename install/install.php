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
    $emailid =mysqli_real_escape_string($connection,$_POST['email']);
    $username =mysqli_real_escape_string($connection,$_POST['username']);
    $pass =encrypt_password($_POST['password']);
    if($_POST['submit']) {
        $create_user_table = 'CREATE TABLE users( '.
                             'user_id INT NOT NULL AUTO_INCREMENT, '.
                             'username VARCHAR(50) NOT NULL, '.
                             'emailid VARCHAR(50) NOT NULL, '.
                             'password VARCHAR(100) NOT NULL,'.
                             'primary key ( user_id ))';
        $query = mysqli_query($connection,$create_user_table);
        if(!$query){
            echo "DB Error! No table created! Aborting";
            die();
        }
        $create_user = "INSERT INTO `".DB_NAME."`.`users` (`username`,`emailid`, `password`) VALUES ('".$username."','".$emailid."','".$pass."');";
        $query = mysqli_query($connection,$create_user);
        if(!$query){
            echo "DB Error! No user created! Aborting";
            die();
        }
        copy('config.php', '../admin/config.php');
        header('Location: completed.php');
    } else{
        header('Location:'.YOUR_ORIGINAL_SITE);
    }
?>