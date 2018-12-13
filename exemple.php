$title = $img = $content = "";
$titleError = $imgError = $contentError = "";
if (!empty($_POST))
{
   $title             =checkInput($_POST["title"]);
   $img                =checkInput($_FILES["img"]["name"]);
   $imgPath            ='img/'. basename($img);
   $imgExtension       = pathinfo($imgPath, PATHINFO_EXTENSION);
   $isSucess           = true;
   $isUploadSuccess    = false;
   $content            =checkInput($_POST["content"]);


   /*if(empty($title))
   {
       $titleError   = "Ajoutes nous un joli titre!";
       $isSucess           = false;
   }
   if(empty($content))
   {
       $contentError   = "C'est mieux quand c'est rempli!";
       $isSucess           = false;
   }
   if(empty($img))
   {
       $imgError   = "Avec une image ça serait mieux!";
       $isSucess           = false;
   }
       else
       {
           $isUploadSuccess    = true;
           if($imgExtension != "jpg" && $imgExtension != "png" && $imgExtension != "jpeg" && $imgExtension != "gif" )
           {
               $imgError = "Les fichiers autorisés sont de type: .jpg, .jpeg, .png, .gif";
               $isUploadSuccess    = false;
           }
           if(file_exists($imgPath))
           {
               $imgError = "Le fichier existe déjà";
               $isUploadSuccess    = false;
           }
           if($_FILES["img"]["size"] > 500000)
           {
               $imgError = "Le fichier ne doit dépasser les 500KB";
               $isUploadSuccess    = false;
           }*/
           if($isUploadSuccess)
           {
               if(!move_uploaded_file($_FILES["img"]["tmp_name"],$imgPath))
               {
                   $imgError = "Il y a eu une erreur lors de l'upload";
                   $isUploadSuccess    = false;
               }
           }
       //}

       if($isSucess && $isUploadSuccess )
       {
           $statement = $bdd->prepare("INSERT INTO `posts`(`thumbnail`, `title`, `content`,`user_Id`)
           VALUES (:img,:title,:content,:userId)");
           var_dump($imgPath);
           var_dump($title);
           var_dump($content);
           var_dump($_SESSION['id']);
          $requete = $statement->execute(array(
               'img'=>$imgPath,
               'title'=>$title,
               'content'=>$content,
               'userId'=>$_SESSION['id']
               ));
           header("location: index.php");

       }
}

Zone de message

Envoyer un message à ASMAE