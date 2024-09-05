<!-- resources/views/propiedades/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Propiedades</title>
</head>
<body>
<h2>Lista de Propiedades</h2>

@if(session('error'))
    <script>
        window.onload = function() {
            alert('{{ session('error') }}');
        };
    </script>
@endif

@if(session('success'))
    <script>
        window.onload = function() {
            alert('{{ session('success') }}');
        };
    </script>
@endif

<a href="{{ route('propiedades.create') }}" >Agregar Nueva Propiedad</a>

<table border="1">
    <thead>
        <tr>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($propiedades as $propiedad)
            <tr>
                <td>{{ $propiedad->direccion }}</td>
                <td>{{ $propiedad->ciudad }}</td>
                <td>{{ $propiedad->precio }}</td>
                <td>{{ $propiedad->descripcion }}</td>
                <td>
                    <a href="{{ route('propiedades.edit', $propiedad->id) }}">Editar</a>        
                    <form action="{{ route('propiedades.destroy', $propiedad->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay propiedades disponibles.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<a href="{{ url('/') }}">Volver</a>
</body>
</html>
