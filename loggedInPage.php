<?php

    session_start();


    if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
              
        echo "<p><a href='index.php?logout=1'>Se deconnecter</a></p>";
        
      } else {
          
          header("Location: index.php");
          
      }
  


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Universite de Djibouti</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="loggedPage.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="jquery-ui.min.css">

    
</head>
<body>

    <div class="logo">
        <img src="logo_devise.jpg">
        </div>

        <nav>

        <ul>
               <li>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Activites
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Une action</a>
                      <a class="dropdown-item" href="#">une autre action</a>
                    </div>
                  </div>
                </li>

                <li>
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mes documents
                        </a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Voir mes documents</a>
                          <a class="dropdown-item" href="#">Faire une autre action</a>
                        </div>
                      </div>
                    </li>
               
                <li>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Aide/soutien 
                    </a>
                  
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Questions frequentes</a>
                      <a class="dropdown-item" href="#">Une autre forme d'aide</a>  </div>
                  </div>
                </li>

                <li>
                  <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Messages
                      </a>
                    
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Messages recus</a>
                        <a class="dropdown-item" href="#">Messages envoyes</a>
                      </div>
                    </div>
                  </li>
  

            </ul>

            <button type="button" class="btn btn-success">Username</button>
        </nav>
     
    <div class="container">
        
      <div class="activite">

        <h2>Mes Activites</h2>

        <ul>
            
          <li><a href="#"><i class="fas fa-book-open"></i> Littérature française </a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Linguistique</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Littérature comparée</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Méthologie du FLE</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Méthologie de l'écrit</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Littérature  anglaise</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Littérature comparée</a></li>
          <li><a href="#"><i class="fas fa-book-open"></i> Linguistique anglaise</a></li>


        </ul>

      </div>

     

      <div class="info">

        <h2> Informations </h2>

        <a href="#"><i class="far fa-envelope"></i> Littérature comparée: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthologie du FLE: Séminaire prévu pour le 20 Mars 2019</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthodogie de l'écrit: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Littérature comparée: un object a rendre disponible</a><br>
        <a href="#"><i class="far fa-envelope"></i> Littérature francaise: un object avec commentaire non lu</a><br>
       <a href="#"><i class="far fa-envelope"></i> Littérature comparée: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthologie du FLE: Séminaire prévu pour le 20 Mars 2019</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthodogie de l'écrit: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Littérature comparée: un object a rendre disponible</a><br>
        <a href="#"><i class="far fa-envelope"></i> Littérature francaise: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Littérature comparée: un object avec commentaire non lu</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthologie du FLE: Séminaire prévu pour le 20 Mars 2019</a><br>
        <a href="#"><i class="far fa-envelope"></i> Méthodogie de l'écrit: un object avec commentaire non lu</a><br>
        

      </div>

    </div>
  
    <footer>

      <ul>

        <li><i class="far fa-copyright"></i> 2019 Universite de Djibouti</li>
        <li>Campus de Balbala</li>
        <li>Croisement RN5 BP 1904</li>
        <li><i class="fas fa-phone"></i> (+253) 21 31 55 55</li>
        <li><i class="far fa-envelope"></i> ud@univ.edu.dj</li>
        <li><i class="fab fa-facebook-f"></i> </li>
        <li><i class="fab fa-twitter"></i></li>
        <li><i class="fab fa-youtube"></i></li>
      </ul>

    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

 <script src="index.js"></script>
</body>
</html>