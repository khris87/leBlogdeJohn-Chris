<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    
<section class="jumbotron" id="enTete">
    <h1>Le blog de John et Chris</h1>
    <div id="connexion">
        <button type="button" id="connexion" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Connexion<!--bouton d'acces au modal-->
        </button>
    
        <form method="POST" action="deconnexion.php">
            <input type="submit" id="deconnexion" class="btn btn-primary" value="Deconnexion"><!--bouton de déconnexion-->
        </form>
    </div>
    <?php $erreur=$_GET['error'];
    if(isset($erreur)){
            echo '<font color="red">'.$erreur. "</font>";
    } ?>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
    
    <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Connexion utilisateur</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
    
    <!-- Modal body -->
                <div class="modal-body">
                    <form action="connect.php" method="post">
                        <div class="form-group">
                            <label for="pdo">Votre Mail</label>
                            <input type="email" class="form-control" id="pdo" name="mailconnect" placeholder="Enter mail"  >
                        </div>
                        <div class="form-group">
                            <label for="pwd">Votre mot de passe</label>
                            <input type="password" class="form-control" id="pwd" name="mdpconnect"  placeholder="Enter password" >
                        </div>
                </div>
    
    <!-- Modal footer -->
                <div class="modal-footer">
                        <button type="submit" name="formconnexion" class="btn btn-primary">Submit</button>
                    </form>
                </div>
    
            </div>
        </div>
    </div>
</section>