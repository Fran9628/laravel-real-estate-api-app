<!-- resources/views/personas/edit.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
</head>
<body>

<h2>Editar Persona</h2>

<!-- Muestra mensajes de éxito o error -->
@if(session('success'))
    <script>
        window.onload = function() {
            showAlert('{{ session('success') }}', 'success');
        };
    </script>
@endif

@if(session('error'))
    <script>
        window.onload = function() {
            showAlert('{{ session('error') }}', 'error');
        };
    </script>
@endif

<!-- Formulario para editar persona -->
<form action="{{ route('personas.update', $persona->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Método PUT para actualizaciones -->

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $persona->nombre) }}" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $persona->email) }}" required><br><br>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $persona->telefono) }}" required><br><br>

    <button type="submit">Actualizar Persona</button>
</form>

<a href="{{ route('personas.index') }}">Volver a la Lista</a>

</body>
</html>
