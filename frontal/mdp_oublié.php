<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="../css/mdp_oublié.css">
    <title> mot de passe oublié | Stage </title>
</head>
<body>
    <div id="siteWeb">
        <header style="height: 10%;"></header>
        <main>
            <form action="../arrière-plan/mdp_oublié.php" method="post" id="mdp-form">
                <p> Veuillez Saisir Votre Nom et Votre Nouveau Mot de Passe </p>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"> Nom </span>
                    <input type="text" name="nom" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" spellcheck="false" required>
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"> Nouveau Mot de passe </span>
                    <input type="password" name="newpassword" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"> Réecire Ce Mot de passe </span>
                    <input type="password" name="samenewpassword" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" required>
                </div>
                <button type="submit" class="mt-2 btn btn-outline-primary" name="sauvegarder"> sauvegarder </button>
                <div class="proposCompte" style="width: 100%;">
                    <div class="Parent">
                        <a href="index.php"><button type="button" class="btn btn-outline-secondary"> Retourner</button></a>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>
</html>