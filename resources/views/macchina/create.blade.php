// filepath: /home/apoted/Desktop/coding/web/BYCi/resources/views/macchina/create.blade.php
@extends('layouts.master')

@section('title', 'Crea Macchina')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('macchina.index') }}">Macchine</a></li>
<li class="breadcrumb-item active" aria-current="page">Crea Macchina</li>
@endsection

@section('body')
<div class="container mt-4">
    <form action="{{ route('macchina.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="nome_modello">Nome Modello</label>
            <input type="text" class="form-control" id="nome_modello" name="nome_modello" value="{{ old('nome_modello') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="5" required>{{ old('descrizione') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="immagine">Immagine</label>
            <input type="file" class="form-control" id="immagine" name="immagine">
        </div>

        <button type="submit" class="btn btn-primary">Crea Macchina</button>
    </form>
</div>
@endsection