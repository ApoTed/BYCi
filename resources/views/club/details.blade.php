@extends('layouts.master')

@section('title', 'Dettagli Club')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $club->titolo }}</li>
@endsection

@section('body')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title" style="padding-top: 10px; padding-bottom: 10px;">{{ $club->titolo }}</h2>
                    <p class="text-muted">Descrizione del Club:</p>
                    <p>{{ $club->descrizione }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    Immagine del Club
                </div>
                <div class="card-body text-center">
                    @if($club->immagine)
                        <img src="{{ asset('storage/' . $club->immagine) }}" class="img-fluid" alt="Club Image" style="max-width: 100%;">
                    @else
                        <p class="text-muted">Nessuna immagine disponibile</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection