@extends('adminlte::page')

@section('title', 'Historique des envois')

@section('content_header')
    <h1>Historique des envois</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Filtrer les envois</h3>
    </div>
    <div class="card-body">
        <form action="/enregistrement/historique" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <div class="col-md-3">
                    <label for="statut" class="form-label">Statut</label>
                    <select name="statut" class="form-control">
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
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Historique des envois</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Numéro de colis</th>
                    <th>Nom de l'expéditeur</th>
                    <th>Nom du destinataire</th>
                    <th>Adresse du destinataire</th>
                    <th>Poids (kg)</th>
                    <th>Statut</th>
                    <th>Action</th>
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
                        <span class="badge 
                            @if($item->statut == 'en attente') badge-warning
                            @elseif($item->statut == 'en transit') badge-info
                            @elseif($item->statut == 'livré') badge-success
                            @endif">
                            {{ $item->statut }}
                        </span>
                    </td>
                    <td>
                        <a href="/enregistrement/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Modifier le statut</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-footer">
        <a href="/enregistrement/index" class="btn btn-secondary">Retour à la liste</a>
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
    .badge {
        font-size: 14px;
        padding: 5px 10px;
    }
    .badge-warning {
        background-color: #ffc107;
        color: #000;
    }
    .badge-info {
        background-color: #17a2b8;
        color: #fff;
    }
    .badge-success {
        background-color: #28a745;
        color: #fff;
    }
</style>
@stop

@section('js')
<script>
    console.log("Page d'historique des envois chargée !");
</script>
@stop