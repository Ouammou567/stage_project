<?php 
    include_once 'bd_connexion.php';
    session_start();

    $Nom          = $_POST["nom"];
    $Mot_De_Passe = $_POST["mot_de_passe"];
    
    if(isset($_POST["s'inscrire"])) {
        $CRÉER_COMPTE = " INSERT INTO `utilisateurs` (Nom, Mot_De_Passe) VALUES ('$Nom','$Mot_De_Passe') ";
        $connexion_bd -> query($CRÉER_COMPTE);
        header("Location: ../frontal/index.php");
    }
    

?>