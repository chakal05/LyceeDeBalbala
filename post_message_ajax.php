<?php
    require_once("connection.php");
    
    //post message

    if(isset($_POST['message'])){
        $message = mysqli_real_escape_string($link, $_POST['message']);
        $conversation_id = mysqli_real_escape_string($link, $_POST['conversation_id']);
        $user_from = mysqli_real_escape_string($link, $_POST['user_from']);
        $user_to = mysqli_real_escape_string($link, $_POST['user_to']);

        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_from = base64_decode($user_from);
        $user_to = base64_decode($user_to);

        //insert into `messages`
        $sql= "INSERT  INTO `messages` VALUES ('','$conversation_id','$user_from','$user_to','$message',NOW(),'no')";
        $q= mysqli_query($link,$sql);
        
        if($q){

            //insert was successful
            echo "Posted";

           } else {
           
              //insert failed
              echo "Error";
           
           }

    }

  
?>