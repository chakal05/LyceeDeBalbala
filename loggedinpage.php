  <?php 
  session_start();

  // Check if user is logged in

  if (!isset( $_SESSION['id'])) {
    
  header("Location: index.php");
  exit;

  }
  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Universite de Djibouti</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="loggedinpage.css">
<link rel="stylesheet" type="text/css" media="screen" href="header.css">

  </head>
  <body>

  <?php  include('header.php'); ?>

  </div>

  <div class="container-fluid">

  <div class="gauche">

  <h4>Mes Activites</h4>
  <hr>
  <ul>
    
  <li><a href="#"><i class="fas fa-book-open"></i> Français</a></li>
  <li><a href="#"><i class="fas fa-book-open"></i> Mathématique</a></li>
  <li><a href="#"><i class="fas fa-book-open"></i> Histoire</a></li>
  <li><a href="#"><i class="fas fa-book-open"></i> Physique</a></li>


  </ul>

  </div>



  <div class="info">

  <h4> Informations </h4>
  <hr>
  <p> <i class="fas fa-info-circle"></i> Français: Nouveau document disponible pour téléchargement. </p>
  <p> <i class="fas fa-info-circle"></i> Physique: Devoir prévu pour le 20 Mars 2019. </p>
  <p> <i class="fas fa-info-circle"></i> Français: Devoir à rendre pour le 23 mai.</p> 
  <p> <i class="fas fa-info-circle"></i> Mathématique: Cours du Samedi reporté pour le 20 Mars 2019. </p>
  <p> <i class="fas fa-info-circle"></i> Français: resultat rendu. </p>
  <p> <i class="fas fa-info-circle"></i> Histoire: un object a rendre disponible. </p>
  <p> <i class="fas fa-info-circle"></i> Mathématique: un object avec commentaire non lu. </p>
  <p> <i class="fas fa-info-circle"></i> Histoire: Devoir prévu pour le 20 Mars 2019.</p>
  <p> <i class="fas fa-info-circle"></i> Mathématique: Nouveau document disponible pour téléchargement. </p>
  <p> <i class="fas fa-info-circle"></i> Physique: un object a rendre disponible.</p>
  <p> <i class="fas fa-info-circle"></i> Littérature comparée: un object avec commentaire non lu.  </p>
  <p> <i class="fas fa-info-circle"></i> Physique: Devoir prévu pour le 20 Mars 2019. </p>



  </div>

  </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script src="header.js"></script>
</body>
</html>