<?php

     require_once("connection.php");
    session_start();
    if(!isset($_SESSION['id'])){
        header( "location: loggedinpage.php");
    }



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen">

    
</head>
<body>
    
    <?php include("header.php");  echo " <a href='index.php'>Retour</a>";   ?>
    
</body>
</html>