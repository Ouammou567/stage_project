<?php 
    include_once '../arrière-plan/bd_connexion.php';
    session_start();

    if(isset($_POST['sauvegarder'])) {
        $Nom         = $_POST['nom'];
        $Mot_De_Passe   = $_POST['newpassword'];
        $Same_Mot_De_Passe = $_POST['samenewpassword'];

        $SELECT = "SELECT * FROM `Utilisateurs` WHERE Nom = '$Nom'";

        $Result = $connexion_bd -> query($SELECT);

        $Fetch = mysqli_fetch_array($Result);

        $countRESULT = mysqli_num_rows($Result);

        if($Mot_De_Passe == $Same_Mot_De_Passe) {
            if($countRESULT != 0) {
                $UPDATE = "UPDATE `Utilisateurs` SET Mot_de_passe= '$Mot_De_Passe' WHERE Nom='$Nom'";
                $connexion_bd -> query($UPDATE);
                echo "Votre mot de passe a bien éte changé :)";
                echo "<br/><a href='../frontal/index.php'>Retourne vers l'acceuil</a>";
            } else {
                die("Not Exist");
            }
        } else {
            die("Réecrire le même mot de passe (:");
        }
        
    }






?>