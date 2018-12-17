<?php
session_start();
include 'header.php';
include 'fonctions.php';

$userId=$_GET['id'];
$allPosts=postsParAuteurs($bdd,$userId);
$all=$allPosts->fetch();
?>
<h1><?php echo $all['pseudo'] ?></h1>
<div class="container">
    <div class="d-flex flex-wrap">
        <?php while($all=$allPosts->fetch()){ ?>
            <div class="article">
                <h3><?php echo $all['title'] ?></h3>
                <figure id="thumbnail" class="figure float-left">
                    <img src="<?php echo $all['thumbnail'] ?>" class="figure-img img-fluid rounded">
                    <figcaption class="figure-caption"><?php echo $all['thumbnail'] ?></figcaption>
                </figure>
                <p><?php echo $all['content'] ?></p>
            </div>
            <?php } ?>
    </div>
</div>

