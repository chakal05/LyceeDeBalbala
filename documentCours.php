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
    <link rel="stylesheet" type="text/css" media="screen" href="documentCours.css">
    <script src=""></script>
</head>
<body>
    <?php include('header.php');   ?>

    <div class="container">
    
    <div class="left">
    <ul>
    <li><a href="#">some links</a></li>
    <li><a href="#">some links</a></li>
    <li><a href="#">some links</a></li>
    <li><a href="#">some links</a></li>
    <li><a href="#">some links</a></li>
    </ul>
    </div>
    
    <div class="right">
    <table class="table">
  <thead class="thead-dark">
    <tr>
     
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php   
     $file = "files/litterature.pdf";
     echo "<td><a href='download.php?name=".$file."'>literrature francaise du 21 eme siecle </a></td>";
    ?>
      <td>123 KB</td>
     
    </tr>
    <tr>
     <td><a href="#">literrature comparee par Abdourahman Yacin</a></td>
      <td>120 KB</td>
     
    </tr>
    <tr>
     
      <td><a href="#">Linguistique: recherche par Noor Farah</a></td>
      <td>150 KB</td>
     

    </tr>
  </tbody>
</table>

    </div>
    </div>
</body>
</html>