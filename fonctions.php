<?php 
//Les fonctions ICI

include 'connexion.php' ;

function getPosts($bdd){//les 10 derniers posts en page d'accueil
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
    
    while($blogArticles=$reponse->fetch()){
        echo '<article id="' .$blogArticles['id']. '">
            <h3>' .$blogArticles["title"]. '</h3>
            <img src="' .$blogArticles['thumbnail']. '" class="img-fluid rounded">
            <p class="apercu">' .$blogArticles["content"]. '</p>
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
}

function thePost($bdd,$blogId){//page dédiée à un article
    $reponse=$bdd->query('SELECT posts.id,`userId`,`thumbnail`,`title`,`content`,`published`,`pseudo` 
                            FROM `posts` 
                            INNER JOIN `users` 
                            ON posts.userId = users.id 
                            WHERE posts.id = ' .$blogId );
    
    return $reponse;
}

function lastsPosts($bdd,$userId,$blogId){//les 10 derniers articles de l'auteur
    $reponse=$bdd->query('SELECT posts.id,`userId`,`title`,`content`,`published`,`pseudo` 
                            FROM `posts` 
                            INNER JOIN `users` 
                            ON posts.userId = users.id 
                            WHERE posts.userId = '.$userId.
                            ' AND posts.id != ' .$blogId. 
                            ' ORDER BY published DESC LIMIT 10;');
    
    return $reponse;
}

function themes($bdd){
    $reponse=$bdd->query('SELECT * FROM `themes`;');
    return $reponse;
}

function allPosts($bdd, $idTheme){
    $allPosts=$bdd->query('SELECT * FROM `posts`INNER JOIN postTheme 
                                                    ON postTheme.postId=posts.id 
                                                    INNER JOIN themes 
                                                    ON themes.id=postTheme.themeId
                                                    INNER JOIN users
                                                    ON posts.userId=users.id 
                                                    WHERE themes.id=' .$idTheme);
    return $allPosts;
}

function theTheme($bdd,$idTheme){
    $reponse=$bdd->query('SELECT * FROM themes WHERE id=' .$idTheme);
    return $reponse;
}