@extends('layouts.master')

@section('title', 'Modifica Utente')

@section('active_gestisci','active')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{  route('user.list') }}">Gestisci Utenti</a></li>
<li class="breadcrumb-item active" aria-current="page">Modifica Utente  </li>
@endsection

@section('body')
<script>
    $(document).ready(function(){

        $("#modify-form").submit(function(event) {
            event.preventDefault(); // Prevent form submission initially

            // Ottenere i valori dei campi per la modifica
            var name = $("input[name='name']").val();
            var password = $("input[name='password']").val();
            var confirmPassword = $("input[name='password_confirmation']").val();
            var error = false;

            // Espressione regolare per la password (almeno 8 caratteri, almeno una cifra, almeno un carattere speciale tra ! - * [ ] $ & /)
            var passwordRegex = /^(?=.*[0-9])(?=.*[!-\*\[\]\$&\/]).{8,}$/;

            // Verifica se il campo "confirm-password" è vuoto
            if (confirmPassword.trim() === "") {
                error = true;
                $("#invalid-confirmPassword").text("La re-immissione della password è obbligatoria.");
                $("input[name='password_confirmation']").focus();
            } else {
                $("#invalid-confirmPassword").text("");
            } 

            // Verifica se il campo "password" è vuoto
            if (password.trim() === "") {
                error = true;
                $("#invalid-password").text("La password è obbligatoria.");
                $("input[name='password']").focus();
            } else if(!passwordRegex.test(password)) {
                error = true;
                $("#invalid-password").text("Il formato della password è sbagliato (almeno 8 caratteri, di cui almeno una cifra e un carattere tra ! - * [ ] $ & /).");
                $("input[name='password']").focus();
            } else {
                $("#invalid-password").text("");
            } 

            // Verifica se il campo "name" è vuoto
            if (name.trim() === "") {
                error = true;
                $("#invalid-name").text("Il nome è obbligatorio.");
                $("input[name='name']").focus();
            } else {
                $("#invalid-name").text("");
            } 

            if(!error) {
                // Verifica che la password sia stata editata due volte correttamente
                if(confirmPassword.trim() !== password.trim()) {
                    $("#invalid-confirmPassword").text("Immettere la stessa password due volte.");
                    $("input[name='password_confirmation']").focus();
                } else {
                    $("#invalid-confirmPassword").text("");
                    console.log("Form is valid. Submitting...");
                    $("#modify-form")[0].submit(); // Submit the form if no errors
                }
            } else {
                console.log("Form has errors. Not submitting.");
            }
        });
    });
</script>
<div class="container mt-4">
    <form id="modify-form" action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            <span class="invalid-input" id="invalid-name"></span>
        </div>
        <div class="form-group">
            <label for="password">Nuova Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <span class="invalid-input" id="invalid-password"></span>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Conferma Nuova Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <span class="invalid-input" id="invalid-confirmPassword"></span>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>
    </form>
</div>
@endsection