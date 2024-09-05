<!-- resources/views/propiedades/edit.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propiedad</title>
</head>
<body>
<h2>Editar Propiedad</h2>
<form action="{{ route('propiedades.update', $propiedad->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="{{ $propiedad->direccion }}" required><br><br>

    <label for="ciudad">Ciudad:</label>
    <input type="text" id="ciudad" name="ciudad" value="{{ $propiedad->ciudad }}" required><br><br>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" value="{{ $propiedad->precio }}" required><br><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required>{{ $propiedad->descripcion }}</textarea><br><br>

    <button type="submit">Actualizar Propiedad</button>
    <a href="{{ route('propiedades.index') }}">Cancelar</a>
</form>
</body>
</html>
