<?php
// filepath: /home/apoted/Desktop/coding/web/BYCi/resources/views/macchina/edit.blade.php
@extends('layouts.master')

@section('title', 'Modifica Macchina')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('macchina.index') }}">Macchine</a></li>
<li class="breadcrumb-item active" aria-current="page">Modifica Macchina</li>
@endsection

@section('body')
<div class="container mt-4">
    <form action="{{ route('macchina.update', $macchina) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nome_modello">Nome Modello</label>
            <input type="text" class="form-control" id="nome_modello" name="nome_modello" value="{{ old('nome_modello', $macchina->nome_modello) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="5" required>{{ old('descrizione', $macchina->descrizione) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="immagine">Immagine</label>
            <input type="file" class="form-control" id="immagine" name="immagine">
            @if($macchina->immagine)
                <img src="{{ asset('storage/' . $macchina->immagine) }}" class="img-fluid mt-2" alt="{{ $macchina->nome_modello }}" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Modifica Macchina</button>
    </form>
</div>
@endsection