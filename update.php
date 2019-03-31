<?php
session_start();
require_once("connection.php");
$user ="";
if(isset($_SESSION['id'])){
    $user = $_SESSION['id'];
}

// Update checked messages to unread
if(isset($_POST['unread'])){
    echo "post unread finns<br>";
     $checked = $_POST['checkbox'];

foreach ($checked as $id) {
    echo "Message id is: ".$id."<br>";
   
    $sql =  "UPDATE `messages` SET user_to_read='no' WHERE id='$id'";
    $query = mysqli_query($link, $sql);
// This part working. Add button success to inform user of the success of the operation
    if(!$query){
        echo "SORRY something went wrong";
    }else{
        echo "Message updated to unread";
    }
   
}

}


?>