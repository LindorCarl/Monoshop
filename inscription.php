<?php 
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
        <br>
        <div class= "mx-auto" style="width : 40%">
        
            <form method="post" >
                <h4 style='text-align:center; font-weight:bold' >Inscription</h4>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                    <input type="pseudo" class="form-control" name="pseudo" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="motdepasse" class="form-control" name="motdepasse" required>
                </div>
                <button type="submit" name="valider" class="btn btn-primary">S'inscrire</button>
            </form>

            <br>
            <h5><a href="login.php" style="color: red; font-weight:bold"> Se connecter </a></h5>
            
        </div>
    </body>
</html>

<?php

    if(isset($_POST["valider"])){
        if(isset($_POST["pseudo"]) AND isset($_POST["email"]) AND isset($_POST["motdepasse"])){
            if(!empty($_POST["pseudo"]) AND isset($_POST["email"]) AND !empty($_POST["motdepasse"])){
                $pseudo= htmlspecialchars(strip_tags($_POST['pseudo'])) ;
                $email= htmlspecialchars(strip_tags($_POST['email'])) ;
                $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

                inscription($pseudo, $email, $motdepasse);

                header("Location: login.php");
            }
        }
    }

?>


