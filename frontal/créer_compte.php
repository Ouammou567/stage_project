<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/créer_compte.css ">
    <title> créer compte | Stage</title>
</head>
<body>
    <div id="siteWeb">
        <header>
            <span> Bienveunue Dans La Page D'Inscription </span>
        </header>
        <main>
            <p> Veuillez Créer Votre Compte </p>
            <form action="../arrière-plan/créer_compte.php" method="post">
                <div class="">
                        <label for="Nom" class="form-label"> Nom </labe>
                        <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="">
                        <label for="MotDePasse" class="form-label"> Mot de passe </labe>
                        <input type="password" name="mot_de_passe" class="form-control" required>
                </div>
                <div class="buttons mt-2">
                    <button type="submit" class="btn btn-outline-secondary" name="s'inscrire"> s'inscrire </button>
                    <a href="index.php"><button type="button" class="btn btn-outline-secondary" > Retourner </button></a>
                </div>
            </form>
        </main> 
    </div>
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>
</html>
