<?php
include "connexion.php";

$updateTitle=$_POST['updateTitle'];
$updateContent=$_POST['updateContent'];
$blogId=$_GET['art'];
$welcome=$_GET['id'];

var_dump($blogId);


        $statement = $bdd->prepare("UPDATE `posts` SET `title`=:updateTitle, `content`=:updateContent WHERE `posts`.`id`='$blogId';");
        $requete = $statement->execute([
            'updateTitle'=>$updateTitle,
            'updateContent'=>$updateContent
        ]);
        header("location:post.php?art=$blogId&id=$welcome");

