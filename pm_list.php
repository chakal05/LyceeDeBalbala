<?php
    require_once("connection.php");
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Messages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="pm_list.css">
</head>
<body>
    
    <?php   include('header.php');  ?> 

    <div class="container-fluid">
  <div class="left">
    <div class="pim">
        <h4> PIM</h4>
        <hr>
    <ul class="navbar-nav">
   
    <li class="nav-item"><a class="nav-link" href="new_pm.php"><button class="btn">Envoyer un message</button></a></li>
    <li class="nav-item recu "><a class="nav-link" href="#"><button class="btn">Recus</button></a></li>
    <li class="nav-item"><a class="nav-link" href="sent.php"><button class="btn">Envoyes</button></a></li>
    </ul>
    
</div>

    <form action="delete.php" method="post">
    <div class="functions">
        <h4>OUTILS</h4>
        <hr>
       <ul class="navbar-nav">
      <li class="nav-item"><a href="#"><button type="submit" name="submit" class="btn" >Supprimer</button></a></li>
      <li class="nav-item"><a href="#"><button type="submit" name="unread" class="btn" formaction="update.php">Marquer non lu</button></a></li>
        </ul>
    </div>
</div>

        <div class="display-message">
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
  //get the session id and
//fetch all the unread messages of $user_id(loggedin user) and $user_two from their conversation
$sql1 = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='no' ORDER BY id DESC";
// query for read messages
$sql2 = "SELECT * FROM `messages` WHERE user_to='$user' AND user_to_read ='yes' ORDER BY id DESC";
$result = mysqli_query($link,$sql1);
$result1 = mysqli_query($link,$sql2);
//check their are any messages
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
    //get name and image of $user_form from `user` table
    $user = mysqli_query($link, "SELECT username FROM `class` WHERE id='$user_from'");
    $user_fetch = mysqli_fetch_assoc($user);
    $user_from_username = $user_fetch['username'];
    
    echo "<tr class='table'><th scope='row'><input type='checkbox' name='checkbox[]' value='".$message_id."'></th><td><b><a href='reading_mess.php?conversation_id=$conversation_Id'> $formated_message </a></b></td><td>".$user_from_username."</td><td>".$time."</td></tr>";
    //display the message
    
      }
      echo "</table";
  } 

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
      //get name  $user_form from `class` table
      $user = mysqli_query($link, "SELECT * FROM `class` WHERE id= $user_from ");
      $user_fetch = mysqli_fetch_assoc($user);
      $user_from_username = $user_fetch['username'];
    
      echo "<tr><th scope='row'><input type='checkbox' name='checkbox[]' value='".$message_id."'></th><td><a href='reading_mess.php?conversation_id=$conversation_Id'> $formated_message </a></td><td>".$user_from_username."</td><td>".$time."</td></tr>";

      //display the message
      
        }
  }
 }
  ?>
   
    </tbody>
    </table>
    </form>   
         
    </div>
    </div>

    <?php
    include('footer.php');
    ?>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="script.js" ></script>
</body>
</html>