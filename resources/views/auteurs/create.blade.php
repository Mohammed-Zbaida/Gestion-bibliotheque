@extends('layout.app')

@section('content')
<div class="container">
    <h1>Ajouter un Nouvel Acteur</h1>
    <form method="POST" action="{{ route('auteurs.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" clas s="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prénom">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
