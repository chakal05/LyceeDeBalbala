  <?php
  require_once("connection.php");
  session_start();
  $user_id="";
  if(!isset($_SESSION['id'])){
  header( "location: pm_list.php");
  } else{
  $user_id= $_SESSION['id'];
  }

  //Post message

  $success = "";
  if(isset($_POST['response'])){

  if(isset($_POST['message']) && $_POST['message'] !== '' ){

  $message = mysqli_real_escape_string($link, $_POST['message']);
  $conversation_id = mysqli_real_escape_string($link, $_POST['conversation_id']);
  $receiver = mysqli_real_escape_string($link, $_POST['user_to']);

  //decrypt the conversation_id,user_from,user_to
  $conversation_id = base64_decode($conversation_id);
  $user_to =  base64_decode($receiver);
  $user_from = $user_id;
  //insert into `messages`

  $sql= "INSERT  INTO `messages` VALUES ('','$conversation_id','$user_from','$user_to','$message',NOW(),'no')";
  $q= mysqli_query($link,$sql);

  if($q){

  //insert was successful
  $success = "<button type='button' class='btn btn-success btn-sm btn-block succes pmb'>Votre message a été posté.</button>";

  } else {

  //insert failed
  echo "Error";

  }

  }


  // Warning if messaging area empty



  if( !$_POST['message']  ){
  $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb '>Espace message  vide.</button>";
  }

  }
  ?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Envoyer un message </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" media="screen" href="read.css">
<link rel="stylesheet" type="text/css" media="screen" href="header.css">

  </head>
  <body>

  <?php include('header.php');  ?>
  <div class="tre"><h3>Lire le message </h3></div>
  <div class="container">
  <div class="back"><a href="pm_list.php"><i class="fas fa-angle-double-left"></i> Retour</a>
  </div>
  <div class="gauche">
  <h5>Message </h5>
  <?php echo $success;  ?>
  <hr>
  <?php

  // Check if user is logged in
  if(isset($_SESSION['id'])){
  $user_id= $_SESSION['id'];
  $user_two= "";
  $message="";
  if(isset($_GET['message_id'])){
  $message = $_GET['message_id'];

  // Check if they have a conversation

  // Get members of this conversation and  get user_two id

  $sql= "SELECT * FROM `messages` WHERE id='$message'";
  $result = mysqli_query($link, $sql);

  if(mysqli_num_rows($result) > 0){
  while($row =mysqli_fetch_array($result)) {
  //format the message 
  $mess_id= $row['id'];
  $user_from = $row['user_from'];
  $user_to = $row['user_to'];
  $message = $row['message'];
  $time = $row['time'];
  $conversation = $row['conversation_id'];

  if($user_id == $user_from){
  $user_two = $user_to;
  }else if($user_id == $user_to){
  $user_two = $user_from;
  }
  }
  //Check if user has right to see the message and then display it 
  if($user_id == $user_from or $user_id == $user_to){
  // get sender username
  $user = mysqli_query($link, "SELECT username FROM `etudiants` WHERE id='$user_from'");
  $user_fetch = mysqli_fetch_assoc($user);
  $user_from_username = $user_fetch['username'];


  echo "


  <div class='form-group'>
  <p><b>{$user_from_username}</b>  écrit</p>
  </div>
  <hr>
  <i class='far fa-user'></i> <p>{$message} </p> <br>
  <p><b>Le {$time}</b></p>

  ";

  }

  }



  // If user is receiver of a message, update to read message when message is read
  if($user_id == $user_to){
  $sql= "UPDATE `messages` set user_to_read= 'yes' where id=$mess_id";
  $query= mysqli_query($link, $sql);
  }

  }else {
  // Notify if there are no messages
  echo "no discussion found";
  }
  }

  ?>
  <button  class='btn svar'> Repondre</button>  
  </div>

  <div class="droite">

  <div>
  <form method="POST" >
  <div class="form-group">
  <p > Destinataire :  <b><?php echo $user_from_username; ?></b></p> 
  </div>
  <?php echo $success;  ?>
  <div> <textarea class="form-control" id="message" rows="3" name="message" placeholder="Reponse"></textarea></div>

  <input type="hidden" id="conversation_id" name="conversation_id" value="<?php echo base64_encode($conversation); ?>">
  <input type="hidden" id="user_from" name="user_from" value="<?php echo base64_encode($user_id); ?>">
  <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($user_two); ?>">
  </div>

  <button type="submit" class="btn" name= "response" id="response" >Envoyer</button>
  <span id="error"></span>
  </div>
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