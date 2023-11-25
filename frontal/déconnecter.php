<?php 
    session_start();
    unset($_SESSION["Nom"]);
    unset($_SESSION["Mot_De_Passe"]);
    session_destroy();
        header("Location: index.php");
?>