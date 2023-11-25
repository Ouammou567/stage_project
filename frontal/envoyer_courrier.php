<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="../Css/envoyer_courrier.css">
    <title>Envoyer Courrier | Stage</title>
</head>
<body>
    <div id="siteWeb">
        <p>Pour envoyer un courrier, veuillez remplir les champs suivantes</p>
        <main>
            <form action="../arrière-plan/envoyer_courriers.php" method="post" enctype="multipart/form-data">
                <div class="mb-1">
                    <label for="">Expéditeur</label>
                    <input type="text"  class="form-control"  name="expéditeur" spellcheck="false" required>
                </div>
                <div class="mb-1">
                    <label for="">Destinataire</label>
                    <input type="text" class="form-control"  name="destinataire" spellcheck="false" required>
                </div>
                <div class="mb-1">
                    <label for="">Date</label>
                    <input type="date" class="form-control"  name="date" required>
                </div>
                <div class="mb-1">
                    <label for="">Identifiant</label>
                    <input type="text" class="form-control"  name="identifiant" spellcheck="false" required>
                </div>
                <div class="mb-1">
                    <label for="">N°Courrier</label>
                    <input type="text" class="form-control"  name="numéro_de_courrier" spellcheck="false" required>
                </div>
                <div class="mb-1">
                    <label for="">Objet</label>
                    <textarea spellcheck="false" class="form-control" rows="3" name="objet" placeholder="..." required></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Courrier Numérique (pdf) </label>
                    <input class="form-control" type="file" id="formFile" name="file" required>
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-outline-primary" name="envoyer">Envoyer</button>
                    <button type="reset" class="btn btn-outline-secondary">Réinitialiser</button>
                </div>
            </form>
        </main>
    </div>
    <script src="../Js/bootstrap.bundle.min.js"></script>
</body>
</html>
