<?php
session_start();
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FAQ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" media="screen" href="../css/faq.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/header.css">
   
</head>
<body>
    <?php include('header.php');   ?>

    <div class= "up">
    <h4> Questions/Réponses </h4>
   </div>
   
    <div class="container-fluid">
    
    <div class="gauche">
    <ul>
        <li><i class="fas fa-angle-double-right"></i> <a href="#">Général</a></li>
        <li><i class="fas fa-angle-double-right"></i> <a href="#">Contacter</a></li>
    </ul>
    </div>


    <div class="right">
    <p>
  
 <b> 1 - Quel est mon identifiant de connexion et mon mot de passe pour une première inscription au lycée Mandela ?</b> <br>
Votre identifiant est email et le mot de passe vous sera fourni par l'administration.

<br>

<b> 2 - Je me réinscris, quel est mon identifiant et mot de passe de connexion ?</b> <br>
Votre identifiant de connexion au serveur de réinscription est votre email.

Votre mot de passe vous sera communiqué par l'administration. <br>

<b> 3 - Déjà étudiant  au lycée Mandela, je souhaite changer de filière, comment faire ?</b> <br>
Pour changer de filière, vous devez obligatoirement effectuer une demande d’admission préalable selon le calendrier et les modalités établis dans l’offre de formation de l'université (Attention, le calendrier peut différé selon les filières).
    </div>
    
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="../css/jquery.js"></script>
<script src="../css/header.js" ></script>
</body>
</html>