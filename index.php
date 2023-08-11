<?php
    /* Fichier "commandesé qui contient les fonctions CRUD. */
    require("config/commandes.php");

    /* Dans cette variable ajout de la fonction afficher qui récupère tous les produits. */
    $mesProduits = afficher();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="/docs/5.3/assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.112.5">
        <title>Monoshop site e-commerce</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>

        <header data-bs-theme="dark">
            <div class="collapse text-bg-dark" id="navbarHeader">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-7 py-4">
                            <h4> A propos </h4>
                            <p class="text-body-secondary">
                                Créez votre boutique en ligne sans compétences techniques en quelques clics. 
                                Monoshop possède tout ce dont vous avez besoin pour commencer à vendre en ligne dès aujourd'hui. Simple, rapide, sécurisé.
                            </p>

                            </div>
                            <div class="col-sm-4 offset-md-1 py-4">
                            <h4>S'authentifier</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="login.php" class="text-white text-decoration-none"> Se connecter </a>
                                    <i class="fa-solid fa-user fa-xs"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center gap-2">
                        <strong>Monoshop</strong>
                        <i class="fa-solid fa-cart-shopping fa-sm"></i>
                    </a>

                    <a href="./admin/index.php" class="navbar-brand d-flex align-items-center gap-2">
                        <strong>Ajouter un article</strong>
                        <i class="fa-solid fa-bag-shopping fa-sm"></i>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </header>

       
        <main>
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <!-- Pour chaque produit affiche ce bloc, : à la fin de "foreach" pour dire que la fonction se termine plus bas. -->
                        <?php foreach($mesProduits as $unProduit): ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <h4 class="card-body"><?= $unProduit->nom ?></h4>
                                    <img  src="<?= $unProduit->image ?>" style="width:30%"/>
                                    <div class="card-body">
                                        <p class="card-text"> <?= substr($unProduit->description, 0, 130);?>...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="admin/ajouterPanier.php?id=<?= $unProduit-> id ;?>"><button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button></a>
                                            </div>
                                            <small class="text-body-secondary" style="font-weight:bold"> <?= $unProduit->prix ?> € </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </main>
        
    </body>
</html>
