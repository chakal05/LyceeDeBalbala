<?php
session_start();

if(isset($_FILES['fileToUpload'])){
    $file = $_FILES['fileToUpload'];
    print_r($file);
}
?>