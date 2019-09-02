<?php
  require_once("connection.php");
    session_start();
 $user_id="";
    if(!isset($_SESSION['id'])){
        header( "location: pm_list.php");
    } else{
        $user_id= $_SESSION['id'];
    }
    
    //Post message

    $success = "";
  if(isset($_POST['send'])){
    if(isset($_POST['message']) && $_POST['message'] !== '' && isset($_POST['receiver']) && $_POST['receiver'] !== ''){

        $message = mysqli_real_escape_string($link, $_POST['message']);
        $conversation_id = mysqli_real_escape_string($link, $_POST['conversation_id']);
        $receiver = mysqli_real_escape_string($link, $_POST['user_to']);
    
        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_to =  base64_decode($receiver);
        $user_from = $user_id;
        //insert into `messages`
        
        $sql= "INSERT  INTO `messages` VALUES ('','$conversation_id','$user_from','$user_to','$message',NOW(),'no')";
        $q= mysqli_query($link,$sql);
    
        if($q){
    
        //insert was successful
        $success = "<button type='button' class='btn btn-success btn-sm btn-block succes pmb'>Votre message a été posté.</button>";
    
        } else {
    
            //insert failed
            echo "Error";
    
        }
            
        }
        
      
        // Warning if messaging area empty
    
       
    
        if( !$_POST['message'] && !$_POST['receiver'] ){
            $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb'>Espaces message et/ou destinataire sont vides.</button>";
        }else if(!$_POST['receiver']){
            $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb '>Espace destinataire vide.</button>";
        }else if(!$_POST['message']){
            $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb '>Espace message vide.</button>";
        }
    
  }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/new_pm.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/header.css">
  
    
</head>
<body>

    <?php
    include('header.php');
    ?>
    
    <div class="container-fluid">
        
    <div class="gauche">
    <h4>Contacts</h4>
    <ul class="list-group">

    <?php

    //show all the users expect logged in user

    $q = mysqli_query($link, "SELECT * FROM `etudiants` WHERE id!='$user_id'");

    //display all the results

    while($row = mysqli_fetch_assoc($q)){

    echo "<a href='new_pm.php?id={$row['id']}'><li>{$row['username']}</li></a>";

    }
    ?>
    </ul>

        <a href="pm_list.php" id="back"><i class="fas fa-angle-double-left"></i> Retour</a>
    </div>


    <div class="right">
    
    <?php 
    $receiver="";
    $receiverId="";
    $conversation_id="";
    if(isset($_GET['id'])) {
    //Check if user 2 is valid

    $user_to = trim(mysqli_real_escape_string($link, $_GET['id']));
    $query = mysqli_query($link, "SELECT * FROM `etudiants` WHERE id='$user_to' AND id!='$user_id'");

    if(mysqli_num_rows($query) > 0) {

    // display in Destinataire field if user 2 valid

    while($row = mysqli_fetch_assoc($query)){
    $receiver =  $row['username'];
    $receiverId = $row['id'];
    }

    //check $user_id and $user_two has conversation or not. If not start one
    $conver = mysqli_query($link, "SELECT * FROM `conversation` WHERE (user_one='$user_id' AND user_two='$receiver') OR (user_one='$user_to' AND user_two='$user_id')");

    //they have a conversation
    if(mysqli_num_rows($conver) == 1){
    //fetch the converstaion id
    $fetch = mysqli_fetch_assoc($conver);
    $conversation_id = $fetch['id'];
    }else{ //they do not have a conversation
    //start a new converstaion and fetch its id
    $q = mysqli_query($link, "INSERT INTO `conversation` VALUES ('','$user_id','$receiver')");
    $conversation_id = mysqli_insert_id($link);
    }
                
        }   else {
            die ("INVALID id");
        }
            
            
    }
    ?>
                  
                  
    <!-- store conversation_id, user_from, user_to  -->

    <form method="post">
    <div class="form-group">
    <?php echo $success; ?>
    <label for="receiver"><b>Destinataire</b></label>
    <input type="text" class="form-control" id="receiver" name="receiver" placeholder="Choisissez un contact"  value= "<?php echo  $receiver; ?>" >
    </div>
    <div class="form-group">
    <label for="message"><b>Message</b></label>
    <textarea class="form-control" id="message" rows="3" name="message" placeholder="Tappez votre message ici"></textarea>
    </div>
    <input type="hidden" id="conversation_id" name="conversation_id" value="<?php echo base64_encode($conversation_id); ?>">
    <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($receiverId); ?>">
    <button type="submit" class="btn btn-success" name= "send" id="send">Envoyer</button>
    <span id="error"></span>

    </div>
    </form>
    </div>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="../js/jquery.js"></script>
<script src="../js/header.js" ></script>

</body>
</html>