@extends('adminlte::page')

@section('title', 'Enregistrement de colis')

@section('content_header')
    <h1>Enregistrer un colis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Enregistrer un colis</h3>
    </div>
    <div class="card-body">
        <form action="/enregistrement/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom_expediteur">Nom de l'expéditeur</label>
                <input type="text" name="nom_expediteur" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nom_destinataire">Nom du destinataire</label>
                <input type="text" name="nom_destinataire" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="adresse_destinataire">Adresse du destinataire</label>
                <input type="text" name="adresse_destinataire" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="poids">Poids (en kg)</label>
                <input type="number" step="0.1" name="poids" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer le colis</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Liste des enregistrements de colis</h3>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <a href="/enregistrement/create" class="btn btn-success mb-3">Enregistrer un colis</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Numéro de colis</th>
                    <th>Nom de l'expéditeur</th>
                    <th>Nom du destinataire</th>
                    <th>Adresse du destinataire</th>
                    <th>Poids (kg)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coli as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->numero_colis }}</td>
                    <td>{{ $item->nom_expediteur }}</td>
                    <td>{{ $item->nom_destinataire }}</td>
                    <td>{{ $item->adresse_destinataire }}</td>
                    <td>{{ $item->poids }}</td>
                    <td>
                        <a href="/enregistrement/{{ $item->id }}/show" class="btn btn-sm btn-warning">Modifier</a>

                        <form action="/enregistrement/{{ $item->id }}/destroy" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<style>
    .card {
        margin-top: 20px;
    }
    .table {
        margin-top: 20px;
    }
    .btn {
        margin-right: 5px;
    }
</style>
@stop

@section('js')
<script>
    console.log("Page d'enregistrement de colis chargée !");
</script>
@stop