<?php
session_start();
include "connexion.php";

if(isset($_POST['validation']))
{
    $inserTheme = $bdd->prepare("INSERT INTO posts(userId, title, content)VALUES(:userId, :title, :content)");
    $inserTheme->execute([
        'userId'=>$_SESSION['id'],
        'title'=>htmlspecialchars($_POST['newtheme']),
        'content'=>htmlspecialchars($_POST['newarticle']),
    ]);
}
    if(isset($_SESSION['id']))
    { ?>
    <form method="post" action="newpost.php">
        <div class="col-12 col-lg-6" align="center">
            <label for="newpost"><h3>Veuillez saisir votre article :</h3></label><br />

            <label for="theme"><h5>Votre Théme :</h5></label>
            <input type="text" placeholder="Votre Théme" id="theme" name="newtheme"><br />

            <textarea name="newarticle" rows="8" cols="45" placeholder="Rajoutez votre article"></textarea><br />

            <label for="envoi"><h5>Envoyer votre article :</h5></label>
            <input type="submit" name="validation" placeholder="Envoyer" />
        </div>
    </form>
<?php
}
else
{
    echo "Vous devez etre connecte avant d'envoye un article";
}

