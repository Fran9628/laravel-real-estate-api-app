<!-- resources/views/propiedades/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Propiedad</title>
</head>
<body>
<h2>Agregar Nueva Propiedad</h2>
<form action="{{ route('propiedades.store') }}" method="POST">
    @csrf
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required><br><br>

    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" name="ciudad" required><br><br>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" required><br><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea><br><br>

    <button type="submit">Guardar Propiedad</button>
    <a href="{{ route('propiedades.index') }}">Cancelar</a>
</form>
</body>
</html>
