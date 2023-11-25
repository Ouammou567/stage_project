<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);    
    session_start();
    require('../arrière-plan/bd_connexion.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/connecter.css">
    <title> connecter | Stage </title>
</head>
<body>
    <div id="siteWeb">
        <header>
            <span> bienvenue </span>
        </header>
        <main>
            <div class="Title">
                <p class="Typewriter">Pour Avoir Plus d'Informations Veuillez Connecter à Votre Compte</p>
            </div>
            <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post">
                <div class="">
                        <label for="Nom" class="form-label"> Nom </labe>
                        <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-1">
                        <label for="MotDePasse" class="form-label"> Mot de passe </labe>
                        <input type="password" name="mot_de_passe" class="form-control" required>
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-outline-secondary" name="connecter"> connecter </button>
                </div>
            </form>
            <div class="aProposDuCompte">
                <div class="mdpOublie">
                    <a href="mdp_oublié.php" class="Texts"> Mdp Oublié </a>
                    <span class="underlineStyles"></span>
                </div>
                <div class="creerCompte">
                    <a href="créer_compte.php" class="Texts"> Créer un Compte </a>
                    <span class="underlineStyles"></span>
                </div>
            </div>
        </main> 
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../animations-learned/animat.js"></script>
</body>
</html>

<?php
    if(isset($_POST["connecter"])) {
        $Nom = stripslashes($_REQUEST["nom"]);
        $Nom = mysqli_real_escape_string($connexion_bd, $Nom);
        $Mot_De_Passe = stripslashes($_REQUEST["mot_de_passe"]);
        $Mot_De_Passe = mysqli_real_escape_string($connexion_bd, $Mot_De_Passe);
        $RECHERCHE_COMPTE = "SELECT * FROM `Utilisateurs` WHERE Nom = '$Nom' AND Mot_De_Passe = '$Mot_De_Passe'";
        $RESULTAT = mysqli_query($connexion_bd, $RECHERCHE_COMPTE);
        $NOMBRE_ENREGISTREMENTS = mysqli_num_rows($RESULTAT);
        if($NOMBRE_ENREGISTREMENTS != 0) {
            $RES = mysqli_fetch_assoc($RESULTAT);
            $_SESSION['nom'] = $RES['Nom'];
            $_SESSION['mot_de_passe'] = $RES['Mot_De_Passe'];
            header("Location: ../frontal/acceuil.php");
            exit();
        } else { 
            echo "<script>
                window.alert('ce compte n'existe pas');
            </script>";
        }
    }
    mysqli_close($connexion_bd); 
?>

