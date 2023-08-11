<?php 

    /* Ici on démarre une session puis création d'une "variable session" en dessous. */
    session_start();

    include "config/commandes.php";

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head><script src="/docs/5.3/assets/js/color-modes.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>
        <br>
        <br>
            
        <div class= "mx-auto" style="width : 40%">
            <form method="post">
                <h4 style='text-align:center; font-weight:bold' >Connexion</h4>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="motdepasse" class="form-control" name="motdepasse" required>
                </div>
                <button type="submit" name="valider" class="btn btn-primary">Se connecter</button>
            </form>
            <br>
            <h5><a href="inscription.php" style="color: red; font-weight:bold"> S'inscrire </a></h5>
            
        </div>
    </body>
</html>

<?php

    if(isset($_POST["valider"])){
        if(isset($_POST["email"]) AND isset($_POST["motdepasse"])){
            if(!empty($_POST["email"]) AND !empty($_POST["motdepasse"])){
                $email= htmlspecialchars(strip_tags($_POST['email'])) ;
                $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

                $admin = getAdmin($email, $motdepasse);

                if($admin){
                    /* Création de la variable session et  "admin" qui contient les infos des utilisateurs.*/
                    /* Cette session unique est une sécurité qui permettra d'afficher les autres pages que si on est connecté. */
                    $_SESSION['xRttpHo0greL39'] = $admin;

                    /* Puisque les infos sont OK, redirection vers la page de création de produits. */
                    header("Location: ./admin/index.php");
                }else{
                    echo "Email ou mot de passe incorrect.";
                }
            }
        }
    }

?>


