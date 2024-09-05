<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Solicitud de Visita</title>
</head>
<body>

<h2>Eliminar Solicitud de Visita</h2>

<p>¿Estás seguro de que deseas eliminar la solicitud de visita con la siguiente información?</p>

<p><strong>Fecha de Visita:</strong> {{ $solicitud->fecha_visita }}</p>
<p><strong>Comentario:</strong> {{ $solicitud->comentario }}</p>
<p><strong>Propiedad:</strong> {{ $solicitud->propiedad->direccion }}</p>
<p><strong>Persona:</strong> {{ $solicitud->persona->nombre }}</p>

<form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    <a href="{{ route('solicitudes.index') }}">Cancelar</a>
</form>

</body>
</html>
