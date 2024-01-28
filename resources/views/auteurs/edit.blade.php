@extends('layout.app')

@section('content')
<div class="container">
    <h1>Modifier l'Acteur: {{ $auteur->nom }}</h1>
    <form method="POST" action="{{ route('auteurs.update', $auteur->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $auteur->nom }}" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $auteur->prenom }}">
        </div>



        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
