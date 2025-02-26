@extends('layouts.master') <!-- title - active_home - active_MyLibrary - breadcrumb - body -->

@section('title', 'Convenzioni')

@section('active_convenzioni', 'active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Convenzioni</li>
@endsection

@section('body')
<div class="alert alert-info" role="alert">
    Le convenzioni sono riservate esclusivamente agli iscritti al club.
</div>
<div class="row">
    @foreach($convenzioni as $convenzione)
    <div class="col-lg-12 col-sm-12">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $convenzione->titolo }}</h5>
                <p class="card-text">{{ $convenzione->descrizione }}</p>
                <a href="{{ asset('storage/' . $convenzione->pdf_path) }}" class="btn btn-primary" download>
                    Scarica l'offerta commerciale
                </a>
                @if(isset($_SESSION['logged']) && $_SESSION['logged'])
                    @if($_SESSION['role'] === 'admin')                
                    <a href="{{ route('convenzione.edit', $convenzione->id) }}" class="btn btn-secondary">
                    Modifica
                    </a>
                    @endif
                @endif  
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection