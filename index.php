<?php
session_start();
include "connexion.php";
include "fonction.php";
include 'header.php';
include 'fonctions.php';
?>

<section id="articlesRecents" class="container">

    <div class="row">       
        <?php getPosts($bdd); ?>
        <div class="col-12 col-lg-6" align="center">
        <h2>Inscription</h2>
            <form method="POST" action="">
                <table >
                    <tr>
                        <td align="right">
                            <label for="pseudo">Pseudo :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Votre Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mail">Mail :</label>
                        </td>
                        <td>
                            <input type="mail" placeholder="Votre Mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mail2">confirmation du mail :</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Confirmation de votre Mail" id="mail2" name="mail2" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mdp">votre Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="mdp2">confirmation de votre Mot de passe :</label>
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
<?php
if(isset($erreur))
{
    echo '<font color="red">'.$erreur."</font>";
}
?>   
            </form>
        <div>
            <a href="newpost.php?id=<?php echo $_SESSION['id'] ?>">Ecrire un nouvel article !</a>
        </div>
    </div>
    </div>
    
</section>

<?php include 'footer.php';

