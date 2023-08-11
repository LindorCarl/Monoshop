<?php

    function getAdmin($email, $password)
    {
        if(require("connexion.php"))
        {
            $req=$access->prepare("SELECT * FROM `admin` WHERE email=? AND motdepasse=?");
            $req->execute(array($email, $password));

            /*  Si l'utilisateur correspond. */
            if($req->rowCount() == 1)
            {
                $data = $req->fetch();
                return $data;
            }else{
                return false;
            }
            
            $req->closeCursor();
        }
    }

    /* Fonction inscription(). */
    function inscription($pseudo, $email, $motdepasse)
    {
        if(require("connexion.php"))
        {
            $req = $access->prepare("INSERT INTO admin (pseudo, email, motdepasse) VALUES (?, ?, ?)");
            /* Pour éxécuter la fonction. */
            $req->execute(array($pseudo, $email, $motdepasse));
            return true;
            $req->closeCursor();
        }
    }

    /* Fonction ajouter(). */
    function ajouter($image, $nom, $prix, $desc)
    {
        /* Pour accéder à la DB, le fichier connexion est requis.*/
        if(require("connexion.php"))
        {
            $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");
            $req->execute(array($image, $nom, $prix, $desc));
            $req->closeCursor();
        }
    }

    /* Fonction afficher(). */
    function afficher()
    {
        if(require("connexion.php"))
        {
            /* Sélectionne tout par "id" dans l'ordre décroissant. */
            $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");
            $req->execute();
            /* Mettre ces valeurs dans une variable. */
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    /* Fonction afficherUnProduit(). */
    function afficherUnProduit($id)
    {
        if(require("connexion.php"))
        {
            $req=$access->prepare("SELECT * FROM produits WHERE id=?");
            $req->execute(array($id));
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    /* Fonction modifier(). */
    function modifier($image, $nom, $prix, $desc, $id)
    {
        if(require("connexion.php"))
        {
            $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?");
            $req->execute(array($image, $nom, $prix, $desc, $id));
            $req->closeCursor();
        }
    }

    /* Fonction supprimer(). */
    function supprimer($id)
    {
        if(require("connexion.php"))
        {
            $req=$access->prepare("DELETE FROM produits WHERE id=?");
            $req->execute(array($id));
            $req->closeCursor();
        }
    }

?>