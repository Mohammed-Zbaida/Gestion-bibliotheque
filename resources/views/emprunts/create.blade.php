@extends('layout.app')

@section('content')
<div class="container">
    <h1>Ajouter un Emprunt</h1>
    <form method="POST" action="{{ route('emprunts.store') }}">
        @csrf
        <div class="form-group">
            <label for="livre_id">Livre</label>
            <select class="form-control" id="livre_id" name="livre_id">
                @foreach ($livres as $livre)
                    <option value="{{ $livre->id }}">{{ $livre->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_emprunt">Date d'Emprunt</label>
            <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" value="{{ now()->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="date_retour">Date de Retour</label>
            <input type="date" class="form-control" id="date_retour" name="date_retour">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
