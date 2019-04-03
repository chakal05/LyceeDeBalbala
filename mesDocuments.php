<?php
session_start();
require_once("connection.php");
$id = "";
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
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
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">
    <link rel="stylesheet" type="text/css" media="screen" href="footer.css">  
</head>
<body>

<?php
include('header.php');
?>

<div class= "up">
    <h4>Mes documents</h4>

   </div>

<div class="container-fluid">

<div class="gauche">
<form action="upload.php" method="post" enctype="multipart/form-data">
    
<div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choisir un document</label>
  </div>
  <div class="input-group-append">
    <input type="submit" value="CHARGER" name="submit" class="input-group-text" id="inputGroupFileAddon02">
  </div>
</div>

</form>

<form action="delete.php" method="post">
    <div class="move">
        <ul>
<li><button type="submit" class="btn btn-sm btn-block bleu" name="delete"><i class="fas fa-trash-alt"></i>  Supprimer</button></li>
<li><button class="btn btn-sm btn-block clair"><i class="fas fa-download"></i>  Telecharger</button></li>
</ul>
</div>
</div>

<div class="righti">  
<?php 


$sql = "SELECT * FROM `uloaded` WHERE user='$id'";
$result = mysqli_query($link, $sql);
//check if their are any files

if(mysqli_num_rows($result) > 0){
echo "<table class='table table-bordered'>
<thead >
<tr class='sas'>
<th scope='col'>#</th>
  <th scope='col'>Nom</th>
 
</tr>
</thead>
<tbody>";
    // format and display

    while($row= mysqli_fetch_array($result)){
        $fileName = $row["file_name"];
        $path= $row['file_path'];
    
    echo "<tr class='table'><th scope='row'><input type='checkbox' name='checkbox[]' value='".$path."'></th><td><a href='uploads/{$path}'>$fileName</a></tr>";
    echo "</table";
    }

}else{
    echo "
    <button type='button' class='btn bas'>Vous n'avez pas encore charger de documents</button>";
}



 ?>
 </form>
</div>
</div>



<?php  include('footer.php');  ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery.min.js"></script>
 <script src="header.js"></script>
 <script src="doc.js"></script>
</body>
</html>