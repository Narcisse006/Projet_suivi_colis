@extends('adminlte::page')

@section('title', 'Contactez le support')

@section('content_header')
    <h1>Contactez le support</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Contactez le support</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('support.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="/support/index" class="btn btn-secondary">Consulter vos demandes</a>
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
    console.log("Page de contact du support chargée !");
</script>
@stop