<?php
session_start();

$success = "";
$error = "";
$missing = "";

    if (array_key_exists("Logout", $_GET)) {

        unset($_SESSION);

    }else if(array_key_exists("email", $_SESSION)) {

        header("Location: loggedInPage.php");

    }

    if (array_key_exists("submit", $_POST))  {
    
    $link = mysqli_connect("127.0.0.1", "root", "", "etudiants");

    if(mysqli_connect_error()) {
        die("database error");
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
      
        $error = '<div class="alert alert-danger" role="alert"><p>Il y a des erreurs dans votre formulaire</p>' . $error . '</div>';
        
    } else {

        $query = "SELECT `Email` FROM `class` WHERE Email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
        $result = mysqli_query($link, $query);
    
        if (mysqli_num_rows($result) > 0) {
            $query = "SELECT `Password` FROM `class` WHERE `Password` = '".mysqli_real_escape_string($link, $_POST["password"])."' LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_num_rows($result);

            if($row ) {
               $_SESSION['email'] = $_POST['email'];

               header("Location: loggedInPage.php");
            }
             
    
        }else {
            
        $error = '<div class="alert alert-danger" role="alert"><p>Ce compte n existe pas dans notre base</p>' . $error . '</div>';
        
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
    <link rel="stylesheet" type="text/css" media="screen" href="index.css" />

    
</head>
<body>

    <div class="container">
    <h1> Lycée De Balbala</h1>
    <div id="errorMessage"> <?php echo $error.$success; ?> </div>
    <form method="POST">
     <div class="form-group">
             
             <input type="email" class="form-control" id="email" placeholder="Votre Email " name="email">
           </div>

           <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="password">
              </div>

              <button type="submit" class="btn btn-success" name="submit" >Se connecter</button>

        </form>
    </div>
  

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="index.js"></script>
</body>
</html>