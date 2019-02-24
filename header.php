<?php 



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">

    
</head>
<body>
        <div class="tout">
    <div class="logo">
   <img src="logo_devise.jpg">
   </div>
    <nav>

        <ul>
     <li>
      <div class="dropdown">
            <a class="btn dropdown-toggle green" href="#" role="button"id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="btn  dropdown-toggle green" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <a class="btn dropdown-toggle green" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Aide/soutien 
            </a>
            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Questions frequentes</a>
                <a class="dropdown-item" href="#">Une autre forme d'aide</a>  </div>
            </div>
        </li>

        <li>
  <a href="pm_list.php"><i class="fas fa-envelope"></i></a>
                         
       
        </li>
        <li>
            
               <a class="dropdown-item" href="index.php?logout=1">LOG OUT</a>
               
        </li>
        <li>
                <div class="dropdown username">
                    <a class="btn dropdown-toggle" href="#" role="button" id="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php echo $_SESSION['username']; ?>
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="index.php?logout=1">LOG OUT</a>
                        <a class="dropdown-item" href="#">Une autre forme d'aide</a>  </div>
                    </div>
                </li>
    </ul>


</nav>
     </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery.js"></script>
</body>
</html>