@extends('layout.app')

@section('content')

<div class="container">
    <h1>Liste des Auteurs</h1>
    <a href="{{ route('auteurs.create') }}" class="btn btn-primary my-4">Create auteur</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
            <tr>
                <td>{{ $auteur->nom }}</td>
                <td>
                    <a href="{{ route('auteurs.edit', $auteur->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $auteur->id }}">
                        Supprimer
                    </button>


                    <div class="modal fade" id="deleteModal{{ $auteur->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la Suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer ce livre : "{{ $auteur->nom }}" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <form action="{{ route('auteurs.destroy', $auteur->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Confirmer Suppression</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $auteurs->links('pagination::bootstrap-4') }}
</div>

@endsection




