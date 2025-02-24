<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="{{ url('/') }}/css/style.css">-->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- JavaScript and Plugins -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="{{ url('/') }}/js/bootstrap.min.js"></script>

        <!-- Custom Scripts -->
        <script src="{{ url('/') }}/js/paginationScript.js"></script>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/paginationScript.js') }}"></script>
<div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" style="padding: 0;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BYCI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @yield('active_home')" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('active_eventi')" href="{{ route('evento.index') }}">Eventi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('active_convenzioni')" href="{{ route('convenzioni') }}">Convenzioni</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link @yield('active_macchine')" href="{{ route('macchina.index') }}">Macchine</a>
                        </li>-->
                        @if(isset($_SESSION['logged']) && $_SESSION['logged'] && $_SESSION['role'] === 'admin')
                        <li class="nav-item">
                            <a class="nav-link @yield('active_create')" href="{{ route('evento.create') }}">Crea Evento</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @yield('active_gestisci')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Gestisci Utenti
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @yield('active_gestisciUsers')" href="{{ route('user.create') }}">Crea Utente</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.list') }}">Lista Utenti</a></li>
                        </ul>
                        </li>
                        
                        @endif   
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if(isset($_SESSION['logged']))
                        <li class="nav-item">
                            <span class="navbar-text me-2">Benvenuto, {{ $_SESSION['loggedName'] }}</span>
                            <a class="nav-link d-inline" href="{{ route('user.logout') }}"><i class="bi bi-box-arrow-right"></i></a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}"><i class="bi bi-person-check-fill"></i></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>

        <div class="container mt-4">
            <header class="mb-4">
                <h1>@yield('title')</h1>
            </header>
        <div class="mt-4">
            <main id="page-body">
                @yield('body')
            </main>
            </div>
        </div>

        <footer class="footer text-lg-start bg-light mt-5 py-3 border-top">
            <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <p>Email: <a href="mailto:segreteria@bmwyoungtimerclubitalia.it">segreteria@bmwyoungtimerclubitalia.it</a></p>
                    <p>Phone: +123456789</p>
                </div>
                <div>
                    <a href="https://www.facebook.com/groups/BmwYoungtimerClubItalia?locale=it_IT" target="_blank" class="ms-2">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://www.instagram.com/bmwyoungtimer/" target="_blank" class="ms-2">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
        </footer>
        </div>
    </body>
</html>