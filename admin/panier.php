<?php
    /* Pour éviter d'accéder à cette page si login n'est pas à true */
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

    // Pour supprimer un article.
    if(isset($_GET['del'])){
        $id_del = $_GET['del'];
        unset($_SESSION['panier']["$id_del"]);
    }

    require("../config/connexion.php");
?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="/docs/5.3/assets/js/color-modes.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- Barre de navigation -->
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
                        <a class="nav-link active" aria-current="page" href="../admin/index.php"> Ajouter un article </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="supprimer.php" > Supprimer un article </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="articles.php" style="color:green; font-weight:bold"> Articles </a>
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

        <!-- Afficher les produits dans le panier -->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead class="text-center">
                            <br><br>
                            <tr >
                                <th class="col-md-4">Image</th>
                                <th class="col-md-4">Nom</th>
                                <th class="col-md-4">Prix</th>
                                <th class="col-md-4">Quantité</th>
                                <th class="col-md-4">Action</th>
                            </tr>
                        </thead>

                        <?php 
                            // Récupérer tous les "ids" stockés.
                            $ids = array_keys($_SESSION['panier']); 
                            // Pour éviter d'ajouter une valeur inexistante à $total; déclaration  de "$total = 0";
                            // Car Le premier appel serait "null" sinon.
                            $total = 0;

                            if(empty($ids)){
                                echo "Votre panier est vide";
                            }else{  
                                    
                                $produits = $access->query("SELECT * FROM produits WHERE id IN (".implode(",",$ids).")");
                                foreach($produits as $produit):
                                    // Nouvelle valeur à cette variable à chaque tour de boucle.
                                    $total = $total + $produit["prix"] * $_SESSION['panier'][$produit["id"]];
                                ?>
                                    <tbody>
                                        <tr class="text-center">
                                            <td><img src="<?= $produit["image"]?>" alt="" style="width:20%"/></td>
                                            <td><?= $produit["nom"] ?></td>
                                            <td style="color:green; font-weight:bold"><?= $produit["prix"] ?>€</td>
                                            <td><?= $_SESSION['panier'][$produit["id"]] ?></td>
                                            <td><a href="panier.php?del=<?= $produit["id"] ?>"><i class="fa fa-trash" style="font-size: 20px; color:red"></i></a></td>
                                        </tr>
                                    </tbody>

                                <?php endforeach; 
                            } 
                        ?>
                    </table>

                    <!-- Afficher le prix dans le panier -->
                    <div class="card mb-5">
                        <div class="card-body p-2">
                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="lead fw-normal me-2"> Total: </span> 
                                    <span class="lead fw-normal"><?= $total ?>€</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>


