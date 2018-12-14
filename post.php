<?php 
session_start();

include 'header.php';

include 'fonctions.php';

$blogId=$_GET['art'];
$content=thePost($bdd,$blogId);
$showContent=$content->fetch();
?>
<section class="container">
    <div class="row">
        <article class="col-12 col-lg-8">
            <h2><?php echo $showContent['title'] ?></h2>
            <figure id="thumbnail" class="figure float-left">
                <img src="<?php echo $showContent['thumbnail'] ?>" class="figure-img img-fluid rounded">
                <figcaption class="figure-caption"><?php echo $showContent['thumbnail'] ?></figcaption>
            </figure>
            
            <p><?php echo $showContent['content'] ?></p>
            <div id="message">
            <?php $welcome=$_SESSION['id'];
                if(isset($welcome) && $welcome===$showContent['userId']){
                    echo $_SESSION['pseudo']. ', cliquez <a href="updatethepost.php?art=' .$blogId. '&id=' .$welcome. '">ici</a> si vous souhaitez modifier votre article.';
                } ?>
            </div>
        </article>
        <aside class="col-12 col-lg-4">
            <h6>Posté par : <?php echo $showContent['pseudo'] ?></h6>
            <span class="badge badge-info">le : <?php echo date_format(date_create($showContent['published']),'d/m/Y à H:m') ?></span>

            <div>
                <label for="supprime"><h5>Supprimé votre article :</h5></label>
                <a href="delete.php?id=<?php echo $blogId ?>" class="btn btn-primary">Supprimé</a>
            </div>

            <?php
            $blogId=$_GET['id'];
            $userId=$showContent['userId'];
            $lastsPosts=lastsPosts($bdd,$userId,$blogId);
            echo '<div class="flex-container mt-3">';
            while($showLasts=$lastsPosts->fetch()){

                echo '<article id="' .$showLasts['id']. '">
                    <h3>' .$showLasts["title"]. '</h3>
                    <p class="text-truncate">' .$showLasts["content"]. '</p>
                    <a href="post.php?id=' .$showLasts['id']. '">voir plus</a>
                </article>';
            }
            echo '</div>' ?>
            
        </aside>
        
    </div>
</section>