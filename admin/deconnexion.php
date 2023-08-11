
<?php
    session_start();

    if (isset($_SESSION['xRttpHo0greL39'])){
        /* Si cette session existe alors retourne un tableau vide.*/
        $_SESSION['xRttpHo0greL39'] = array();

        session_destroy();

        header("Location: ../index.php");
    }else{
        header("Location: ../login.php");
    }

?>