<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIDECU v1.0</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">

        <h4>SIDECU v1.0</h4>
        <hr>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="{{ route('direcciones.create') }}" class="nav-link text-white">
                    + Crear Dirección
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('direcciones.listar') }}" class="nav-link text-white">
                    📋 Listar Direcciones
                </a>
            </li>

        </ul>

    </div>

    <!-- CONTENIDO -->
    <div class="flex-grow-1 p-4">

        @yield('content')

    </div>

</div>

</body>
</html>