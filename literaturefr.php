<?php
 session_start();
if(!isset($_SESSION['id'])){

    header('Location:index.php');
    exit();
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Litterature francaise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="literaturefr.css">
    <script src=""></script>
</head>
<body>
    <?php include('header.php'); ?>

    <h2>Littérature française</h2>

    <div class="container">
    
    <div class="left">
   <div>
   <ul>
   <li><a href="documentCours.php">Documents pour le cours</a></li>
   </ul>
   </div>
    </div>
    
    <div class="right">
    </div>
    
    
    </div>
</body>
</html>