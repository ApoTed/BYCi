// filepath: /home/apoted/Desktop/coding/web/BYCi/resources/views/macchina/index.blade.php
@extends('layouts.master')

@section('title', 'Macchine')

@section('active_macchine', 'active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Macchine</li>
@endsection

@section('body')
<div class="container mt-4">
    <div class="row">
        @foreach($macchine as $macchina)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    @if($macchina->immagine)
                        <img src="{{ asset('storage/' . $macchina->immagine) }}" class="card-img-top" alt="{{ $macchina->nome_modello }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $macchina->nome_modello }}</h5>
                        <p class="card-text">{{ Str::limit($macchina->descrizione, 100) }}</p>
                        <a href="{{ route('macchina.show', $macchina) }}" class="btn btn-primary">Vedi Dettagli</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection