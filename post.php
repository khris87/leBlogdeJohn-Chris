<?php 

include 'header.php';

include 'fonctions.php';

$blogId=$_GET['id'];
$content=thePost($bdd,$blogId);
$showContent=$content->fetch();
?>
<section class="container">
    <div class="row">
        <article class="col-12 col-lg-8">
            <h2><?php echo $showContent['title'] ?></h2>
            <p><?php echo $showContent['content'] ?></p>
        </article>
        <aside>
            <h6>Posté par : <?php echo $showContent['pseudo'] ?></h6>
            <span class="badge badge-info">le : <?php echo $showContent['published'] ?></span>
        </aside>
    </div>
</section>