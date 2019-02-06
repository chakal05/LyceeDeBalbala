<?php

    session_start();

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }
    
    if (array_key_exists("id", $_SESSION)) {
              
        echo "<p>Vous etes dans votre compte <br> <a href='index.php?Logout=1'>Se deconnecter</a></p>";
        
      } else {
          
          header("Location: index.php");
          
      }
  


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Platforme etudiante lycee de Balbala</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
   
</head>
<body>

    <div class="logo">
        <h2>Lycée de</h2>
        <h1>Balbala</h1>
    </div>

    <header>

    <ul>
    
    <li>Messages</li>
    <li>Notes</li>
    <li>Nouvelles du Lycée</li>
    <li>Calendrier</li>
    <li>Contacts en ligne</li>
    <li>Aide</li>
    
    </ul>

    </header>


<script src="main.js"></script>
</body>
</html>