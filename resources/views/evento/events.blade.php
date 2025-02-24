@extends('layouts.master')<!-- title - active_home - active_MyLibrary - breadcrumb - body -->

@section('title','Eventi')


@section('active_eventi','active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Eventi</li>
@endsection
    
@section('body')
<div class="container mt-4">
    @if($eventi->isEmpty())
        <p class="text-muted">No events available at the moment.</p>
    @else
        <div class="row">
            @foreach($eventi as $evento)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <!--<img src="{{ $evento->immagine }}" class="card-img-top" alt="{{ $evento->titolo }}">-->
                    <div class="card-body">
                        <h5 class="card-title" style="padding-top: 10px; padding-bottom: 10px;">{{ $evento->titolo }}</h5>
                        <p class="card-text">{{ Str::limit($evento->contenuto, 100) }}</p>
                        <a href="{{ route('evento.show', $evento->id) }}" class="btn btn-primary">Leggi i dettagli</a>
                    </div>
                    <div class="card-footer">   
                        <small class="text-muted">Pubblicato da {{ $evento->user->name }} il {{ $evento->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item" id="previousPage"><a class="page-link" href="#">Previous</a></li>
                <!-- Page numbers will be dynamically inserted here by JavaScript -->
                <li class="page-item" id="nextPage"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    @endif
</div>
@endsection