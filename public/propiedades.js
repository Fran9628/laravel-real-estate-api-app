$.ajax({
    url: 'http://localhost:8000/api/propiedad',
    method: 'GET',
    success: function(response) {
        console.log(response); // Esto imprimirá la respuesta en la consola del navegador

        var propiedades = response;
        var tablaBody = $('#tablaPropiedades tbody');

        tablaBody.empty();

        // Iteramos sobre las propiedades y agregamos filas a la tabla
        $.each(propiedades, function(index, propiedad) {
            console.log(propiedad); // Verifica la estructura de cada objeto propiedad
            var fila = '<tr>' +
                '<td>' + propiedad.id + '</td>' +
                '<td>' + propiedad.direccion + '</td>' +
                '<td>' + propiedad.ciudad + '</td>' +
                '<td>' + propiedad.precio + '</td>' +
                '<td>' + propiedad.descripcion + '</td>' +
                '</tr>';
            tablaBody.append(fila);
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {
        alert('Error al obtener las propiedades: ' + textStatus);
    }
});