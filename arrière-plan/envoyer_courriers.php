<?php
    require('../arrière-plan/bd_connexion.php');
    session_start();
        if(isset($_POST['envoyer'])) {
            $expéditeur      = $_POST['expéditeur'];
            $destinatire     = $_POST['destinataire'];
            $date            = $_POST['date'];
            $id              = $_POST['identifiant'];
            $n°courrier      = $_POST['numéro_de_courrier'];
            $objet           = $_POST['objet'];

            $connexion_bd -> query(" INSERT INTO `courriers` (expéditeur, destinataire, date, identifiant, n°courrier, objet) VALUES ('$expéditeur', '$destinatire', '$date', '$id', '$n°courrier', '$objet') ");

            if (isset($_FILES['file'])) {
                $nom = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $donnée = file_get_contents($_FILES['file']['tmp_name']);
            
                $stmt = $connexion_bd -> prepare("INSERT INTO `courriers_numériques` (nom, type, donnée) VALUES (?, ?, ?)");
                $stmt -> bind_param("sss", $nom, $type, $donnée);
            
                if ($stmt -> execute()) {
                    echo "<b>Courrier Envoyé. <a href='../frontal/envoyer_courrier.php'>Retourner</a></b>";
                } else {
                    echo "Error: " . $stmt -> error;
                }
            
                $stmt->close();
            }
        }
        
    $connexion_bd->close();

?> 

