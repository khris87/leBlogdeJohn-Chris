<?php
session_start();
include 'header.php';
include 'fonctions.php';

$welcome=$_SESSION['id'];
$blogId=$_GET['art'];

$content=thePost($bdd,$blogId);
$showContent=$content->fetch();
?>

    <section class="container">
        <div class="row">
            <aside class="col-12 col-lg-4">
                <h1 class="titresNiv1">Aperçu de votre article</h1>
                <h2><?php echo $showContent['title'] ?></h2>
                <figure id="thumbnail" class="figure float-left">
                    <img src="<?php echo $showContent['thumbnail'] ?>" class="figure-img img-fluid rounded">
                    <figcaption class="figure-caption"><?php echo $showContent['thumbnail'] ?></figcaption>
                </figure>
                <p><?php echo $showContent['content'] ?></p>
            </aside>

        <?php if(isset($_SESSION['id']))
            { ?>
            <div class="col-12 col-lg-8">
                <h1 class="titresNiv1">Modifiez votre article</h1>

                <form method="post" action="Traitement.php?art=<?php echo $blogId ?>&id=<?php echo $welcome ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="theme"><h5>Titre</h5></label>
                        <input type="text" class="form-control" placeholder="titre" id="updateTitle" name="updateTitle" value="<?php echo $showContent['title'] ?>"><br />
                    </div>
                    <div class="form-group">
                        <textarea name="updateContent" class="form-control" rows="23" cols="78" placeholder="Rajoutez votre article"><?php echo $showContent['content'] ?></textarea><br />
                    </div>
                    <div class="form-group">
                        <label for="envoi"><h5>Vérifiez vos modifications avant de valider</h5></label>
                        <input type="submit" class="form-control" name="validation" id="envoi" placeholder="Enregistrer les modifications" />
                    </div>
                </form>
            </div>

        <?php
            }
?>

    </div>
</section>

<?php include 'footer.php';