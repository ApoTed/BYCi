@extends('layouts.master')

@section('title', 'Dettagli Evento')

@section('active_eventi', 'active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('evento.index') }}">Eventi</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $evento->titolo }}</li>
@endsection

@section('body')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                <h2 class="card-title" style="padding-top: 10px; padding-bottom: 10px;">{{ $evento->titolo }}</h2>
                <p class="text-muted">Pubblicato da {{ $evento->user->name }} il {{ $evento->created_at->format('d M Y') }}</p>
                    @if($evento->immagine)
                        <!-- Display the image from the public storage -->
                        <img src="{{ asset('storage/' . $evento->immagine) }}" class="img-fluid mt-2" alt="Event Image" style="max-width: auto;">
                    @endif
                    <div class="mt-4">
                        <p>{{ $evento->contenuto }}</p>
                    </div>
                </div>
            </div>

            <!-- Comment Section -->
            @if(isset($_SESSION['logged']) && $_SESSION['logged'])
                <div class="card mb-4">
                    <div class="card-header">Aggiungi un commento</div>
                    <div class="card-body">
                        <form action="{{ route('commento.create', $evento->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="contenuto" rows="3" placeholder="Inserisci il tuo commento..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Commenta</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    Solo i membri possono commentare.
                </div>
            @endif

            <div class="mt-4">
                <h4>Commenti</h4>
                @if($evento->commenti && $evento->commenti->count() > 0)
                    @foreach($evento->commenti as $commento)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p>{{ $commento->contenuto }}</p>
                                <p class="text-muted">Commento di {{ $commento->user->name }} il {{ $commento->created_at->format('d M Y, H:i') }}</p>
                                @if(isset($_SESSION['logged']) && $_SESSION['logged'] && ($_SESSION['loggedID'] == $commento->user_id || $_SESSION['role'] === 'admin'))
                                    <form action="{{ route('commento.delete', [$commento->id, $evento->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare questo commento?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Cancella</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No comments yet.</p>
                @endif
            </div>
        </div>
        
        <!-- Event Details -->
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    Event Details
                </div>
                <div class="card-body">
                    <p><strong>Titolo</strong> {{ $evento->titolo }}</p>
                    <p><strong>Creato il:</strong> {{ $evento->created_at->format('d M Y, H:i') }}</p>
                    <p><strong>Aggiornato il:</strong> {{ $evento->updated_at->format('d M Y, H:i') }}</p>
                    <p><strong>Pubblicato da:</strong> {{ $evento->user->name }}</p>
                </div>
            </div>

            @if(isset($_SESSION['logged']) && $_SESSION['logged'])
                @if($_SESSION['role'] === 'admin')
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('evento.edit', $evento->id) }}" class="btn btn-primary"><i class="bi bi-pencil"></i> Modifica</a>
                        <form action="{{ route('evento.destroy', $evento->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Cancella</button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
