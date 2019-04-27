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

    </head>
    <body>

    <?php include('header.php'); ?>

    <div class="up">
    <h4> Français</h4>
    </div>


    <div class="container-fluid">
    <div class="gauche">
    <ul>
    <li><i class="fas fa-angle-double-right"></i> <a href="literaturfr.php">Bienvenu au cours </a></li>
    <li><i class="fas fa-angle-double-right"></i> <a href="documentCours.php">Documents pour le cours</a></li>
    </ul>
    </div>

    <div class="right">

    <p> <h4>Bienvenue au cours de francais!</h4><br>

    Des exercices écrits et oraux amèneront les étudiants à faire une lecture active des textes au programme. 
    Le travail s’organisera autour de la thématique générale (Littérature et politique) et des œuvres complètes proposées dans chaque programme afin de favoriser les progrès méthodologiques en matière d’argumentation écrite 
    et orale et d’améliorer la qualité de la langue utilisée tant à l’écrit qu’à l’oral.
    <b> Objectifs</b><br>
    Formation à la recherche en littérature française et francophone.
    Intérêt spécifique porté aux littératures francophones dans le monde et aux dialogues interculturels.
    Prépare aux métiers de la recherche et de l’enseignement ; aux métiers de la francophonie et de la culture.<br>
    <b>Savoir-faire et compétences</b><br>
    Mobiliser des connaissances en littérature,  théories littéraires et esthétiques   dans une perspective critique ou créative.
    Interpréter des textes littéraires complexes à la lumière d'un savoir esthétique, historique, rhétorique, linguistique et culturel.
    Identifier et/ou mettre à jour des sources pertinentes d’information, en s’appuyant sur les technologies numériques.
    Analyser et dégager des concepts ou des problématiques littéraires ou culturelles ; transférer des concepts d’une discipline à une autre.
    Comparer des œuvres appartenant à des aires culturelles ou linguistiques diverses selon des critères pertinents ; rapprocher créations littéraires et artistiques.
    Concevoir et mener à bien un projet de recherche en littérature. 
    Concevoir et réaliser un projet innovant dans le domaine culturel.
    Élaborer un écrit de synthèse sur un phénomène complexe.
    Rédiger et transmettre des informations et des savoirs adaptés à des destinataires multiples.
    Participer à une recherche collective dans le domaine littéraire ou culturel ou l'impulser.
    Maîtriser les supports numériques dans une perspective de recherche, constitutions de données, de création ou de communication.
    Maîtriser une langue étrangère dans un but professionnel.</p>

    </div>


    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="jquery.js"></script>
<script src="header.js"></script>
</body>
</html>