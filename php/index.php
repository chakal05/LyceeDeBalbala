<?php
session_start();
  $error = "";
  $missing = "";

  // Logging out the user

  if (array_key_exists('logout', $_GET) == '1') {
        header("location: index.php");
        session_unset();
        session_destroy();
        exit;
    } 
    
    if (isset( $_SESSION['id'])) {
    
    header("Location: loggedinpage.php");
    
    } else if (array_key_exists('submit', $_POST))  {
    
    include("connection.php");
    if(mysqli_connect_error()) {
        die("database error".mysqli_connect_error());
    }
    
    if(!$_POST['email']) {
        $missing.= "Email absent <br>";
    } 
    
    if($_POST['email'] && filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) === false) {
        $error.= "Votre email n'est pas valide<br>";
    }
    
    if(!$_POST['password']) {
        $missing.= "Mot de passe absent<br>";
    } 
    if($missing != "") {
        $error .= "Les espaces suivants doivent etre remplis: <br>" .$missing;
    }
    if($error != "") {
      
        $error = '<div class="alert alert-danger" role="alert"><p> Il y a des erreurs dans votre formulaire </p>' . $error . '</div>';
        
    } else {
        
    
    $query = "SELECT * FROM `etudiants` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password ='".mysqli_real_escape_string($link, $_POST['password'])."' LIMIT 1";
     
    $result = mysqli_query($link, $query);
    $row =  mysqli_fetch_array($result);
    
    if (isset($row)) {

    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];
    header("Location: loggedinpage.php");
    exit;

    } else {
                   $error = '<div class="alert alert-danger" role="alert"><p>Email et/ou mot de passe non reconnu. Controllez svp</p></div>';
        
         }
        
    } 

    }
   
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Lycée de Balbala</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="../css/index.css">


    </head>
    <body>

    <div class= "container">

    <div class="logo">
    <img src="../images/mandela.jpg">
    </div>

    <div class="center">
    <h1> Lycée Mandela</h1>

    <div id="errorMessage"> <?php echo $error ?> </div>

    <form method="POST" >

    <div class="form-group">


    <input type="email" class="form-control" id="email" placeholder="Votre Email " name="email">
    </div>

    <div class="form-group">

    <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="password">
    </div>

    <button type="submit" class="btn btn-success"  name="submit">Se connecter</button>

    </form>

    <footer>

    <ul>

    <li ><i class="far fa-copyright"> <?php echo date("Y");?> Lycée Mandela</i></li>
    <li >Djibouti, DJIBOUTI </li>
    <li >TEL:(+253)21 35 40 42</li><br>
    <li>
        <ul>
    <li ><a href="#"><i class="fas fa-envelope"></i></a></li>
    <li ><a href="#"><i class="fab fa-facebook-square"></i></a></li>
    <li ><a href="#"><i class="fab fa-twitter-square"></i></a></li>
    <li ><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
    </li>
    </ul>

    </footer>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script src="script.js"></script>
</body>
</html>