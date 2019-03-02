<?php
    require_once("connection.php");
session_start();
    if(isset($_SESSION['id'])){
        $user = $_SESSION['id'];
        //get the conversation id and
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $sql = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='no'";
        $result = mysqli_query($link,$sql);
        //check their are any messages
        if(mysqli_num_rows($result) > 0){
            while ($m = mysqli_fetch_assoc($result)) {
                //format the message and display it to the user
                $user_from = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];
 
                //get name and image of $user_form from `user` table
                $user = mysqli_query($link, "SELECT username FROM `class` WHERE id='$user_from'");
                $user_fetch = mysqli_fetch_assoc($user);
                $user_from_username = $user_fetch['username'];
              
 
                //display the message
        echo "

     
            <tr>

        <td>{$message}</td>
        <td>{$user_from_username}</td>
        <td> 19/02/10 14:34</td> 
        
        </tr>
       
                   " ;      
 
            }
        }
    } else {
        echo "session_id not set";
    }
 
?>