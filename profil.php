<?php
include "connexion.php";
session_start();

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div align="center">
        <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
           pseudo = <?php echo $userinfo['pseudo']; ?>
           <br/>
           mail = <?php echo $userinfo['mail']; ?>
           <br/>
           <?php
            if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']);
            {
            ?>
            <a href="editionprofil.php">Editer mon profil</a>
            <a href="deconnexion.php">Se déconnecter</a>
            <?php
            }
            ?>   
            
    </div>
<script src="library/bootstrap/js/bootstrap.bundle.js"></script>     
</body>
</html>
<?php

?>
