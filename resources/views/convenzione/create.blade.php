@extends('layouts.master')

@section('title', 'Crea Convenzione')

@section('active_createConvenzione', 'active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('convenzioni') }}">Convenzioni</a></li>
<li class="breadcrumb-item active" aria-current="page">Crea Convenzione</li>
@endsection

@section('body')
<div class="container mt-4">
    <form action="{{ route('convenzione.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titolo">Titolo</label>
            <input type="text" class="form-control" id="titolo" name="titolo" required>
        </div>
        <div class="form-group">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="file" class="form-control-file" id="pdf" name="pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">Crea Convenzione</button>
    </form>
</div>
@endsection