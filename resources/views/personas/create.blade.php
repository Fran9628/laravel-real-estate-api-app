<!-- resources/views/personas/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Persona</title>
</head>
<body>
<h2>Agregar Nueva Persona</h2>
<form action="{{ route('personas.store') }}" method="POST">
    @csrf
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" required><br><br>

    <button type="submit">Guardar Persona</button>
    <a href="{{ route('personas.index') }}">Cancelar</a>
</form>
</body>
</html>
