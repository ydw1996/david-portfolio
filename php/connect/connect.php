<?php
    $host = "localhost";
    $user = "didekdnlt1996";
    $pw = "zhdhsl1325!";
    $dbName = "didekdnlt1996";
    $connect = new mysqli($host, $user, $pw, $dbName);
    $connect -> set_charset("utf8");
    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        // echo "database connect true";
    }
?>