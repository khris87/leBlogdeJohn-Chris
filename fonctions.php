<?php 
//Les fonctions ICI

include 'connexion.php' ;

function getPosts($bdd){
    $reponse=$bdd->query('SELECT * FROM `posts` ORDER BY published DESC;');
    return $reponse;
}