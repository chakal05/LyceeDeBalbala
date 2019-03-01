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
        
        //Get date and time
            
        $now = new DateTime();
        $nowDate = $now->format('Y-m-d');
        $nowTime = $now->format('H:i:s');
        $tiden= $nowDate." at ".$nowTime;
   
   



        //insert into `messages`
        
        $q = mysqli_query($link, "INSERT INTO `messages` 
        VALUES ('',
        '$conversation_id',
        '$user_from',
        '$user_to',
        '$message',
         NOW(),
        'yes',
        'no')");
        
        if($q){
            echo "Posted";
          
        }else{
            echo "Error";
        }
    }

   
?>