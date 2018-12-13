<?php
session_start();
include "connexion.php";

$title = $content = $thumbnail = "";
if (!empty($_POST))
{
   $title = $_POST["title"];
   $thumbnail = $_FILES["thumbnail"]["name"];
   $thumbnailPath ='img/'. basename($thumbnail);
   //$thumbnailExtension = pathinfo($thumbnailPath, PATHINFO_EXTENSION);
   $isSuccess = true;
   $isUploadSuccess = true;
   $content = $_POST["content"];

   if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"$thumbnailPath"))
            {
                $isUploadSuccess = false;
            }
        }

    if($isSuccess && $isUploadSuccess)
    {
        $statement = $bdd->prepare("INSERT INTO posts(`thumbnail`, `title`, `content`,`userId`)
        VALUES (:thumbnail,:title,:content,:userId)");
        $requete = $statement->execute(array(
            'thumbnail'=>$thumbnailPath,
            'title'=>$title,
            'content'=>$content,
            'userId'=>$_SESSION['id']
            ));
        header("location:index.php");

    }
    
}

if(isset($_SESSION['id']))
{ ?>
    <form method="post" action="newpost.php" enctype="multipart/form-data">
        <div class="col-12 col-lg-6" align="center">
            <label for="newpost"><h3>Veuillez saisir votre article :</h3></label><br />

            <label for="theme"><h5>Votre Théme :</h5></label>
            <input type="text" placeholder="Votre Théme" id="theme" name="title" value="<?php echo $title; ?>"><br />

            <label for="thumbnail"><h5>Veuillez télécharger votre image :</h5></label><br />
            <input type="file" placeholder="Votre image" id="thumbnail" name="thumbnail" value="<?php echo $thumbnail; ?>"><br />

            <textarea name="content" rows="8" cols="45" placeholder="Rajoutez votre article" value="<?php echo $content; ?>"></textarea><br />

            <label for="envoi"><h5>Envoyer votre article :</h5></label>
            <input type="submit" name="validation" placeholder="Envoyer" />
        </div>
    </form>
<?php
}
else
{
    $erreur = "Vous devez etre connecte pour ecrire un article !";
    header('location:index.php?error="' .$erreur. '"');

}


