<?php
session_start();
require_once("connection.php");

if(!isset($_SESSION['id'])){
    header("location: index.php");
}else{
    $user= $_SESSION['id'];
}

$sucess = "<button type='button' class='btn btn-secondary btn-lg btn-block'>Votre document est charger</button>";

$target_dir = "uploads/";
$file = $_FILES["fileToUpload"];
$target_file = $target_dir . basename($file["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$allowedMimeTypes = array( 
    'application/msword',
    'application/pdf',
    'text/plain'
  );
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else if(in_array( $file["type"], $allowedMimeTypes ) ) {
        $uploadOk = 1;
    }
}
// Check if file already exists

// Check file size
if ($file["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats (not working fix it)
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "doc" && $imageFileType != "docx" ) {
    echo "Sorry, only JPG, JPEG, PNG, PDF, TXT, DOC, DOCX & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    // Change the name of the file to avoid conflicts of names in database 
    $cleanName = str_replace(' ','_',$file['name']);
    $date = date_create();
    $timest = date_timestamp_get($date);
    $pathName = $timest.$cleanName;
    $name = $file["name"];
    $target_file = $target_dir.$pathName;
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
  // Insert in database
        $sql = "INSERT INTO `uloaded` VALUES ('','$user','$name','$pathName')";
        $query= mysqli_query($link,$sql);
        
        if($query){

            //insert was successful
          header("Location: mesDocuments.php");     
          echo $sucess; // find a way to pass this variable to mesDoc.php to alert user of succes    
        } else {
              //insert failed
              echo "Error";
           
           }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

     // Uploading profil picture 


     $target_dir = "userPic/";
     $file = $_FILES["profilPic"];
     $target_file = $target_dir . basename($file["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     $allowedMimeTypes = array( 
         'application/msword',
         'application/pdf',
         'text/plain'
       );
     // Check if image file is a actual image or fake image
     if(isset($_POST["profil"])) {
         $check = getimagesize($file["tmp_name"]);
         if($check !== false) {
             $uploadOk = 1;
         } else if(in_array( $file["type"], $allowedMimeTypes ) ) {
             $uploadOk = 1;
         }
     }
     // Check if file already exists
     
     // Check file size
     if ($file["size"] > 500000) {
         echo "Sorry, your file is too large.";
         $uploadOk = 0;
     }
     // Allow certain file formats (not working fix it)
     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
     && $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "doc" && $imageFileType != "docx" ) {
         echo "Sorry, only JPG, JPEG, PNG, PDF, TXT, DOC, DOCX & GIF files are allowed.";
         $uploadOk = 0;
     }
     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
     // if everything is ok, try to upload file
     } else {
         // Change the name of the file to avoid conflicts of names in database 
         $cleanName = str_replace(' ','_',$file['name']);
         $date = date_create();
         $timest = date_timestamp_get($date);
         $pathName = $timest.$cleanName;
         $name = $file["name"];
         $target_file = $target_dir.$pathName;
         if (move_uploaded_file($file["tmp_name"], $target_file)) {
       // Insert in database
             $sql = "INSERT INTO `userpic` VALUES ('','$user','$name','$pathName')";
             $query= mysqli_query($link,$sql);
             
             if($query){
     
                 //insert was successful
               header("Location: profil.php");     
               echo $sucess; // find a way to pass this variable to mesDoc.php to alert user of succes    
             } else {
                   //insert failed
                   echo "Error";
                
                }
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
     
?>
