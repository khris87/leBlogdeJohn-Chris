<?php 
include 'header.php';
include 'fonctions.php';
$idTheme=$_GET['theme'];
?>
<h2 class="text-uppercase"><?php $theTheme=theTheme($bdd,$idTheme);
                            $nameTheme=$theTheme->fetch();
                            echo $nameTheme['name'] ?></h2>

<div class="container">
            
    <div class="row">
        <?php   $seePosts=allPosts($bdd, $idTheme);
                while($posts=$seePosts->fetch()){
                ?>
                    <div class="col-12 col-lg-4">
                    <a href="post.php?art=<?php echo $posts['id'] ?>"><h4><?php echo $posts['title'] ?></h4></a>
                    <h6>Posté par : <?php echo $posts['pseudo'] ?></h6>
                    <span class="badge badge-info">le : <?php echo date_format(date_create($posts['published']),'d/m/Y à H:m') ?></span>
                    <aside>
                    <?php echo $posts['content'] ?>
                    </aside>
                    </div>
                <?php
                } ?>
    </div>
</div>