<?php 
//Les fonctions ICI

include 'connexion.php' ;

function getPosts($bdd){
    $reponse=$bdd->query('SELECT COUNT(`id`) as nbArt FROM `posts`');
    $donnees=$reponse->fetch();
    $nbArt=intVal($donnees['nbArt']);
    $perPage=10;
    $nbPage=ceil($nbArt/$perPage);

    if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
        $cPage=$_GET['p'];
    }else{
        $cPage=1;
    }

    $reponse=$bdd->query('SELECT * FROM `posts` ORDER BY published DESC LIMIT ' .(($cPage-1)*$perPage). ',' .$perPage. ';');
    
    echo '<div class="flex-container col-12 col-lg-6">';

    while($blogArticles=$reponse->fetch()){
        echo '<article id="' .$blogArticles['id']. '">
            <h3>' .$blogArticles["title"]. '</h3>
            <p class="text-truncate">' .$blogArticles["content"]. '</p>
            <a href="post.php?id=' .$blogArticles['id']. '">voir plus</a>
        </article>';
    }
    
    echo '<ul class="pagination pagination-lg">';

    for($i=1;$i<=$nbPage;$i++){
        if($i==$cPage){
            echo '<li> ' .$i. ' </li>';
        }else{
            echo '<li><a href="index.php?p=' .$i. '"> ' .$i. ' </a></li>';
        }
    }

    echo '</ul>';

    echo '</div>';

}

function thePost($bdd,$blogId){
    $reponse=$bdd->query('SELECT posts.id,`userId`,`thumbnail`,`title`,`content`,`published`,`pseudo` 
                            FROM `posts` 
                            INNER JOIN `users` 
                            ON posts.userId = users.id 
                            WHERE posts.id = ' .$blogId );
    
    return $reponse;
}