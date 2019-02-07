<?php

    session_start();


    if (isset($_SESSION['id']) && $_SESSION['id'] == true) {
              
        echo "<p><a href='index.php?logout=1'>Se deconnecter</a></p>";
        
      } else {
          
          header("Location: index.php");
          
      }
  


?>
