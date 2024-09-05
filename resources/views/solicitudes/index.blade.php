<!-- resources/views/solicitudes/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes de Visita</title>
</head>
<body>

<h2>Lista de Solicitudes de Visita</h2>

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

<a href="{{ route('solicitudes.create') }}">Agregar Nueva Solicitud de Visita</a>

<table border="1">
    <thead>
        <tr>
            <th>Fecha de Visita</th>
            <th>Comentario</th>
            <th>Propiedad</th>
            <th>Persona</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->fecha_visita }}</td>
                <td>{{ $solicitud->comentario }}</td>
                <td>{{ $solicitud->propiedad ? $solicitud->propiedad->direccion : 'No disponible' }}</td>
                <td>{{ $solicitud->persona ? $solicitud->persona->nombre : 'No disponible' }}</td>
                <td>
                    <a href="{{ route('solicitudes.edit', $solicitud->id) }}">Editar</a>
                    <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay solicitudes de visita registradas.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ url('/') }}">Volver</a>

</body>
</html>
