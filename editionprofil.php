<?php
include "connexion.php";
session_start();

if(isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
}

if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'])
{
    $newpseudo = htmlspecialchars($_POST['newpseudo']);
    $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
    $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
    $header('location: index.php?id='.$_SESSION['id']);
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail'])
{
    $newmail = htmlspecialchars($_POST['newmail']);
    $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
    $insertmail->execute(array($newmail, $_SESSION['id']));
    $header('location: index.php?id='.$_SESSION['id']);
}

if(isset($_POST['newmdp']) AND !empty($_POST['newmdp2']))
{
    $mdp = sha1($_POST['newmdp']);
    $mdp2 = sha1($_POST['newmdp2']);

    if($mdp == $mdp2)
    {
       $insertmdp = $bdd->prepare("UPDATE users SET mdp= ? WHERE id=");
       $insertmdp->execute(array($mdp['id']));
    }

    $newmail = htmlspecialchars($_POST['newmail']);
    $insertmail = $bdd->prepare("UPDATE users SET mail = ? WHERE id = ?");
    $insertmail->execute(array($newmail, $_SESSION['id']));
    $header('location: index.php?id='.$_SESSION['id']);
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
        <h2>Edition de mon profil<?php echo $userinfo['pseudo']; ?></h2>
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <label>Pseudo :</label>
            <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /> 
            <label>Mail :</label> 
            <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>"/><br />
            <label>Mot de passe :</label>
            <input type="password" name="newmdp" placeholder="Mot de passe" /><br />
            <label>Confirmation du mot de passe :</label>
            <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br />
            <input type="submit" value="Mettre à jour mon profil !" />
        </form>
    </div>
<script src="library/bootstrap/js/bootstrap.bundle.js"></script><br />     
</body>
</html>
