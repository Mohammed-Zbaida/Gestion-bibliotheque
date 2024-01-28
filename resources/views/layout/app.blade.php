<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-beetwen">
        <div class="container">
            <a class="navbar-brand" href="#">Ma Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav justify-content-between ml-auto">
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="{{ url('/livres') }}"><i class="fas fa-book"></i> Livres</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="{{ url('/auteurs') }}"><i class="fas fa-user"></i> Auteurs</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="{{ url('/emprunts') }}"><i class="fas fa-clipboard-list"></i> Emprunts</a>
                    </li>
                    @guest
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> S'inscrire</a>
                    </li>
                    @endguest
                    @auth

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> Bienvenue, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>


                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
