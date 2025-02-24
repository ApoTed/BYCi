@extends('layouts.master')

@section('title','Registrazione Utente')
@section('active_gestisci','active')

@section('body')
<script>
    $(document).ready(function(){

        $("#register-form").submit(function(event) {
            event.preventDefault(); // Prevent form submission initially

            // Ottenere i valori dei campi per la registrazione
            var name = $("input[name='name']").val();
            var email = $("input[name='registration-email']").val();
            var password = $("input[name='registration-password']").val();
            var confirmPassword = $("input[name='confirm-password']").val();
            var error = false;

            // Espressione regolare per la password (almeno 8 caratteri, almeno una cifra, almeno un carattere speciale tra ! - * [ ] $ & /)
            var passwordRegex = /^(?=.*[0-9])(?=.*[!-\*\[\]\$&\/]).{8,}$/;

            // Verifica se il campo "confirm-password" è vuoto
            if (confirmPassword.trim() === "") {
                error = true;
                $("#invalid-confirmPassword").text("La re-immissione della password è obbligatoria.");
                $("input[name='confirm-password']").focus();
            } else {
                $("#invalid-confirmPassword").text("");
            } 

            // Verifica se il campo "password" è vuoto
            if (password.trim() === "") {
                error = true;
                $("#invalid-registrationPassword").text("La password è obbligatoria.");
                $("input[name='registration-password']").focus();
            } else if(!passwordRegex.test(password)) {
                error = true;
                $("#invalid-registrationPassword").text("Il formato della password è sbagliato (almeno 8 caratteri, di cui almeno una cifra e un carattere tra ! - * [ ] $ & /).");
                $("input[name='registration-password']").focus();
            } else {
                $("#invalid-registrationPassword").text("");
            } 

            // Verifica se il campo "email" è vuoto
            if (email.trim() === "") {
                error = true;
                $("#invalid-registrationEmail").text("L'indirizzo email è obbligatorio.");
                $("input[name='registration-email']").focus();
            } else {
                $("#invalid-registrationEmail").text("");
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
                    $("input[name='confirm-password']").focus();
                } else {
                    $("#invalid-confirmPassword").text("");

                    // effettua chiamata AJAX per verificare che l'email dell'utente non sia già presente nel DB
                    $.ajax({
                        type: 'GET',
                        url: '/ajaxUser',
                        data: {email: email.trim()},
                        success: function (data) {
                            if (data.found) {
                                $("#invalid-registrationEmail").text("L'email esiste già nel database.");
                            } else {
                                $("#invalid-registrationEmail").text("");
                                $("#register-form")[0].submit(); // Submit the form if email does not exist
                            }
                        }
                    });
                }
            }
        });
    });
</script>
<div class="container-fluid">
    <form id="register-form" action="{{ route('user.register') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Inserisci il nome..."/>
        </div>
        <span class="invalid-input" id="nome non valido"></span>

        <div class="form-group mb-3">
            <input type="text" name="registration-email" class="form-control" placeholder="Inserisci l'email..."/>
        </div>
        <span class="invalid-input" id="Email non valida"></span>

        <div class="form-group mb-3">
            <input type="password" name="registration-password" class="form-control" placeholder="Inserisci la password..."/>
        </div>
        <span class="invalid-input" id="invalid-registrationPassword"></span>

        <div class="form-group mb-3">
            <input type="password" name="confirm-password" class="form-control" placeholder="Inserisci nuovamente la password..."/>
        </div>
        <span class="invalid-input" id="invalid-confirmPassword"></span>

        <div class="form-group text-center mb-3">
            <label for="register-submit" class="btn btn-primary w-100"><i class="bi bi-person-plus"></i> Aggiungi Utente</label>
            <input id="register-submit" class="d-none" type="submit" value="Register">
        </div>
    </form>
</div>
@endsection