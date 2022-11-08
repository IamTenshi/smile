<?php 
    $dbhost="localhost";
    $dbport=3306;
    $dbuser="root";
    $dbpassword="1223334444";
    $dbname="mysql_php_connection";
    $error = array();
    
    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname, $dbport)
        or die ('Could not connect to the database server' . mysqli_connect_error());

    mysqli_select_db($conn,$dbname)
        or die ("No se encuentra la Base de datos");

    mysqli_set_charset($conn,"utf8");
?>