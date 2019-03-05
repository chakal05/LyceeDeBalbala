<?php
require_once("connection.php");
session_start();
    //post message
    if(isset($_POST['message'])){
        $message = mysqli_real_escape_string($link, $_POST['message']);
        $conversation_id = mysqli_real_escape_string($link, $_POST['conversation_id']);
        $user_from = mysqli_real_escape_string($link, $_POST['user_from']);
        $user_to = mysqli_real_escape_string($link, $_POST['user_to']);
        //decrypt the conversation_id,user_from,user_to
        $conversation_id = base64_decode($conversation_id);
        $user_from = base64_decode($user_from); //  user_id
        $user_to = base64_decode($user_to); // user_from 
        //insert into `messages`
            $sql= "INSERT INTO `messages` 
            VALUES ('','$conversation_id','$user_from','$user_to','$message',NOW(),'no')";
            $q = mysqli_query($link,$sql);
         
            if($q){
                echo "Posted";
              
            }else{
                echo "Error";
            }
        
    }
    ?>

    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="">

    <style>
    .container{
        padding: 1%;
        box-shadow: 2px 3px gray ;
    }
    
    </style>
    </head>
    <body>
    
    <?php include("header.php");     ?>
    
    <div class="container">
        
    <div class="display">
    
  <?php
    
    // Check if user is logged in
    if(isset($_SESSION['id'])){
    $user_id= $_SESSION['id'];
    $user_two= "";
    $conversation="";
    if(isset($_GET['conversation_id'])){
        $conversation = $_GET['conversation_id'];
        // Get members of this conversation and  get user_two id
        $sql= "SELECT * FROM `conversation` WHERE id='$conversation'";
        $res = mysqli_query($link, $sql);
        
        if(mysqli_num_rows($res) > 0){
            while($ligne =mysqli_fetch_array($res)) {
                if($user_id == $ligne['user_one']){
                    $user_two = $ligne['user_two'];
                }else if($user_id == $ligne['user_two']){
                    $user_two = $ligne['user_one'];
                }
            }
        }
        // Check if they have a conversation
       $query = "SELECT * FROM `messages` WHERE conversation_id='$conversation'";
       $result = mysqli_query($link, $query);
       if(mysqli_num_rows($result) > 0){
        // They have a conversation
        while ($row = mysqli_fetch_array($result)) {
            //format the message 
            $mess_id= $row['id'];
            $user_from = $row['user_from'];
            $user_to = $row['user_to'];
            $message = $row['message'];
            $time = $row['time'];
        
            //Check if user has right to see the message and then display it 
            if($user_id == $user_from or $user_id == $user_to){
            // get sender username
            $user = mysqli_query($link, "SELECT username FROM `class` WHERE id='$user_from'");
            $user_fetch = mysqli_fetch_assoc($user);
            $user_from_username = $user_fetch['username'];
          
            echo "
                
              
                <div class='form-group'>
                
                <button type='button' class='btn btn-success btn-sm'> From :  {$user_from_username} </button> 
                
                <p>{$message}</p>

               <p><b>{$time}</b></p>
                
              </div>
              <hr>
            
            
            ";
           
            }
            // If user is receiver of a message, updtate to read message when message is read
            if($user_id == $user_to){
                $sql= "UPDATE `messages` set user_to_read= 'yes' where id=$mess_id";
                $query= mysqli_query($link, $sql);
               }
            
        }
       }else {
           // Notify if there are no messages
           echo "no discussion found";
       }
    }else{
        echo "conversation id not found";
    }
    }
    ?>

        </div>

    
     <div>
        <div class="form-group">
        <button type='button' class='btn btn-primary btn-sm'> To :  <?php echo $user_from_username;?></button> 
        </div>
        <div> <textarea class="form-control" id="message" rows="3" name="message" placeholder="Reponse"></textarea></div>
        
         <input type="hidden" id="conversation_id" name="conversation_id" value="<?php echo base64_encode($conversation); ?>">
                <input type="hidden" id="user_from" name="user_from" value="<?php echo base64_encode($user_id); ?>">
                <input type="hidden" id="user_to" name="user_to" value="<?php echo base64_encode($user_two); ?>">
                </div>

        <button type="button" class="btn btn-success" name= "response" id="response" value="response">Envoyer</button>
                 <span id="error"></span>
                 
       
        </div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
 <script src="script.js"></script>
</body>
</html>