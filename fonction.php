<?php

if(isset($_POST['forminscription']))
{

    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {
       $pseudo = htmlspecialchars($_POST['pseudo']);
       $mail = htmlspecialchars($_POST['mail']);
       $mail2 = htmlspecialchars($_POST['mail2']);
       $mdp = sha1($_POST['mdp']);
       $mdp2 = sha1($_POST['mdp2']);
       $pseudolength = strlen($pseudo);
       if($pseudolength <=255)
       {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM users WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {
                        if($mdp == $mdp2)
                        {
                        $insertmbr = $bdd->prepare("INSERT INTO users(pseudo, mail, mail2, motdepasse, motdepasse2)VALUES(?, ?, ?, ?, ?)");
                        $insertmbr->execute(array("$pseudo", "$mail", "$mail2", "$mdp", "$mdp2"));
                        $erreur = "Votre compte a bien été crée ! <a href=\"connect.php\" data-toggle=\"modal\" data-target=\"#myModal\">Me connecter</a>";
                        }
                        else
                        {
                            $erreur ="Vos mot de passes ne correspondent pas ! ";
                        }
                    }
                    else
                    {
                        $erreur = "Adresse mail déja utilisée ! ";
                    }
                }
                else
                {
                    $erreur ="Vos adresses mail n'est pas valide !";
                }
            }
        }    
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}