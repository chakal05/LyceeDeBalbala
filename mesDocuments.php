<?php
session_start();
require_once("connection.php");
if(!isset($_SESSION['id'])){
    header("location: index.php");
}else{
    $user = $_SESSION['id'];
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="mesdocuments.css">

    
</head>
<body>

<div>
<?php include("header.php"); ?>
</div>

<div class="container">

<div class="left">
<h3>Mes documents</h3>
    <?php 
$sql = "SELECT * FROM `uloaded` WHERE user='$user'";
$result = mysqli_query($link,$sql);
//check their are any messages
if(mysqli_num_rows($result) > 0){

    // format and display

    while($row= mysqli_fetch_array($result)){
        $fileName = $row["file_name"];
        $path= $row['file_path'];
       // echo "<a href='uploads/{$path}'>$fileName</a><br>";
      echo "
      <ul class='list-group'>
     
      <li class='list-group-item'> <div class='form-check form-check-inline'>
      <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='checked'>
    </div><a href='uploads/{$path}'>$fileName</a><br></li>
      
    </ul>";
    }

}



 ?>

</div>

<div class="right">
    <ul>
        <li><a href="linkToUpload.html">charger un document</a></li>
        <li><a href="#">supprimer un document </a></li>
        
    </ul>
</div>


</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery.min.js"></script>
 <script src="script.js"></script>
</body>
</html>