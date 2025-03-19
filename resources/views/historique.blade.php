<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des envois</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Historique des envois</h1>

        <form action="/historique" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <div class="col-md-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" class="form-select">
                        <option value="">Tous</option>
                        <option value="en attente" {{ request('statut') == 'en attente' ? 'selected' : '' }}>En attente</option>
                        <option value="en transit" {{ request('statut') == 'en transit' ? 'selected' : '' }}>En transit</option>
                        <option value="livré" {{ request('statut') == 'livré' ? 'selected' : '' }}>Livré</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Filtrer</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom de l'expéditeur</th>
                    <th>Nom du destinataire</th>
                    <th>Adresse du destinataire</th>
                    <th>Poids (kg)</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colis as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nom_expediteur }}</td>
                    <td>{{ $item->nom_destinataire }}</td>
                    <td>{{ $item->adresse_destinataire }}</td>
                    <td>{{ $item->poids }}</td>
                    <td>{{ $item->statut }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <a href="/enregistrement" class="btn btn-secondary">Retour à la liste</a>
    </div>
</body>
</html>