<!-- resources/views/personas/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
</head>
<body>
<h2>Lista de Personas</h2>

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

<a href="{{ route('personas.create') }}">Agregar Nueva Persona</a>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($personas as $persona)
            <tr>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->email }}</td>
                <td>{{ $persona->telefono }}</td>
                <td>
                    <a href="{{ route('personas.edit', $persona->id) }}">Editar</a>
                    <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay personas disponibles.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<a href="{{ url('/') }}">Volver</a>
</body>
</html>
