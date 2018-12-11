<?php include 'header.php';

include 'fonctions.php';
?>

<section id="articlesRecents" class="container">

    <div class="row">       
        <?php getPosts($bdd); ?>
    </div>
    
</section>

<?php include 'footer.php';