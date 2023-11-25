<?php
    require('bd_connexion.php');
    session_start();

        $RECUPERER_DONNEES = " SELECT * FROM `Courriers` ";
        $RESULTAT = $connexion_bd -> query($RECUPERER_DONNEES);
    
        if($RESULTAT) {
            while($FETCH_RESULTAT = mysqli_fetch_assoc($RESULTAT)) {
                echo "<tr><td>" . $FETCH_RESULTAT['Expéditeur'] . "</td><td> " . $FETCH_RESULTAT['Destinataire'] . "</td><td>" . $FETCH_RESULTAT['Date'] . "</td><td>" . $FETCH_RESULTAT['Identifiant'] . "</td><td>" .$FETCH_RESULTAT['Numéro_De_Courrier'] . "</td><td>" . $FETCH_RESULTAT['Objet'] . "</td></tr>";

            }
        }
        header("refresh: 5;");

    echo "</tbody></table>";
    mysqli_close($connexion_bd);
?>