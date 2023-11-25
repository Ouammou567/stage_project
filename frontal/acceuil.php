<?php 
    session_start();
    if(!isset($_SESSION["nom"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/acceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> acceuil | Stage </title>
</head>
<body>
    <div id="siteWeb">
        <header><!--  LE BACKGROUND DE LA PARTIE HAUT DU PAGE--></header>
        <main>
            <aside>
                <div class="left box">
                    <button type="button">Acceuil</button>
                </div>
                <div class="right">
                    <div class="box">
                        <button type="button" >Mon Compte</button>
                    </div>
                    <div class="box">
                        <button type="button" class="déco"><a href="déconnecter.php">Déconnexion</a><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                    </div>
                </div>
            </aside>
            <section class="Section">
                <div class="Menu">
                    <button type="button"><i class="fa-solid fa-paper-plane"></i>Envoyer Courrier</button>
                    <button type="button"><i class="fa-solid fa-inbox"></i>Courriers Recues</button>
                    <button type="button"><i class="fa-solid fa-magnifying-glass"></i>Chercher Courriers</button>
                </div>
                <div class="contenuMenu">
                    <iframe src="envoyer_courrier.php" frameborder="0"></iframe>
                </div>
            </section>
        </main>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
   <script src="../js/acceuil.js"></script>
</body>
</html>
