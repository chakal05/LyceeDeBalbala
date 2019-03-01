<?php
require_once("connection.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Read message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="">
    <script src=""></script>
</head>
<body>
    <?php include("header.php"); ?>


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
                <a a href='#''>{$user_from_username}</a>
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
                <input type="hidden" id="user_from" name="user_from" value="<?php echo base64_encode($user_from); ?>">
                <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($user_to); ?>">
        
        <button type="button" class="btn btn-success" name= "send" id="send">Envoyer</button>
                 <span id="error"></span>
                 
        </div>

    
</body>
</html>