<?php

        require_once("connection.php");
        session_start();
        $user= "";
        echo $user;
        if(isset($_SESSION['id'])){
            $user = $_SESSION['id'];
        }

        
        if(isset($_POST['submit'])){
            $checked = $_POST['checkbox'];
        foreach ($checked as $id) {
            $sql = "DELETE FROM `messages` WHERE id='$id'";
            $query = mysqli_query($link, $sql);
        
            if(!$query){
                echo "SORRY something went wrong";
            }else{
                echo  $id." has been deleted";
            }
        }
        
        }
        


?>