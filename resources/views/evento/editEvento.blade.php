
@extends('layouts.master')

@section('title', $evento->exists ? 'Modifica Evento' : 'Crea Evento')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('evento.index') }}">Eventi</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $evento->exists ? 'Modifica' : 'Crea' }} Evento</li>
@endsection

@section('body')
<div class="container mt-4">
    <form id="eventoForm" action="{{ $evento->exists ? route('evento.update', $evento) : route('evento.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($evento->exists)
            @method('PUT')
        @endif

        <div class="form-group mb-3">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" value="{{ old('titolo', $evento->titolo) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="contenuto">Descrizione</label>
            <textarea class="form-control" id="contenuto" name="contenuto" rows="5" required>{{ old('contenuto', $evento->contenuto) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="data">Data Evento</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ old('data', $evento->data) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="immagine">Immagine</label>
            <input type="file" class="form-control" id="immagine" name="immagine">
            <div id="fileError" class="text-danger mt-2" style="display: none;">Il file deve essere jpg, jpeg o png</div>
            @if($evento->immagine)
                <img src="{{ asset('storage/' . $evento->immagine) }}" class="img-fluid mt-2" alt="Event Image" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ $evento->exists ? 'Modifica' : 'Crea' }} Evento</button>
    </form>
</div>

<script>
document.getElementById('eventoForm').addEventListener('submit', function(event) {
    var fileInput = document.getElementById('immagine');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

    if (fileInput.files.length > 0 && !allowedExtensions.exec(filePath)) {
        document.getElementById('fileError').style.display = 'block';
        event.preventDefault();
    } else {
        document.getElementById('fileError').style.display = 'none';
    }
});
</script>
@endsection