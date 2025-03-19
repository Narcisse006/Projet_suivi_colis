@extends('adminlte::page')

@section('title', 'Modifier un colis')

@section('content_header')
    <h1>Modifier un colis</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier les informations du colis</h3>
    </div>
    <div class="card-body">
        <form action="/enregistrement/{{ $coli->id }}/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $coli->id }}">
            
            <div class="form-group">
                <label for="numero_colis">Numéro de colis</label>
                <input type="text" class="form-control" value="{{ $coli->numero_colis }}" disabled>
            </div>
            <div class="form-group">
                <label for="nom_expediteur">Nom de l'expéditeur</label>
                <input type="text" name="nom_expediteur" class="form-control" value="{{ $coli->nom_expediteur }}" required>
            </div>
            <div class="form-group">
                <label for="nom_destinataire">Nom du destinataire</label>
                <input type="text" name="nom_destinataire" class="form-control" value="{{ $coli->nom_destinataire }}" required>
            </div>
            <div class="form-group">
                <label for="adresse_destinataire">Adresse du destinataire</label>
                <input type="text" name="adresse_destinataire" class="form-control" value="{{ $coli->adresse_destinataire }}" required>
            </div>
            <div class="form-group">
                <label for="poids">Poids (en kg)</label>
                <input type="number" step="0.1" name="poids" class="form-control" value="{{ $coli->poids }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier le colis</button>
            <a href="/enregistrement/index" class="btn btn-secondary">Retour à la liste</a>
        </form>
    </div>
</div>
@stop

@section('css')
<style>
    .card {
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .btn {
        margin-right: 5px;
    }
</style>
@stop

@section('js')
<script>
    console.log("Page de modification de colis chargée !");
</script>
@stop