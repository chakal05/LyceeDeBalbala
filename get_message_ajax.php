<?php
include("connection.php");
session_start();

    if(isset($_SESSION['id'])){
        $user = $_SESSION['id'];
        
        //fetch all the new messages of $user_id(loggedin user) 
        $sql = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='no'";
        $result = mysqli_query($link,$sql);
        //check their are any messages
        if($row = mysqli_num_rows($result)){
            // Count the messages and output it
            echo $row;
        }
    } else {
        echo "session_id not set";
    }
 
?>