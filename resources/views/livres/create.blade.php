@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter un Nouveau Livre</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('livres.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        <div class="form-group">
                            <label for="auteur_id">Auteur</label>
                            <select class="form-control" id="auteur_id" name="auteur_id">
                                @foreach ($auteurs as $auteur)
                                    <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="annee_de_publication">Année de Publication</label>
                            <input type="number" class="form-control" id="annee_de_publication" name="annee_de_publication">
                        </div>

                        <div class="form-group">
                            <label for="nombre_de_pages">Nombre de Pages</label>
                            <input type="number" class="form-control" id="nombre_de_pages" name="nombre_de_pages">
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
