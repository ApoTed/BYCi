@extends('layouts.master')

@section('title', 'Gestisci utenti')

@section('active_gestisci','active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Gestisci Utenti</li>
@endsection
@section('body')
<div class="container mt-4">
    @if ($users->isEmpty())
        <div class="alert alert-info text-center">No users found.</div>
    @else
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="card-text"><strong>Nome:</strong> {{ $user->name }}</p>
                            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                            <p class="card-text"><strong>Ruolo:</strong> {{ $user->role }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di cancellare questo utente?')">Cancella Utente</button>
                            </form>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Modifica</a>
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