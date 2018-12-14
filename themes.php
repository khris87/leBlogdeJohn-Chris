<?php 
include 'header.php';
include 'fonctions.php';
$idTheme=$_GET['id'];
?>
<h2 class="text-uppercase"><?php $theTheme=theTheme($bdd,$idTheme);
                            $nameTheme=$theTheme->fetch();
                            var_dump();
                            echo $nameTheme['name'] ?></h2>

<div class="container">
            
    <div class="row">
        <?php   $seePosts=allPosts($bdd, $idTheme);
                while($posts=$seePosts->fetch()){
                ?>
                    <div class="col-12 col-lg-4">
                    <a href="post.php?id=<?php echo $posts['id'] ?>"><h4><?php echo $posts['title'] ?></h4></a>
                    <h6>Posté par : <?php echo $posts['pseudo'] ?></h6>
                    <span class="badge badge-info">le : <?php echo date_format(date_create($posts['published']),'d/m/Y à H:m') ?></span>
                    <article>
                    <?php echo $posts['content'] ?>
                    </article>
                    </div>
                <?php
                } ?>
    </div>
</div>