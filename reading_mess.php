<?php
require_once("connection.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="">

    
</head>
<body>
    
    <?php include("header.php");     ?>
    
    <div class="container">

    
  <?php
if(isset($_SESSION['id'])){
    $user_id= $_SESSION['id'];
    if(isset($_GET['conversation_id'])){
        $conversation = $_GET['conversation_id'];
       $query = "SELECT * FROM `messages` WHERE conversation_id='$conversation'";
       $result = mysqli_query($link, $query);

       if(mysqli_num_rows($result) > 0){

        

        while ($row = mysqli_fetch_array($result)) {
            //format the message and display it to the user
            

            $user_from = $row['user_from'];
            $user_to = $row['user_to'];
            $message = $row['message'];
            $time = $row['time'];
        
            //Check if user has right to see the message

            if($user_id == $user_from or $user_id == $user_to){
            // get sender username

            $user = mysqli_query($link, "SELECT username FROM `class` WHERE id='$user_from'");
            $user_fetch = mysqli_fetch_assoc($user);
            $user_from_username = $user_fetch['username'];
          
            echo "
                
              
                <div class='text-con'>
                <a href='#''>{$user_from_username}</a>
                <p>{$message}</p>
                <p>{$time}</p>
                    </div>
            
            
            ";

            if($user_id == $user_to){
             $sql= "UPDATE `messages` set user_to_read= 'yes' where conversation_id=$conversation";
             $query= mysqli_query($link, $sql);
            }

            }

        }
       }else {
           echo "no discussion found";
       }

    }else{
        echo "conversation id not found";
    }


}

?>


<div class="form-group">
        
        <textarea class="form-control" id="message" rows="3" name="message" placeholder="Reponse"></textarea>
        </div>
         <input type="hidden" id="conversation_id" name="conversation_id" value="<?php echo base64_encode($conversation); ?>">
                <input type="hidden" id="user_from" name="user_from" value="<?php echo base64_encode($user_to); ?>">
                <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($user_from); ?>">
        
        <button type="button" class="btn btn-success" name= "send" id="send">Envoyer</button>
                 <span id="error"></span>
                 
        </div>

        <?php

    //post message

        if(isset($_POST['message'])){
        $message = mysqli_real_escape_string($link, $_POST['message']);
        $conversation_id = $conversation;
        $sender=  $user_id;
        $user_to = $user_from;
       
        //insert into `messages and update message status to 'no' for recipient`
        
        $q = mysqli_query($link, "INSERT INTO `messages` 
        VALUES ('','$conversation_id','$user_to','$user_id','$message',NOW(),'yes','no')");
        
        // if query successfull
        if($q){
            echo "Posted";
          
        }else{
            echo "Error";
        }
    
    }
   

   
?>


    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
 <script src="script.js"></script>
</body>
</html>