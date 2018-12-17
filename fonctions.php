<?php 
//Les fonctions ICI

include 'connexion.php' ;

function getPosts($bdd){//les 10 derniers posts en page d'accueil
    $reponse=$bdd->query('SELECT COUNT(`id`) as nbArt FROM `posts`');
    $donnees=$reponse->fetch();
    $nbArt=intVal($donnees['nbArt']);
    $perPage=10;
    $nbPage=ceil($nbArt/$perPage);

    if (isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage)
    {
        $cPage=$_GET['p'];
    }
    else
    {
        $cPage=1;
    }

    $reponse=$bdd->query('SELECT * FROM `posts` ORDER BY published DESC LIMIT ' .(($cPage-1)*$perPage). ',' .$perPage. ';');
    
    while($blogArticles=$reponse->fetch())
    {
        echo '<article id="' .$blogArticles['id']. '">';
        echo '<h3>' .$blogArticles["title"]. '</h3>';
        echo '<img src="' .$blogArticles['thumbnail']. '" class="img-fluid rounded">';
        echo '<p class="apercu">' .$blogArticles["content"]. '</p>';
        echo '<a href="post.php?art=' .$blogArticles['id']. '&id=' .$_SESSION['id']. '">voir plus</a>';
        echo '</article>';
        echo '<ul class="pagination pagination-lg">';
        echo '</ul>';
    }
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

function auteurs($bdd){
    $reponse=$bdd->query('SELECT * FROM users;');
    return $reponse;
}

function postsParAuteurs($bdd,$userId){
    $reponse=$bdd->query('SELECT * FROM `posts` INNER JOIN `users` ON `users`.`id`=`posts`.`userId` WHERE `users`.`id`=' .$userId);
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
function newPost($bdd, $id, $thumbnailPath, $title, $content)
    {
        $statement = $bdd->prepare("INSERT INTO posts(`thumbnail`, `title`, `content`,`userId`)
        VALUES (:thumbnail,:title,:content,:userId)");
        $requete = $statement->execute(array(
            'thumbnail'=>$thumbnailPath,
            'title'=>$title,
            'content'=>$content,
            'userId'=>$id
            ));
        header("location:index.php");
    }

function newPostTheme($bdd, $id, $themeId)
    {
        $query = $bdd->prepare('INSERT INTO `postTheme`(`postId`,`themeId`)
        VALUES(:postId,:themeId)');
        $query->execute([
            'postId'=>$id['id'],
            'themeId'=>$themeId['id'],
            ]);
    }

    function getNewPost($bdd, $title)
    {
        $newPost = $bdd->query('SELECT id
                                    FROM `posts`
                                    WHERE title = "' .$title. '";');
        $id=$newPost->fetch();
        return $id;
    }

function supprime($bdd, $id)
    {
        $crache = $bdd->query('DELETE FROM posts WHERE posts.id ='.$id);
        header("location:index.php");
    }