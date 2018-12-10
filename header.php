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
    
<section id="enTete">
    <div class="container">
        <h1>Le blog de John et Chris</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Connexion<!--bouton d'acces à la connexion-->
        </button>
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
                        <form action="log.php">
                            <div class="form-group">
                                <label for="email">Pseudo</label>
                                <input type="texto" class="form-control" id="pdo" placeholder="Enter pseudo" name="pseudo">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                    </div>
        
        <!-- Modal footer -->
                    <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</section>