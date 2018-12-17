<?php
session_start();
include "connexion.php";
include "fonctions.php";
include "header.php";

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
   $id = $_SESSION['id'];

   if($isUploadSuccess)
        {
            if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"$thumbnailPath"))
            {
                $isUploadSuccess = false;
            }
        }

    if($isSuccess && $isUploadSuccess)
    {
        newPost($bdd, $id, $thumbnailPath, $title, $content);
        $id = getNewPost($bdd, $title);
        $idThemes = $_POST['idThemes'];
        foreach ($idThemes as $themeId)
            {
                newPostTheme($bdd, $id, $themeId);
            }
    }


    
}

if(isset($_SESSION['id']))
{ ?>
    <div class="container">
        <div class="row">
        <form method="post" action="newpost.php" enctype="multipart/form-data">
            <div class="col-12 col-lg-12" align="center">
                <label for="newpost"><h2>Veuillez saisir votre article :</h2></label><br /><br />

                <label for="theme"><h5> Choisir Votre Théme :</h5></label><br />
                <?php $themes=themes($bdd);
                        while($nameThemes=$themes->fetch()){
                            echo '<input type="checkbox" name="idThemes[]" id="idThemes'.$nameThemes['id'].'" value="'.$nameThemes['id'].'">' .$nameThemes['name'];
                        } ?><br /><br />   

                <label for="titre"><h5>Votre Titre :</h5></label><br />
                <input type="text" placeholder="Votre Titre" id="titre" name="title" value="<?php echo $title; ?>"><br /><br />

                <label for="thumbnail"><h5>Veuillez télécharger votre image :</h5></label><br />
                <input type="file" placeholder="Votre image" id="thumbnail" name="thumbnail" value="<?php echo $thumbnail; ?>"><br />

                <textarea name="content" rows="8" cols="45" placeholder="Rajoutez votre article" value="<?php echo $content; ?>"></textarea><br /><br />

                <label for="envoi"><h5>Envoyer votre article :</h5></label>
                <input type="submit" class="btn btn-primary" name="validation" placeholder="Envoyer" />
            </div>
        </form>
        </div>
    </div>
<?php
}
else
{
    $erreur = "Vous devez etre connecte pour ecrire un article !";
    header('location:index.php?error="' .$erreur. '"');

}


