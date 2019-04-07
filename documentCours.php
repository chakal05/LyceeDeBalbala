<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Documents Cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="documentCours.css">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">
   
</head>
<body>
    <?php include('header.php');   ?>

    <div class= "up">
    <h4> Documents à télécharger  </h4>
   </div>
   
    <div class="container-fluid">
    
    <div class="gauche">
    <ul>
    <li><i class="fas fa-angle-double-right"></i> <a href="literaturefr.php">Bienvenu au cours  </a></li>
    <li><i class="fas fa-angle-double-right"></i> <a href="#">Documents pour le cours </a></li>

    </ul>
    </div>
    
    <div class="right">
    <table class="table">
  <thead class="thead">
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php   
     $file = "files/litterature.pdf";
     echo "<td><a href='download.php?name=".$file."'>Littérature française du 21 eme siecle </a></td>";
    ?>
      <td>123 KB</td>
     
    </tr>
    <tr>
    <?php   
     $file = "files/hlf.pdf";
     echo "<td><a href='download.php?name=".$file."'>Une histoire de la littérature française </a></td>";
    ?>
      <td>120 KB</td>
     
    </tr>
    <tr>
    <?php   
     $file = "files/syllabus1.pdf";
     echo "<td><a href='download.php?name=".$file."'> La littérature française du moyen age </a></td>";
    ?>
      <td>150 KB</td>
     

    </tr>
  </tbody>
</table>

    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="header.js" ></script>
</body>
</html>