
@extends('layout.app')

@section('content')
<div class="container">
    <h1>Modifier Emprunt</h1>
    <form method="POST" action="{{ route('emprunts.update', $emprunt->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="livre_id">Livre</label>
            <select class="form-control" id="livre_id" name="livre_id">
                @foreach ($livres as $livre)
                    <option value="{{ $livre->id }}" {{ $livre->id == $emprunt->livre_id ? 'selected' : '' }}>{{ $livre->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_emprunt">Date d'Emprunt</label>
            <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" value="{{ $emprunt->date_emprunt }}" required>
        </div>
        <div class="form-group">
            <label for="date_retour">Date de Retour</label>
            <input type="date" class="form-control" id="date_retour" name="date_retour" value="{{ $emprunt->date_retour }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>


    </form>
</div>
@endsection
