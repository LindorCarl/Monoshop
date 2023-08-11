<?php
    try{
        /* Pdo est une fonction de php pour se connecter avec la BD. */
        $access = new pdo("mysql:host=localhost;dbname=monoshop;charset=utf8", "root", "root");

        /* Pour afficher les erreurs. */
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }catch(Exception $e){
        $e->getMessage();
    }
?>