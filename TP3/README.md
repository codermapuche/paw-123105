# Trabajopráctico N° 3
## Persistencia & MVC

### Instalacion & Prueba

En entorno Windows, ejecutar laragon.exe y abrir el navegador en: http://localhost/
Todos los scripts se encuentran en el directorio www

### Consignas

1) Extienda el sistema de gestión de turnos médicos para que los datos sean persistidos sobre una base de datos MySQL usando PDO. La generación del número de turno debe hacerse vía motor de base de datos. ¿Qué cambios hubo que realizar para la generación del id? 
	
	Para lograr persistir los datos en la base de datos, se debio modificar el querybuilder del framework para que el metodo de insercion devuelva el id insertado, esto se logra configurando el campo id de la base de datos como autogenerado.

2) Modifique el sistema para permitir que las imágenes sean persistidas sobre la base de datos. El software debe permitir cargar imágenes de hasta 10 MB. Si la imagen pesa más, se le debe informar al usuario este inconveniente, y pre-cargando el formulario con los datos ingresados, solicitar una nueva imagen.
	
	Para esto se modificaron las directivas del php.ini
	upload_max_filesize = 10M
	post_max_size = 10M
	y se opto por guardar la imagen codificada en base64.
	
	Cuando el archivo exede el tamanio, php detiene la carga abortando el upload y las variables superglobales se encuentran vacias, esto hace que mantener el formulario precargado no es posible utilizando tecnologias html + php unicamente, se requiere de javascript para lograr el efecto solicitado.

3) Implemente Modificación y Baja de los registros del sistema de turnos. 

4) Cada acción del ABM debe ser registrada usando el Logger del framework. Cada log debe ser de tipo INFO y almacenar fecha y hora, operación (ABM), y turno afectado (id). En los casos de modificación y baja, almacene el registro completo. ¿Considera esto util? ¿En que casos puede llegar a utilizarse? 

	Se agrego el llamado al logger en las acciones de ABM solicitadas, esto puede ser util en casos donde se eventualmente se modifica informacion y se desea recuperar un backup o simplemente a modo estadistico, tambien existen herramientas que procesan estos logs masivamente y permiten extraer informacion de los mismos.
	Siempre es util llevar un registro de actividad para poder identificar que es lo que se estaba haciendo en el momento de un eventual fallo.