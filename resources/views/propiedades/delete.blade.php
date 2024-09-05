<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Propiedad</title>
</head>
<body>

<h2>Eliminar Propiedad</h2>

<p>¿Estás seguro de que deseas eliminar la propiedad con la siguiente información?</p>

<p><strong>Dirección:</strong> {{ $propiedad->direccion }}</p>
<p><strong>Ciudad:</strong> {{ $propiedad->ciudad }}</p>
<p><strong>Precio:</strong> {{ $propiedad->precio }}</p>
<p><strong>Descripción:</strong> {{ $propiedad->descripcion }}</p>

<form action="{{ route('propiedades.destroy', $propiedad->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    <a href="{{ route('propiedades.index') }}">Cancelar</a>
</form>

</body>
</html>
