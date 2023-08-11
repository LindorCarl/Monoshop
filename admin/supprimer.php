<?php
    /* Pour éviter d'accéder à cette page si login n'est pas à true. */
    session_start();

    /* Si la clé de la session est incorrecte. */
    if(!isset($_SESSION['xRttpHo0greL39']))
    {
        header("Location: ../login.php");
    }

    /* Si la session est vide. */
    if(empty($_SESSION['xRttpHo0greL39']))
    {
        header("Location: ../login.php");
    }

    require("../config/commandes.php");
    $mesProduits = afficher();
?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="/docs/5.3/assets/js/color-modes.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <h4>Monoshop</h4>
                </a>
                
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../admin/index.php">Ajouter un article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="supprimer.php" style="color:green; font-weight:bold">Supprimer un article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="articles.php" >Articles</a>
                    </li>
                </ul>   
            </div>
                <a href="panier.php" class="nav-link active me-4">
                    <i class="fa-solid fa-cart-shopping" style="font-size:17px"></i>
                    <!-- Afficher le nombre de produit dans le panier "array_sum" -->
                    <span class="badge rounded-pill badge-notification bg-danger"><?= array_sum($_SESSION['panier']) ?></span>
                </a>

                <a href="deconnexion.php" class="btn btn-danger">
                    Se déconnecter
                </a>
            </div>
        </nav>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>
                            <input type="number" class="form-control" name="idproduit" required>
                        </div>
                        
                        <button type="submit" name="valider" class="btn btn-warning">Supprimer le produit</button>
                    </form>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php foreach($mesProduits as $unProduit): ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <p></p>
                                    <img  src="<?= $unProduit->image ?>"/>
                                    <div class="card-body">
                                    <p class="card-text"> <?= $unProduit->id ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


<?php
    if(isset($_POST['valider'])){
        if(isset($_POST['idproduit'])){
            if(!empty($_POST['idproduit']) AND is_numeric($_POST['idproduit'])){
                $idproduit= htmlspecialchars(strip_tags($_POST['idproduit']));

                try{
                    supprimer($idproduit);
                    header('Location: '.$_SERVER['REQUEST_URI']);
                }catch(Exception $e){
                    $e->getMessage();
                }
            }
        }
    }
?>


