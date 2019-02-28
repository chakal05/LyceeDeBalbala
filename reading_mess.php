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
    
    if(isset($_GET['conversation_id'])){
        $conversation = $_GET['conversation_id'];
       $query = "SELECT * FROM `messages` WHERE conversation_id='$conversation'";
       $result = mysqli_query($link, $query);

       if(mysqli_num_rows($result) > 0){
        while ($m = mysqli_fetch_array($result)) {
            //format the message and display it to the user
            $user_from = $m['user_from'];
            $user_to = $m['user_to'];
            $message = $m['message'];
            $time = $m['time'];
        
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


        }
       }

    }else{
        echo "cant";
    }


}

?>
</body>
</html>