<?php
    require_once("connection.php");
session_start();
    if(isset($_SESSION['id'])){
        $user = $_SESSION['id'];
        
        //fetch all the new messages of $user_id(loggedin user) 
        $sql = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='no'";
        $result = mysqli_query($link,$sql);
        //check their are any messages
        if(mysqli_num_rows($result) > 0){
            // Count the messages 
            $x= 0;
           while(mysqli_fetch_array($result)){
               $x++;
           }
            // Output the counter
            echo $x;
        }
    } else {
        echo "session_id not set";
    }
 
?>