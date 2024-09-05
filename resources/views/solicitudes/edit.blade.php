<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Solicitud de Visita</title>
</head>
<body>

<h2>Editar Solicitud de Visita</h2>

<form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="fecha_visita">Fecha de Visita:</label>
    <input type="date" id="fecha_visita" name="fecha_visita" value="{{ $solicitud->fecha_visita }}" required><br><br>

    <label for="">Comentario:</label>
    <textarea id="comentario" name="comentario" required>{{ $solicitud->comentario }}</textarea><br><br>

    <label for="id_propiedad">Propiedad:</label>
    <select id="id_propiedad" name="id_propiedad" required>
        @foreach($propiedades as $propiedad)
            <option value="{{ $propiedad->id }}" {{ $propiedad->id == $solicitud->id_propiedad ? 'selected' : '' }}>
                {{ $propiedad->direccion }}
            </option>
        @endforeach
    </select><br><br>

    <label for="id_persona">Persona:</label>
    <select id="id_persona" name="id_persona" required>
        @foreach($personas as $persona)
            <option value="{{ $persona->id }}" {{ $persona->id == $solicitud->id_persona ? 'selected' : '' }}>
                {{ $persona->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Actualizar Solicitud de Visita</button>
    <a href="{{ route('solicitudes.index') }}">Cancelar</a>
</form>

</body>
</html>
