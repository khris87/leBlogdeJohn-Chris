<?php
include "connexion.php";
session_start();
    if(isset($_POST['formconnexion']))
    {
        $mailconnect =htmlspecialchars($_POST['mailconnect']);
        $mdpconnect =sha1($_POST['mdpconnect']);
        if(!empty($mailconnect) AND !empty($mdpconnect))
        {
            $requser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND motdepasse = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['pseudo'] = $userinfo['pseudo'];
              $_SESSION['mail'] = $userinfo['mail'];
<<<<<<< HEAD
              header("location: index.php?id=".$_SESSION['id']);
=======
              header("location:index.php?id=".$_SESSION['id']);
>>>>>>> a57b91aaaab4c30d4cb4fd0f4252b559736887c3
            }
            else
            {
                $erreur = "Mauvais Mail ou mot de Passe !";
                header('location:header.php?error="' .$erreur. '"');
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés !";
        }
<<<<<<< HEAD
    }
?>

<script src="library/bootstrap/js/bootstrap.bundle.js"></script>     
=======
    }
>>>>>>> a57b91aaaab4c30d4cb4fd0f4252b559736887c3
