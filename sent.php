    <?php
    require_once("connection.php");
    session_start();
    $success = "";
    if(isset($_SESSION['id'])){
    $user = $_SESSION['id'];

    if(isset($_POST['bort']) && isset($_POST['checkbox']) && $_POST['checkbox'] !== ""){
    $count=0;
    $checked = $_POST['checkbox']; 
    foreach ($checked as $id) {
    $count++;
    $sql = "DELETE FROM `messages` WHERE id='$id' AND user_from='$user'";
    $query = mysqli_query($link, $sql);
    if(!$query){
        echo "SORRY something went wrong";
    }else if($count == 1){
            $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Message a été supprimé.</button>";

    }else{
        $success = "<button type='button' class='btn btn-success btn-sm btn-block pmb'>Les messages ont été supprimés.</button>";

    }
    }
    }else if(isset($_POST['bort']) && !isset($_POST['checkbox'])){
    $success = "<button type='button' class='btn btn-warning btn-sm btn-block pmb'>Selectionnez un message a supprimer.</button>";
        
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
<link rel="stylesheet" type="text/css" media="screen" href="pm_list.css">
<link rel="stylesheet" type="text/css" media="screen" href="header.css">

    </head>
    <body>

    <?php   include('header.php');  ?> 

    <div class= "up">
    <h4> Messages envoyés  </h4>
    </div>

    <div class="container-fluid">

    <div class="gauche">
    <div class="pim">
    <h4> PIM</h4>
    <hr>

    <ul class="navbar-nav">
    <li class="nav-item"><a class="nav-link" href="new_pm.php"><i class="fas fa-angle-double-right"></i> Envoyer un message</a></li>
    <li class="nav-item "><a class="nav-link" href="pm_list.php"><i class="fas fa-angle-double-right"></i> Recus</a></li>
    <li class="nav-item"><a class="nav-link" href="sent.php"><i class="fas fa-angle-double-right"></i> ENVOYES</a></li>
    </ul>

    </div>

    <form method="post">
    <div class="functions">
    <h4>OUTILS</h4>
    <hr>

    <ul class="navbar-nav">
    <li class="nav-item"><a href="#"><button type="submit" name="bort" class="btn btn-sm btn-block" ><i class="fas fa-trash-alt"></i> Supprimer</button></a></li>
    </ul>
    </div>

    </div>

    <div class="display-message">
    <?php echo $success; ?>
    <form>
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

    //fetch all the sent messages 

    $sql1 = "SELECT * FROM `messages` WHERE user_from='$user' ORDER BY id DESC";
    // query for read messages
    $result = mysqli_query($link,$sql1);
    //check their are any messages
    if(mysqli_num_rows($result) > 0){
    while ($m = mysqli_fetch_array($result)) {
    //format the message and display 
    $message_id= $m['id'];
    $conversation_Id = $m['conversation_id'];
    $user_from = $m['user_from'];
    $user_to = $m['user_to'];
    $message = $m['message'];
    $time = $m['time'];
    $format = strip_tags($message); 
    $formated_message = substr($format, 0, 100).("..."); 
    //get name of the sender
    $user = mysqli_query($link, "SELECT username FROM `class` WHERE id='$user_from'");
    $user_fetch = mysqli_fetch_assoc($user);
    $user_from_username = $user_fetch['username'];

    //display the message
    echo "<tr class='table'><th scope='row'><input type='checkbox' name='checkbox[]' value='".$message_id."'></th><td><b><a href='reading_mess.php?conversation_id=$conversation_Id'> $formated_message </a></b></td><td>".$user_from_username."</td><td>".$time."</td></tr>";


    }
    echo "</table>";
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
<script src="jquery.js"></script>
<script src="header.js" ></script>
</body>
</html>
