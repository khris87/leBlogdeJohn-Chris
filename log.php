<?php 
include 'connexion.php';

$user=$_POST['pseudo'];
$pass=$_POST['password'];


if(isset($_POST) && !empty($user) && !empty($pass)){
    $reponse=$bdd->query('SELECT `password` FROM `users` WHERE `pseudo` = "' .$user. '";');
    $donnees=$reponse->fetch();

    if ($pass !== $donnees['password']){
        echo "<span>mauvais mot de passe !</span>";
    }else{
        session_start();
        $_SESSION['pseudo'] = $user;
        echo "Bienvenue " .$user;
    }
}else{
    echo "<span>Vous devez renseigner les champs pseudo et mot de passe.</span>";
}

