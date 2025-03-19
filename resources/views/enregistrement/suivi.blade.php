@extends('adminlte::page')

@section('title', 'Historique des envois')

@section('content_header')
    <h1>Suivi des colis</h1>
@stop

@section('content')

<div class="card">

    <div class="container mt-5">
        <form action="/enregistrement/checkSuivi" method="POST">
            @csrf
            <div class="mb-3">
                <label for="numero_colis" class="form-label">Numéro de suivi</label>
                <input type="text" name="numero_colis" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Vérifier</button>
        </form>

        <hr>
        <a href="/enregistrement/index" class="btn btn-secondary">Retour à la liste</a>
    </div>
    
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
