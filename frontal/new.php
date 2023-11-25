<?php 
    if(isset($_POST['supprimer'])) {
        $identifiant_value = isset($_SESSION['identifiant_value']) ? $_SESSION['identifiant_value'] : '';
        $select_value = isset($_SESSION['select_value']) ? $_SESSION['select_value'] : '';
        // =======> IMPORTANT 
        $requete_mysql3 = "SELECT iden FROM `courriers` WHERE identifiant = '$identifiant_value' AND expéditeur = '$select_value'";
        $r = $connexion_bd  -> query($requete_mysql3);
        $fetch_r = mysqli_fetch_assoc($r);
        $important =  $fetch_r['iden'] ;

        $requete_mysql = "DELETE FROM `courriers` WHERE identifiant = '$identifiant_value' AND expéditeur = '$select_value'";

        $requete_mysql2 = "DELETE FROM `courriers_numériques` WHERE id = '$important'";
        
        mysqli_query($connexion_bd , $requete_mysql);
        mysqli_query($connexion_bd , $requete_mysql2);
        echo "<b>Courrier Supprimé. <a href='chercher_courrier.php'>Retourner</a></b>";
    }
?>