<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="header.css">


<?php 
$_user = $_SESSION['username'];
echo "

<div class='content'>
    <div class='logo'>
   <img src='logo_devise.jpg'>
   </div>

   <nav class='navbar navbar-expand-lg'>
        <button class='navbar-toggler navbar-light bg-light ' type='button' data-toggle='collapse' data-target='#navbarTogglerDemo03' aria-controls='navbarTogglerDemo03' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <a class='navbar-brand' href='#'>$_user</a>
      
        <div class='collapse navbar-collapse' id='navbarTogglerDemo03'>
          <ul class='navbar-nav mr-auto mt-2 mt-lg-0'>
           

                <div class='btn-group'>
                        <button type='button' class='btn dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Activites
                        </button>
                        <div class='dropdown-menu'>
                                <a class='dropdown-item' href='loggedinpage.php'>Acceuil</a>
                                <a class='dropdown-item' href='literaturefr.php'>Littérature française</a>
                                <a class='dropdown-item' href='#'>Littérature comparée</a>
                                <a class='dropdown-item' href='#'>Linguistique générale</a>
                                <a class='dropdown-item' href='#'>Méthodologie de l'écrit</a>
                                <a class='dropdown-item' href='#'>Langue choisie: anglais</a>
                             </div>
                      </div>
                      <div class='btn-group'>
                            <button type='button' class='btn dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Documents
                            </button>
                            <div class='dropdown-menu'>
                                    <a class='dropdown-item' href='mesDocuments.php'>Mes documents</a>
                                </div>
                          </div>

             <div class='btn-group'>
                        <button type='button' class='btn dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Aide/Soutein 
                        </button>
                        <div class='dropdown-menu'>
                                <a class='dropdown-item' href='#'>Questions frequentes</a>
                                <a class='dropdown-item' href='#'>Une autre forme d'aide</a> 
                     </div>
                      </div>
          </ul>

               
          <button type='button' class='btn btn-success'>
          <a href='pm_list.php'>Messagerie </a> <span class='badge badge-light'></span>
          </button>
    
              <div class='btn-group'>
                    <button type='button' class='btn btn-danger dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                     $_user
                    </button>
                    <div class='dropdown-menu'> <a class='dropdown-item' href='index.php?logout=1'>LOG OUT</a>
                        <a class='dropdown-item' href='#'>Profile</a> 
                      </div>
                  </div>
        </div>
      </nav>
</div>

";


?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery.min.js"></script>
 <script src="header.js"></script>