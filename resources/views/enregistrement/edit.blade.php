@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le statut du colis</h1>
    
    <form action="/enregistrement/{{ $coli->id }}/update-status" method="POST">
        @csrf
        <label for="statut">Statut :</label>
        <select name="statut" class="form-select">
            <option value="en attente" {{ $coli->statut == 'en attente' ? 'selected' : '' }}>En attente⚠</option>
            <option value="en transit" {{ $coli->statut == 'en transit' ? 'selected' : '' }}>En transit🚀</option>
            <option value="livré" {{ $coli->statut == 'livré' ? 'selected' : '' }}>Livré✅</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        <a href="/enregistrement/historique" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
