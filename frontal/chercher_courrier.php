<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="../css/chercher_courrier.css">
    <title> chercher courrier | Stage </title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: 13px;
}
    </style>
</head>
<body>
    <p>Pour Trouver Votre Courrier Veuillez Remplir Ces Champs</p>
    <main>
        <aside>
            <form action="chercher_courrier.php " method="post">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type=text class='form-control'  name='identifiant' id="floatingInputGrid" placeholder="identifiant" required>
                            <label for="floatingInputGrid">Identifiant</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelectGrid" name="select" >
                                <option disabled selected value="">...</option>
                                <?php 
                                    include_once '../arrière-plan/bd_connexion.php';
                                        $commande = " SELECT expéditeur FROM `courriers` ";
                                        $res = $connexion_bd  -> query($commande);

                                        if($res) {
                                            while($fetch_res = mysqli_fetch_assoc($res)) {
                                                $val = $fetch_res['expéditeur'];
                                                echo "<option value='$val'>$val</option>";
                                            }
                                        }
                                ?>
                            </select>
                            <label for="floatingSelectGrid">Expéditeur</label>
                        </div>
                    </div>
                </div>
                <div class="buttons mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-secondary" name="chercher">Chercher</button>
                </div>
            </form>
            <section>
            </section>
        </aside>
        
        
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    session_start();
    include_once '../arrière-plan/bd_connexion.php';
        if(isset($_POST['chercher'])) {
            $identifiant = $_POST['identifiant'];
            $expéditeur  = $_POST['select'];
            $_SESSION['identifiant_value'] = $_POST['identifiant'];
            $_SESSION['select_value'] = $_POST['select'];
        
                $commande = " SELECT * FROM `courriers` INNER JOIN `courriers_numériques` ON courriers.iden = courriers_numériques.id WHERE identifiant = '$identifiant' AND expéditeur  = '$expéditeur'";
                $res = $connexion_bd  -> query($commande);
                $fetch_res = mysqli_fetch_assoc($res);
                if(mysqli_num_rows($res) != 0) { 
                    if ($res) {
                        echo "<table><thead>";
                            echo "<tr>";
                                echo "<th>Expéditeur</th>";
                                echo "<th>Destinatire</th>";
                                echo "<th>Date</th>";
                                echo "<th>N°Courrier</th>";
                                echo "<th>Identifinat</th>";
                                echo "<th>Objet</th>";
                                echo "<th>Courrier Numérique</th>";
                            echo "</tr></thead>";
                        echo "<tbody>";
                        
                        $id = $fetch_res['id'];
                        $nom = $fetch_res['nom'];
                        echo "<tr><td>" . $fetch_res['expéditeur'] . "</td><td> " . $fetch_res['destinataire'] . "</td><td>" . $fetch_res['date'] . "</td><td>" . $fetch_res['id'] . "</td><td>" .$fetch_res['n°courrier'] . "</td><td>" . $fetch_res['objet'] . "</td><td><a href='view.php?id=$id' target='_blank' class=''> $nom </a>" ."</td></tr>"; 
                        echo "</tbody></table>";

                        echo "<form action='' method='post' class='mt-1 mb-1' style='width: 100%; display: flex; justify-content: right; gap: 0.1rem;'>
                            <button type='submit' class='botonat p-2 bg-white font-monospace border-dark' name='modifier'>modifier</button>
                            <button type='submit' class='botonat p-2 bg-white font-monospace border-dark' name='supprimer'>supprimer</button>
                        </form>";  
                    }
                } else{
                    echo "<center><mark>Aucun Courrier Avec Ces Champs</mark></center>";
                }
        }
        
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

        if(isset($_POST['modifier'])) {
            $identifiant_value = isset($_SESSION['identifiant_value']) ? $_SESSION['identifiant_value'] : '';
            $select_value = isset($_SESSION['select_value']) ? $_SESSION['select_value'] : '';
            echo "<form style='width: 100%;' action='' method='post' enctype='multipart/form-data'>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%; justify-c ontent: center; align-items:center; '>
                    <label for=''>Expéditeur</label>
                    <input type='text'  class='form-control'  name='expéditeur' spellcheck='false' required>
                </div>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for=''>Destinataire</label>
                    <input type=text class='form-control'  name='destinataire' spellcheck='false' required>
                </div>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for=''>Date</label>
                    <input type=date class='form-control'  name='date' required>
                </div>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for=''>Identifiant</label>
                    <input type=text class='form-control'  name='identifiant' spellcheck='false' required>
                </div>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for=''>N°Courrier</label>
                    <input type=text class='form-control'  name='numéro_de_courrier' spellcheck='false' required>
                </div>
                <div class='mb-1' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for=''>Objet</label>
                    <textarea spellcheck=false class='form-control' rows='3' name='objet' placeholder='..'required></textarea>
                </div>
                <div class='mb-3' style='display: grid; grid-template-columns: 18% 80%; grid-gap: 2%;'>
                    <label for='formFile' class='form-label'>Courrier Numérique (pdf) </label>
                    <input class='form-control' type='file' id='formFile' name='file' required>
                </div>
                <div class='buttons' style='width: 100%; display: flex; justify-content: space-between;'>
                    <a href='chercher_courrier.php'><button type='button' class='btn btn-outline-secondary p-1'>Retourner</button></a>
                    <div class='kkk'>
                        <button type='submit' class='btn btn-outline-primary p-1' name='envoyer'> modifier </button>
                        <button type='reset' class='btn btn-outline-secondary p-1'>réinitialiser</button></div>
                </div>

            </form>";
        }

        if(isset($_POST['envoyer'])) {
            
            $expéditeur      = $_POST['expéditeur'];
            $destinatire     = $_POST['destinataire'];
            $date            = $_POST['date'];
            $id              = $_POST['identifiant'];
            $n°courrier      = $_POST['numéro_de_courrier'];
            $objet           = $_POST['objet'];

            $lastInfo = "SELECT expéditeur, destinataire, date, identifiant, n°courrier, objet FROM `courriers` WHERE identifiant = '$_SESSION[identifiant_value]'";
            $res_last = mysqli_query($connexion_bd , $lastInfo);
            $fetch_last = mysqli_fetch_assoc($res_last);
                $last_expéditeur = $fetch_last['expéditeur'];
                $last_destinatire = $fetch_last['destinataire'];
                $last_date = $fetch_last['date'];
                $last_id = $fetch_last['identifiant'];
                $last_n°courrier = $fetch_last['n°courrier'];
                $last_objet = $fetch_last['objet'];
            // IMPORTANT 
                $req_id = "SELECT iden FROM `courriers` WHERE identifiant = '$last_id'";
            $res_id = mysqli_query($connexion_bd , $req_id);
            $fetch_id = mysqli_fetch_assoc($res_id);
            $important_id = $fetch_id['iden'];
            $connexion_bd  -> query(" UPDATE `courriers` SET expéditeur = '$expéditeur', destinataire = '$destinatire', date = '$date', identifiant = '$id', n°courrier = '$n°courrier', objet = '$objet' WHERE expéditeur = '$last_expéditeur' AND  destinataire = '$last_destinatire' AND  date = '$last_date' AND identifiant = '$last_id' AND  n°courrier = '$last_n°courrier' AND objet = '$last_objet'");
            if(isset($_FILES['file'])){
                $nom = $_FILES['file']['name'];
                $type = $_FILES['file']['type'];
                $donnée = file_get_contents($_FILES['file']['tmp_name']);
                $stmt = mysqli_prepare($connexion_bd , "UPDATE `courriers_numériques` SET nom = ?, type = ?, donnée = ? WHERE id = ?");
                if ($stmt) {
                    // Bind parameters and execute the statement
                    mysqli_stmt_bind_param($stmt, "sssi", $nom, $type, $donnée, $important_id);
            
                    if (mysqli_stmt_execute($stmt)) {
                        echo "<b>Courrier Modifié. <a href='../frontal/chercher_courrier.php'>Retourner</a></b>";
                    } else {
                        echo "Error: " . mysqli_error($connexion_bd );
                    }
            
                    // Close the prepared statement
                    mysqli_stmt_close($stmt);
                } 
            }   
        }
        
        
    $connexion_bd ->close();

?> 

