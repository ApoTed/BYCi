<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/css/style.css">

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
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">Biblios</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @yield('active_home')" href="{{ route('home') }}">Home</a>
                        </li>
                        @if((isset($_SESSION['logged'])) && ($_SESSION['logged']))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @yield('active_MyLibrary')" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My Library
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if($_SESSION['role'] === 'registered_user')
                                <li><a class="dropdown-item" href="{{ route('book.index') }}">Books List</a></li>
                                <li><a class="dropdown-item" href="{{ route('author.index') }}">Authors List</a></li>
                                @endif
                                @if($_SESSION['role'] === 'admin')
                                <li><a class="dropdown-item" href="{{ route('category.index') }}">Manage categories</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @if(isset($_SESSION['logged']))
                        <li class="nav-item">
                            <span class="navbar-text me-2">Welcome, {{ $_SESSION['loggedName'] }}</span>
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
            <main>
                @yield('body')
            </main>
        </div>

        <footer class="footer bg-light mt-5 py-3 border-top">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <p>Email: <a href="mailto:youremail@example.com">youremail@example.com</a></p>
                    <p>Phone: +123456789</p>
                </div>
                <div>
                    <img src="{{ url('/') }}/img/logoBianco.jpg" alt="Footer Logo" class="img-fluid" style="max-height: 50px;">
                </div>
            </div>
        </footer>
    </body>
</html>
