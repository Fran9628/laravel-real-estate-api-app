**Realización del proyecto**

-	Descargar aplicaciones necesarias (Xampp, composer, 7zip, vscode).

-	Crear proyecto laravel:
Luego de realizar las instalaciones se debe abrir el terminal (comando cmd).
Ingresamos al escritorio: cd Desktop y utilizamos el siguiente comando para crear el proyecto: laravel new laravel-real-estate-api-app.
Realizamos la configuración del proyecto.
Ejecutamos el servidor para poder revisar el número de puerto: php artisan serve (localhost:8000).
Procederemos a instalar el api en nuestro proyecto: php artisan install:api.

-	Crear base de datos en PHPmyAdmin de Xampp:
Activamos apache y mysql en Xampp y procedemos a crear una base de datos a la cual llamaremos laravelapidb.
Procedemos a dejar la siguiente información (líneas 23 a 28):
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelapidb
DB_USERNAME=root
DB_PASSWORD=

-	Crear tablas para la base de datos:
I.	Entidad propiedad: php artisan make:migration create_propiedad_table.
II.	Entidad persona: php artisan make:migration create_persona_table.
III.	Entidad Solicitud visita: php artisan make:migration create_solicitud_visita_table.
IV.	Abrimos los archivos e ingresamos la información de los campos para cada tabla.
V.	Procedemos a generar la migración: php artisan migrate.
VI.	Revisamos que se haya cargado todo en la base de datos de PHPmyAdmin.

-	Crear modelo:
I.	Propiedad: php artisan make:model Propiedad.
II.	Persona: php artisan make:model Persona.
III.	Solicitud Visita: php artisan make:model SolicitudVisita.
IV.	Realizamos el registro de los campos y llamados a los otros modelos (en el caso de la solicitud visita).

-	Crear controladores:
I.	Propiedad: php artisan make:controller propiedadController
II.	Persona: php artisan make:controller persona Controller
III.	Solicitud Visita: php artisan make:controller  solicitudVisitaController
IV.	Realizamos dentro de cada uno el CRUD, creando las siguientes funciones:
a.	index: lista las propiedades, personas y visitas.
b.	create: para mostrar formularios de creación para cada entidad.
c.	store: guardar la información que se ingresa en formularios.
d.	edit: para mostrar formularios de actualización para la entidad seleccionada.
e.	update: actualizar/modificar información de la entidad seleccionada.
f.	destroyer: elimina la propiedad, persona y visita que se seleccione.

-	Crear rutas:
1.	Api: Crear la ruta para el CRUD de propiedades, personas y solicitudes.
2.	Web: Crear rutas para la visualización web de los CRUD.


**Instrucciones para ejecutar**
-	Abrir Xampp y activar Apache y MySQL.
-	Crear la base de datos laravelapidb en PHPmyAdmin ingresando en http://localhost/phpmyadmin/.
-	Descargar el proyecto de preferencia mantener el proyecto es el escritorio/Desktop y abrirlo en vscode.
-	Utilizando control+ñ podrá abrir el terminal.
-	En el terminal debe ingresar al proyecto: cd Desktop/laravel-real-state-api-app
-	Realizar el migrate del proyecto utilizando php artisan migrate.
-	Iniciar servidor utilizando php artisan serve.
-	Ingrese a través de google Chrome a http://localhost:8000/propiedades.
--	Ahora puede Navegar y realizar pruebas.
