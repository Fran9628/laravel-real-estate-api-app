<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>

<h1>Prueba Técnica la Casa de Juana</h1>

<nav>
    <ul>
        <li><a href="{{ route('propiedades.index') }}">Listar Propiedades</a></li>
        <li><a href="{{ route('personas.index') }}">Listar Personas</a></li>
        <li><a href="{{ route('solicitudes.index') }}">Listar Solicitudes de Visita</a></li>
    </ul>
</nav>

</body>
</html>
