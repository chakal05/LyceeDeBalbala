<?php

        require_once("connection.php");
        session_start();
        $user= "";
        $target_dir = "uploads/";
        if(isset($_SESSION['id'])){
            $user = $_SESSION['id'];
        }

        // Delete message
// This part working. Add button success to inform user of the success of the operation

        if(isset($_POST['submit'])){
           
            $checked = $_POST['checkbox']; 
      foreach ($checked as $id) {
    
            $sql = "DELETE FROM `messages` WHERE id='$id' AND user_to='$user'";
            $query = mysqli_query($link, $sql);
            if(!$query){
                echo "SORRY something went wrong";
            }else{
                header("Location: pm_list.php");
            }
        }
        
        }

        // Delete sent messages

        if(isset($_POST['bort'])){
           
            $checked = $_POST['checkbox']; 
      foreach ($checked as $id) {
    
            $sql = "DELETE FROM `messages` WHERE id='$id' AND user_from='$user'";
            $query = mysqli_query($link, $sql);
            if(!$query){
                echo "SORRY something went wrong";
            }else{
                header("Location: sent.php");
            }
        }
        
        }

        
        // Delete uploaded files 

        if(isset($_POST['delete'])){

            $checked = $_POST['checkbox'];
    foreach ($checked as $name) {
       $fileDel = unlink($target_dir.$name);
        $sql = "DELETE FROM `uloaded` WHERE file_path='$name' AND user='$user'";
        $query = mysqli_query($link, $sql);

        if(!$query && !$fileDel){
            echo "SORRY something went wrong";
        }else{
            header("Location: mesdocuments.php");
        }

    }
        
        }

            
        
        

?>