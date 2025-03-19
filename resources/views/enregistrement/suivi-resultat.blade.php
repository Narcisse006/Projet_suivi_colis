<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du suivi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Résultat du suivi</h1>

        @if($coli)
            <p><strong>Numéro de colis :</strong> {{ $coli->numero_colis }}</p>
            <p><strong>Nom de l'expediteur :</strong> {{ $coli->nom_expediteur }}</p>
            <p><strong>Nom du destinataire :</strong> {{ $coli->nom_destinataire }}</p>
            <p><strong>Adresse du destinataire :</strong> {{ $coli->adresse_destinataire }}</p>
            <p><strong>Statut :</strong> {{ $coli->statut }}</p>
        @else
            <p>Aucun colis trouvé.</p>
        @endif

        <hr>
        <a href="/enregistrement/suivi" class="btn btn-secondary">Retour</a>
    </div>
</body>
</html>