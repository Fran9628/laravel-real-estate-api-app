<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Solicitud de Visita</title>
</head>
<body>

<h2>Agregar Solicitud de Visita</h2>

<form action="{{ route('solicitudes.store') }}" method="POST">
    @csrf

    <label for="fecha_visita">Fecha de Visita:</label>
    <input type="date" id="fecha_visita" name="fecha_visita" required><br><br>

    <label for="comentario">Comentario:</label>
    <textarea id="comentario" name="comentario" required></textarea><br><br>

    <label for="id_propiedad">Propiedad:</label>
    <select id="id_propiedad" name="id_propiedad" required>
        @foreach($propiedades as $propiedad)
            <option value="{{ $propiedad->id }}">{{ $propiedad->direccion }}</option>
        @endforeach
    </select><br><br>

    <label for="id_persona">Persona:</label>
    <select id="id_persona" name="id_persona" required>
        @foreach($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Guardar Solicitud de Visita</button>
    <a href="{{ route('solicitudes.index') }}">Cancelar</a>
</form>

</body>
</html>
