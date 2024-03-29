@extends('layout.app')

@section('content')
<div class="container">
    <h1>Liste des Livres</h1>
    <a href="{{ route('livres.create') }}" class="btn btn-primary my-4">Create livre</a>

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
            <tr>
                <td>{{ $livre->titre }}</td>
                <td>{{ $livre->auteur->nom }}</td>
                <td>
                    <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-primary btn-sm">Modifier</a>


                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $livre->id }}">
                        Supprimer
                    </button>


                    <div class="modal fade" id="deleteModal{{ $livre->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la Suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer ce livre : "{{ $livre->titre }}" ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <form action="{{ route('livres.destroy', $livre->id) }}" method="POST">
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
    {{ $livres->links('pagination::bootstrap-4') }}
</div>
@endsection
