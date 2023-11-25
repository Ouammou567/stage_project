<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="../css/courriers_recues.css">
    <title> courriers recues | Stage </title>
    <style>
        td {
            text-align: center; 
        }
    </style>
</head>
<body>
    <div id="siteWeb">
        <main>
            <p>Les Courriers Recues</p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Expéditeur</th>
                        <th>Destinataire</th>
                        <th>Date</th>
                        <th>Identifiant</th>
                        <th>N°Courrier</th>
                        <th class="beforeLast">Objet</th>
                        <th>Courrier Numérique</th>
                    </tr>
                </thead>
                <tbody>
                    
                
                                
        </main>
    </div>
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    require('../arrière-plan/bd_connexion.php');
    session_start();

        $commande = " SELECT * FROM `courriers` INNER JOIN `courriers_numériques` ON courriers.iden = courriers_numériques.id ";
        $res = $connexion_bd -> query($commande);

        if($res) {
            while($fetch_res = mysqli_fetch_assoc($res)) {
                $id = $fetch_res['id'];
                $nom = $fetch_res['nom'];
                echo "<tr><td>" . $fetch_res['expéditeur'] . "</td><td> " . $fetch_res['destinataire'] . "</td><td>" . $fetch_res['date'] . "</td><td>" . $fetch_res['identifiant'] . "</td><td>" .$fetch_res['n°courrier'] . "</td><td>" . $fetch_res['objet'] . "</td><td><a href='view.php?id=$id' target='_blank' class=''> $nom </a>" ."</td></tr>";

            }
        }


        echo "</tbody></table>";











?>
