<?php 
    function connect() {
        $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno($connection)) { 
            return false;
        } else {
            return $connection;
        }
    }
?>