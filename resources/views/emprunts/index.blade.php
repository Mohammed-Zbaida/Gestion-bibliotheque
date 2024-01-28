@extends('layout.app')

@section('content')
<div class="container">
    <h1>Emprunts</h1>
    <form action="{{ route('emprunts.index') }}" method="GET">
        <div class="form-group">
            <label for="date_debut">Date de Début:</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control">
        </div>
        <div class="form-group">
            <label for="date_fin">Date de Fin:</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Livre</th>
                <th>Auteur</th>
                <th>Date d'Emprunt</th>
                <th>Date de Retour</th>
                <th>
                    Action
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->livre->titre }}</td>
                    <td>{{ $emprunt->livre->auteur->nom }}</td>
                    <td>{{ $emprunt->date_d_emprunt }}</td>
                    <td>{{ $emprunt->date_de_retour ?? 'Pas encore retourné' }}</td>
                    <td>
                        <a href="{{ route('emprunts.edit', $emprunt->id) }}" class="btn btn-primary">Modifier</a>
                        <form method="POST" action="{{ route('emprunts.destroy', $emprunt->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
