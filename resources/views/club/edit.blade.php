@extends('layouts.master')

@section('title', 'Modifica Club')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Modifica Club</li>
@endsection

@section('body')
<div class="container mt-4">
    <form action="{{ route('club.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="{{ $club->titolo }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="5" required>{{ $club->descrizione }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="immagine">Immagine del Club</label>
            <input type="file" class="form-control-file" id="immagine" name="immagine">
            @if($club->immagine)
                <img src="{{ asset('storage/' . $club->immagine) }}" class="img-fluid mt-2" alt="Club Image" style="max-width: 100%;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Salva Modifiche</button>
    </form>
</div>
@endsection