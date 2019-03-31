<?php
 session_start();
if(!isset($_SESSION['id'])){

    header('Location:index.php');
    exit();
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Litterature francaise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="literaturefr.css">
    <link rel="stylesheet" type="text/css" media="screen" href="header.css">
    <link rel="stylesheet" type="text/css" media="screen" href="footer.css">
  
</head>
<body>
    <?php include('header.php'); ?>

 
    <h2>Littérature française</h2>
    <div class="container">
    
    <div class="left">
   <div>
   <ul>
   <li><i class="fas fa-angle-double-right"></i> <a href="#">Bienvenu au cours </a></li>
   <li><i class="fas fa-angle-double-right"></i> <a href="documentCours.php">Documents pour le cours</a></li>
   </ul>
   </div>
    </div>
    
    <div class="right">
        <p> <b>Välkommen till kursen Anläggningsprojektering, 25 yhp!</b><br>
Detta är din kursaktivitet för kursen Anläggningsprojektering - PGBPEH17.

Kursen är på totalt 25 YH-poäng.

Huvudansvarig utbildare för i kursen är Roy Svanlund.

I navigeringsfältet till vänster ser du dina olika uppgifter och det aktuella innehållet i kursen.

Kort information om kursmål
Den studerande skall efter genomgången kurs kunna ha en grundläggande förståelse för hur anläggningsprojektering går till. Den studerande ska även kunna utföra isometriritningar och känna till olika processer och hur de i stora drag fungerar. Ytterligare mål är att den studerande ska känna till de olika typer av dokument som används och vad de har för funktion och känna till de komponenter som används i rörsystem. Slutligen ska den studerande ha god förståelse för rörstöd, typer av rörstöd dess konstruktion och placering. Kunna göra tillverkningsritningar för rörsystem.

Information om schema
Här anges om schema finns i bifogad fil, i kalendern eller i externt system.

Information om examination
Examination sker genom skriftlig tentamen samt eventuella inlämningsuppgifter, individuella eller i grupp.</p>
    </div>
    
    
    </div>

    <?php include('footer.php');  ?>
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
</body>
</html>