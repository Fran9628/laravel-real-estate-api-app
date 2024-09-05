<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Persona</title>
</head>
<body>

<h2>Eliminar Persona</h2>

<p>¿Estás seguro de que deseas eliminar la persona con la siguiente información?</p>

<p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
<p><strong>Email:</strong> {{ $persona->email }}</p>
<p><strong>Teléfono:</strong> {{ $persona->telefono }}</p>

<form action="{{ route('personas.destroy', $persona->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    <a href="{{ route('personas.index') }}">Cancelar</a>
</form>

</body>
</html>
