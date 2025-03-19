@extends('adminlte::page')

@section('title', 'Tableau de bord')

@section('content_header')
    <h1>Tableau de bord</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">Colis en attente</h5>
                <p class="card-text">{{ $colisEnAttente }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Colis en transit</h5>
                <p class="card-text">{{ $colisEnTransit }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Colis livrés</h5>
                <p class="card-text">{{ $colisLivres }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Total des colis</h5>
                <p class="card-text">{{ $totalColis }}</p>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Derniers colis enregistrés</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Numéro de colis</th>
                            <th>Expéditeur</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentColis as $colis)
                        <tr>
                            <td>{{ $colis->id }}</td>
                            <td>{{ $colis->numero_colis }}</td>
                            <td>{{ $colis->nom_expediteur }}</td>
                            <td>
                                <span class="badge 
                                    @if($colis->statut == 'en attente') badge-warning
                                    @elseif($colis->statut == 'en transit') badge-info
                                    @elseif($colis->statut == 'livré') badge-success
                                    @endif">
                                    {{ $colis->statut }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop