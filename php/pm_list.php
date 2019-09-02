    <?php
    require_once("connection.php");
    session_start();
    
    $user = "";
    if(isset($_SESSION['id'])){
    $user = $_SESSION['id'];
    }
    
    $success = "";
    
    // Update checked messages to unread
    
    if(isset($_POST['unread']) && isset($_POST['checkbox']) && $_POST['checkbox'] !== ""){
    $num = 0;
    $checked = $_POST['checkbox'];
    foreach ($checked as $id) {
        
    $num = count($checked);
    $sql =  "UPDATE `messages` SET user_to_read='no' WHERE id='$id'";
    $query = mysqli_query($link, $sql);
    
    if(!$query){
    echo "SORRY something went wrong";
    }else if($num == 1){
        
    $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Votre message a été marqué non-lu.</button>";
    }else{
        
    $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Vos messages ont été marqués non-lus.</button>";
    
    }
    
    }
    
    }else if(isset($_POST['unread']) && !isset($_POST['checkbox'])){
    $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb'>Selectionnez un message a marquer non-lu.</button>";
    
    }
    
    // Delete message
    
    if(isset($_POST['submit']) && isset($_POST['checkbox']) && $_POST['checkbox'] !== ""){
    
    $count= 0;
    $checked = $_POST['checkbox']; 
    foreach ($checked as $id) {
        
    $count = count($checked);
    $sql = "DELETE FROM `messages` WHERE id='$id' AND user_to='$user'";
    $query = mysqli_query($link, $sql);
    
    if(!$query){
    echo "SORRY something went wrong";
    }else if($count == 1){
        
    $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Votre message a été suprimé.</button>";
    }else{
    $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Vos messages ont été suprimés.</button>";
    }
    
    }
    }else if(isset($_POST['submit']) && !isset($_POST['checkbox'])){
    $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb'>Selectionnez un message a supprimer.</button>";
    
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
    <link rel="stylesheet" type="text/css" media="screen" href="../css/pm_list.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/header.css">
  
</head>
<body>
    
    <?php   include('header.php');  ?> 

    <div class= "up">
    <h4> Messages réçus </h4>
   </div>
   
    <div class="container-fluid">

  <div class="gauche">
    <div class="pim">
        <h4> PIM</h4>
        <hr>

    <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" id="new" href='new_pm.php'><i class="fas fa-angle-double-right"></i> Envoyer un message</a></li>
    <li class="nav-item "><a class="nav-link" id="list" href='pm_list.php'><i class="fas fa-angle-double-right"></i> MESSAGE RECUS</a></li>
    <li class="nav-item"><a class="nav-link" id="sent" href='sent.php'><i class="fas fa-angle-double-right"></i> Envoyes</a></li>
    </ul>
    
   </div>

    <form method="post">
    <div class="functions">
        <h4>OUTILS</h4>
        <hr>

       <ul class="navbar-nav">
      <li class="nav-item"><a href="#"><button type="submit" name="submit" class="btn btn-sm btn-block"><i class="fas fa-trash-alt"></i> Supprimer</button></a></li>
      <li class="nav-item"><a href="#"><button type="submit" name="unread" class="btn btn-sm btn-block" > <i class="fas fa-upload"></i> Marquer non lu</button></a></li>
        </ul>
     </div>
    </div>

        <div class="display-message">
          <?php echo $success;  ?>
        <table class="table table-bordered">
    <thead >
    <tr>
    <th scope="col">#</th>
      <th scope="col">Message</th>
      <th scope="col">Auteur</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>

    <?php 
    if(isset($_SESSION['id'])){
      $user = $_SESSION['id'];
   
    //fetch all the unread messages

    $sql1 = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='no' ORDER BY id DESC";
    $result = mysqli_query($link,$sql1);

   // query for read messages

   $sql2 = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='yes' ORDER BY id DESC";
   $result1 = mysqli_query($link,$sql2);
   
    //check their are any unread messages

    if(mysqli_num_rows($result) > 0){
    while ($m = mysqli_fetch_array($result)) {
    //format the message and display it to the user
    $message_id= $m['id'];
    $conversation_Id = $m['conversation_id'];
    $user_from = $m['user_from'];
    $user_to = $m['user_to'];
    $message = $m['message'];
    $time = $m['time'];
    $format = strip_tags($message); 
    $formated_message = substr($format, 0, 100).("..."); 

    //get name  of the sender table
    $user = mysqli_query($link, "SELECT username FROM `etudiants` WHERE id='$user_from'");
    $user_fetch = mysqli_fetch_assoc($user);
    $user_from_username = $user_fetch['username'];
    
     //display the message
    echo "<tr class='table'><th scope='row'><input type='checkbox' name='checkbox[]' value='".$message_id."'></th><td><b><a href='reading_mess.php?message_id= $message_id'> $formated_message </a></b></td><td>".$user_from_username."</td><td>".$time."</td></tr>";
   
      }
      echo "</table";
  } 

  // if they have read messages

  if (mysqli_num_rows($result1) > 0){
    while ($m = mysqli_fetch_array($result1)) {

      //format the message and display it to the user
      $message_id= $m['id'];
      $conversation_Id = $m['conversation_id'];
      $user_from = $m['user_from'];
      $user_to = $m['user_to'];
      $message = $m['message'];
      $time = $m['time'];
      
    $format = strip_tags($message); 
    $formated_message = substr($format, 0, 100); 

      //get name of sender 

      $user = mysqli_query($link, "SELECT * FROM `etudiants` WHERE id= $user_from ");
      $user_fetch = mysqli_fetch_assoc($user);
      $user_from_username = $user_fetch['username'];
    
            //display the message

      echo "<tr><th scope='row'><input type='checkbox' name='checkbox[]' value='".$message_id."'></th><td><a href='reading_mess.php?message_id= $message_id'> $formated_message </a></td><td>".$user_from_username."</td><td>".$time."</td></tr>";
      
      }
      }else  if (mysqli_num_rows($result1) == 0 && mysqli_num_rows($result) === 0){
         echo "<tbody><tr><th></th><td>Vous n'avez pas encore de message.</td><td>0</td><td>Néant</td></tr></tbody>";
      }
      }
  ?>
   
    </tbody>
    </table>
    </form>   
         
    </div>
    </div>

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="../js/jquery.js"></script>
<script src="../js/header.js" ></script>
</body>
</html>