<?php
session_start();
include "connexion.php";
include "fonction.php";
include 'header.php';
include 'fonctions.php';
?>

<section id="articlesRecents" class="container">

    <div class="row">

        <div class="flex-container col-12 col-lg-6">      
            <?php getPosts($bdd); ?>
        </div>

        <div class="col-12 col-lg-6" align="center">
        <h2>Inscription</h2>
            <form method="POST" action="">
                <table >
                    <tr>
                        <td align="left">
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="mail">Mail :</label>
                        </td>
                        <td>
                            <input type="mail" placeholder="Votre Mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="mail2">confirmation du mail :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Confirmation de votre Mail" id="mail2" name="mail2" />
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="mdp">votre Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="mdp2">confirmation Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Confirmation de votre passe" id="mdp2" name="mdp2" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="forminscription" value="je m'inscris" />
                        </td>
                    </tr>
                </table>        

            </form>

        <div>
            <a href="newpost.php?id=<?php echo $_SESSION['id'] ?>">Ecrire un nouvel article !</a>
        </div>
        <?php 
        $erreur=$_GET['error'];
        if(isset($erreur)){
                echo '<font color="red">'.$erreur."</font>";
        } 
        ?>

        <div class="row">
            <div class="col-12 col-lg-6">
            <h3>Articles par thèmes</h3>
            <dl>
                <?php $themes=themes($bdd);
                    while($nameThemes=$themes->fetch()){
                        echo '<dt><a href="themes.php?art=' .$nameThemes['id']. '">' .$nameThemes['name']. '</a></dt>' ;
                        $idTheme=$nameThemes['id'];
                        $seePosts=allPosts($bdd, $idTheme);
                        while($posts=$seePosts->fetch()){
                            echo '<dd>' .$posts['title']. '</dd>';
                        }
                    }
                ?>
            </dl>
            </div>
            <div class="col-12 col-lg-6">
            <h3>Articles par auteurs</h3>
            <dl>
                <?php $auteurs=auteurs($bdd);
                    while($nameAuteurs=$auteurs->fetch()){
                        echo '<dt>' .$nameAuteurs['pseudo']. '</dt>' ;
                        $userId=$nameAuteurs['id'];
                        $postsParAuteurs=postsParAuteurs($bdd,$userId);
                        while($pPA=$postsParAuteurs->fetch()){
                            echo '<dd>' .$pPA['title']. '</dd>';
                        }
                    }
                ?>
                </dl>
            </div>
        </div>
    </div>
    </div>
    
</section>

<?php include 'footer.php';

