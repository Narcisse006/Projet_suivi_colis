@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Demandes de support</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Message</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $demande)
            <tr>
                <td>{{ $demande->nom }}</td>
                <td>{{ $demande->email }}</td>
                <td>{{ $demande->message }}</td>
                <td>{{ $demande->statut }}</td>
                <td>
                    <form action="{{ route('admin.support.update', $demande->id) }}" method="POST">
                        @csrf
                        <select name="statut" class="form-select">
                            <option value="En attente" {{ $demande->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                            <option value="En cours" {{ $demande->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                            <option value="Résolu" {{ $demande->statut == 'Résolu' ? 'selected' : '' }}>Résolu</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-2">Mettre à jour</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <a href="/support/create">Retour</a>
    </table>

    {{ $demandes->links() }}
</div>
@endsection
