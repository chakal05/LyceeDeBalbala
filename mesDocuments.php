  <?php
  session_start();
  require_once("connection.php");
  $id = "";
  $target_dir = "uploads/";
  $success = "";

  if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  }

  // Delete uploaded files 

  if(isset($_POST['delete'])){
  if(isset($_POST['delete']) && $_POST['delete'] === ""){
  $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb'>Vous n'avez pas marqué de document à supprimer.</button>";
  }

    $checked = $_POST['checkbox'];
  foreach ($checked as $name) {
  $fileDel = unlink($target_dir.$name);
  $sql = "DELETE FROM `uploaded` WHERE file_path='$name' AND user='$id'";
  $query = mysqli_query($link, $sql);

  if(!$query && !$fileDel){
      $success = "<button type='button' class='btn btn-danger btn-sm btn-block pmb'>Votre document n'a pas été supprimé .</button>";
  }else{
  $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Votre document a été supprimé.</button>";
  }

  }

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
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Charger un document 
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Mes documents </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  <div class="modal-body">

  <form action="upload.php" method="post" enctype="multipart/form-data">

  <div class="input-group mb-3">
  <div class="input-group">
  <div class="custom-file">

  <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
  <label class="custom-file-label" for="inputGroupFile04">Choisir photo </label>

  </div>

  <div class="input-group-append">
  <button class="btn btn-outline-secondary" type="submit"  name="submit"  id="inputGroupFileAddon04">Charger</button>
  </div>
  </div>
  </form>

  </div>

  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  </div>

  <form  method="post">

  <div class="move">
    <ul>

  <li><button type="submit" class="btn btn-sm btn-block bleu" name="delete"><i class="fas fa-trash-alt"></i>  Supprimer</button></li>


  </ul>

  </div>
  </div>

  <div class="righti">  
  <?php  echo  $success; ?>
  <?php 


  $sql = "SELECT * FROM `uploaded` WHERE user='$id'";
  $result = mysqli_query($link, $sql);
  //check if their are any files

  if(mysqli_num_rows($result) > 0){
  echo "<table class='table table-bordered'>
  <thead >
  <tr class='trow'>
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



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="jquery.js"></script>
  <script src="header.js"></script>
  </body>
  </html>