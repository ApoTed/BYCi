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
        <div class="descrizione">
            <h2>Le nostre convenzioni</h2>
            <p>Descrizione delle convenzioni disponibili per i membri del BMW Youngtimer Club Italia.</p>
            <ul>
                <li>Convenzione 1: Descrizione della convenzione 1.</li>
                <li>Convenzione 2: Descrizione della convenzione 2.</li>
                <li>Convenzione 3: Descrizione della convenzione 3.</li>
            </ul>
        </div>
    </div>
</div>
@endsection