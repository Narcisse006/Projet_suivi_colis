<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer un colis</title>
</head>
<body>

    <h1>Enregistrer un colis</h1>

    <form action="/enregistrement/store" method="POST">
        @csrf
        <div>
            <label for="nom_expediteur">Nom de l'expediteur</label>
            <input type="text" name="nom_expediteur">
        </div>
        <div>
            <label for="nom_destinataire">Nom du destinataire</label>
            <input type="text" name="nom_destinataire">
        </div>
        <div>
            <label for="adresse_destinataire">Adresse de destinataire</label>
            <input type="text" name="adresse_destinataire">
        </div>
        <div>
            <label for="poids">Poids</label>
            <input type="text" name="poids">
        </div>
        <div class="mb-3">
            <label for="numero_colis">Numéro de suivi</label>
            <input type="text" name="numero_colis" required>
        </div>
        <div>
            <input type="submit" value="Enregistrer le colis">

            <a href="/enregistrement/index">Retour à la liste des enregistrement</a>
        </div>
    </form>
    
</body>
</html>