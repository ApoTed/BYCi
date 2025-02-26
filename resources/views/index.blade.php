@extends('layouts.master') <!-- title - active_home - active_MyLibrary - breadcrumb - body -->

@section('title', 'BYC')


@section('active_home','active')

@section('breadcrumb')
<li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection

@section('body')
<div class="row">
    <div class="col-lg-9 col-sm-12">
        <div class="descrizione">
            <p>Attivo dal 2006, il BMW Youngtimer Club Italia si è ritagliato uno spazio sempre maggiore nel panorama storico BMW del nostro paese, fino ad essere il primo ad accomunare tutti gli appassionati di youngtimer del marchio bavarese. Tutto sulle BMW d'epoca, dalla Neue Klasse in poi.</p>
            <p>Ormai da 10 anni, il BMW Youngtimer Club Italia è uno dei punti di riferimento più autorevoli del settore. Organizziamo numerosi eventi dove tanti appassionati si incontrano per condividere la loro passione per le BMW d'epoca, creando una comunità unita e vivace.</p>
        </div>
    </div>

    <div class="col-lg-3 col-sm-12">
        <div class="imgBiblio">
            <img class="img-thumbnail img-responsive" src="{{ url('/') }}/img/logoByciBlu.jpg">
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <p>Per iscriversi al club serve compilare il modulo e inviarlo a <a href="mailto:segreteria@bmwyoungtimerclubitalia.it">segreteria@bmwyoungtimerclubitalia.it</a> che fornirà ulteriori dettagli.</p>
        <a href="{{ url('pdf/BYCI Modulo Iscrizione Club - 2025.pdf') }}" class="btn btn-primary" download>
            Scarica il modulo di iscrizione al club
        </a>    
    </div>
</div>
@endsection