<?php
session_start();

if(!isset($_SESSION['id'])){
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>mes docs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="mesDocuments.css">
    <script src=""></script>
</head>
<body>
<?php include('header.php');  ?>

    <div class="container">
    <div class="left">
    <p>mes documents </p>
    </div>
    <div class="right">
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" >
    <input type="submit" name="submit" value="upload">
</form>
    </div>
   
    </div>

</body>
</html>