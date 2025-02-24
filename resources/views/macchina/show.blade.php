@extends('layouts.master')

@section('title', $macchina->nome_modello)

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('macchina.index') }}">Macchine</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $macchina->nome_modello }}</li>
@endsection

@section('body')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $macchina->nome_modello }}</h2>
                    <p class="text-muted">Pubblicato da {{ $macchina->user->name }} il {{ $macchina->created_at->format('d M Y') }}</p>
                    @if($macchina->immagine)
                        <img src="{{ asset('storage/' . $macchina->immagine) }}" class="img-fluid mt-2" alt="{{ $macchina->nome_modello }}">
                    @endif
                    <div class="mt-4">
                        <p>{{ $macchina->descrizione }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection