<?php
    require('../arrière-plan/bd_connexion.php');
    session_start();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT nom, type, donnée FROM `courriers_numériques` WHERE id = ?";
            $stmt = $connexion_bd -> prepare($sql);
            $stmt -> bind_param("i", $id);
            $stmt -> execute();
            $stmt -> bind_result($nom, $type, $donnée);

            if ($stmt -> fetch()) {
                // Set the appropriate content type based on the file type
                header("Content-Type: $type");

                // Output the file data
                echo $donnée;
            } else {
                echo "File not found.";
            }

            $stmt -> close();
        }

    $connexion_bd -> close();
?>
