<?php include 'header.php';

include 'fonctions.php';
?>

<section id="articlesRecents" class="container">
    <div class="row">
        <div class="d-flex p-3 bg-secondary text-white">

        <?php $articledeBlog=getPosts($bdd);
            while($blogArticles=$articledeBlog->fetch()){ ?>
                <div class="col-lg-3 p-2 bg-info" style="max-width: 300px;">
                    <h3><?php echo $blogArticles["title"] ?></h3>
                    <p class="text-truncate"><?php echo $blogArticles["content"] ?></p>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php include 'footer.php';