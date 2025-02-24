@extends('layouts.master') <!-- title - active_home - active_MyLibrary - breadcrumb - body -->

@section('title', 'Convenzioni')

@section('active_convenzioni', 'active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Convenzioni</li>
@endsection

@section('body')
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Convenzione con Bartolini e Mauro assicurazioni</h5>
                <p class="card-text">Descrizione della convenzione con Bartolini e Mauro assicurazioni.</p>
                <a href="{{ url('/pdf/Offerta commerciale-BMW-Youngtimer-Club-loghi.pdf') }}" class="btn btn-primary" download>
                    Scarica l'offerta commerciale
                </a>
            </div>
        </div>
    </div>
</div>
@endsection