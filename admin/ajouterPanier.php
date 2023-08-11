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

    require("../config/commandes.php");

    /* Si un id est envoyé alors création d'une variable $id. */
    if(isset($_GET['id'])){ 
    
        if(!empty($_GET['id']) OR is_numeric($_GET['id']))
        {
            $id = $_GET['id'];
            $produits = afficherUnProduit($id);
        }

        
        // Si le produit existe dans le panier, ajoute un de plus au clic. 
        if(isset($_SESSION['panier'][$id])){
            $_SESSION['panier'][$id]= 1; // Représente la quantité
            header("Location: panier.php");
            // Sinon ajoute le produit au clic.
        }else{
            $_SESSION['panier'][$id]++; 
            header("Location: panier.php");
        }
    } 
?>