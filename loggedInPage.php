<?php

    session_start();

    if(array_key_exists("email", $_SESSION)) {
        echo "<p>Vous etes dans votre compte <br> <a href='index.php?Logout=1'>Se deconnecter</a></p>";
    } else{
        header("Location: index.php");
    }


?>

