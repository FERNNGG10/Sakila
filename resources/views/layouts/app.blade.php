<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila Admin - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .dropdown-menu {
            max-height: 600px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Sakila Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catálogos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('actors.index') }}">Actores</a></li>
                                <li><a class="dropdown-item" href="{{ route('addresses.index') }}">Direcciones</a></li>
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categorías</a></li>
                                <li><a class="dropdown-item" href="{{ route('cities.index') }}">Ciudades</a></li>
                                <li><a class="dropdown-item" href="{{ route('countries.index') }}">Países</a></li>
                                <li><a class="dropdown-item" href="{{ route('customers.index') }}">Clientes</a></li>
                                <li><a class="dropdown-item" href="{{ route('films.index') }}">Películas</a></li>
                                <li><a class="dropdown-item" href="{{ route('film-actors.index') }}">Actores de Películas</a></li>
                                <li><a class="dropdown-item" href="{{ route('film-categories.index') }}">Categorías de Películas</a></li>
                                <li><a class="dropdown-item" href="{{ route('film-texts.index') }}">Textos de Películas</a></li>
                                <li><a class="dropdown-item" href="{{ route('inventories.index') }}">Inventario</a></li>
                                <li><a class="dropdown-item" href="{{ route('languages.index') }}">Idiomas</a></li>
                                <li><a class="dropdown-item" href="{{ route('payments.index') }}">Pagos</a></li>
                                <li><a class="dropdown-item" href="{{ route('rentals.index') }}">Alquileres</a></li>
                                <li><a class="dropdown-item" href="{{ route('staffs.index') }}">Personal</a></li>
                                <li><a class="dropdown-item" href="{{ route('stores.index') }}">Tiendas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>