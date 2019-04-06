<?php
    require_once("connection.php");
session_start();
if(isset($_SESSION['id'])){
    $user = $_SESSION['id'];
}else{
    header('Location: index.php');
}

$sql = "SELECT * FROM `userpic` WHERE user='$user' ORDER BY file_id DESC LIMIT 1 ";
$result = mysqli_query($link, $sql);
$path ="";
//check if they have loaded a profil pic

if(mysqli_num_rows($result) > 0){

    // Display user pic

    while($row= mysqli_fetch_array($result)){
        $fileName = $row["file_name"];
        $path= $row['file_path'];
    
    }

}else{ 
    // Display default icon pic 

    $path = "userIcon.png";
}

// Fetch ad display user info

$sql1 = "SELECT * FROM `class` WHERE id='$user' ";
$result1 = mysqli_query($link, $sql1);

if(mysqli_num_rows($result1) > 0){

  while($row= mysqli_fetch_array($result1)){
    $email = $row["email"];
    $telephone= $row['telephone'];
    $adress = $row['adress'] ;
    $filiere = $row['Filiere'] ;
    $promo = $row['promotion'] ;
  }

}else{
  echo "no";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="profil.css">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">
  
</head>
<body>
    
    <?php   include('header.php');  ?> 

    <div class="container-fluid">

    <div class="gauche">
    <div class="card" style="width: 18rem;">
    <img src="userPic/<?php echo $path; ?>" class="card-img-top">
    <div class="card-body">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Changer la photo de profil
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mes photos </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 <form action="upload.php" method="post" enctype="multipart/form-data">

 <div class="input-group mb-3">
 <div class="input-group">
  <div class="custom-file">
    <input type="file" name="profilPic" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
    <label class="custom-file-label" for="inputGroupFile04">Choisir photo </label>
  </div>
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit"  name="profil"  id="inputGroupFileAddon04">Charger</button>
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
    </div>
</div>
    </div>

        <div class="right">
            <p>Ces informations ont été fournies par l'administration</p>
        <ul>
            <li>Email :     <?php echo $email; ?> </li>
            <li>Telephone : <?php echo $telephone; ?> </li>
            <li>Adresse :   <?php echo $adress; ?> </li>
            <li>Filière :   <?php echo $filiere; ?>  </li>
            <li>Promotion : <?php echo $promo; ?>  </li>
           
        </ul>
        </div>
</div>
    

   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="header.js" ></script>
</body>
</html>