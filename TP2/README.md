# Trabajopráctico N° 2
## Tecnologías del lado del servidor

### Instalacion & Prueba

En entorno Windows, ejecutar laragon.exe y abrir el navegador en: http://localhost/
Todos los scripts se encuentran en el directorio www

### Consignas

1. Elabore una aplicación PHP que ofrezca al usuario un formulario web para la carga de los datos de una persona que solicita turno en el médico. Campos del formulario:
	a. Nombre del paciente (obligatorio)
	b. Email (obligatorio)
	c. Teléfono (obligatorio)
	d. Edad
	e. Talla de calzado (desde 20 a 45 enteros)
	f. Altura (usando la herramienta de deslizador)
	g. Fecha de nacimiento (obligatorio)
	h. Color de pelo (Usando un elemento select con las opciones que usted considere adecuadas)
	i. Fecha del turno (obligatorio)
	j. Horario del turno (Entre las 8:00 hasta las 17:00 con turnos cada 15 minutos)
	k. 2 botones: Enviar y Limpiar.
	Todos los elementos del formulario deben validarse del lado de cliente y servidor, con el formato que mejor se ajuste y permitan HTML y PHP. Además, tomar en cuenta de validar que los datos ingresados se encuentren en los rangos especificados.
	
	Todos los archivos se encuentran en el directorio www.
	
	Es importante validar en ambos lados, ya que la validacion del lado del cliente se hace con fines de mejorar la experiencia del usuario legitimo y detectar errores de forma temprana, mientras que la validacion del lado del servidor se hacen para evitar que usuarios malintencionados que se saltean las validaciones del cliente puedan ingresar datos erroneos o incorrectos.
	
2. Extienda el ejercicio anterior para que al enviar el formulario mediante el método POST se muestre al usuario un resumen del turno.

	Al guardar se muestra el resumen.
	
3. Realice las modificaciones necesarias para que el script del punto anterior reciba los datos mediante el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método? Consejo: Utilice las herramientas de desarrollador de su Navegador (Pestaña Red) para observar las diferencias entre las diferentes peticiones.
	
	Al enviar los formularios por GET los mismos son enviados en la URL en forma de querystring. En el servidor son recibidos mediante $_GET en lugar de $_POST ademas de que el metodo http cambia.
	En general conviene enviar mediante POST, a menos que sea un formulario muy particular, como un buscador por ejemplo donde solo se envien pocos datos clave como una busqueda o un id.
	Los metodos HTTP en total son 6, los idempotentes GET, HEAD, PUT, DELETE y los restantes PATCH y POST.
	Tambien existen otros 3 metodos, CONNECT, OPTIONS y TRACE que cumplen funciones de control.
	Cada metodo http se corresponde semanticamente con una operacion, en particular, deberia utilizarse POST para crear registros nuevos y PUT para actualizarlos.
	Cada metodo tiene sus propias limitaciones en cuanto a volumenes de datos, mientras que GET y HEAD estan limitados por el tamanio de la Querystring, POST, PATCH y PUT envian sus datos en el body del mensaje cuyos limites son mayores.
	En la querystring los datos deben ir codificados en el formato de esta, sin embargo cuando viajan en el payload pueden ir codificados en diferentes formatos segun la conveniencia, ya que los mismos son tratados como un array de bytes.

4. Agregue al formulario un campo que permita adjuntar una imagen, y que la etiqueta del campo sea Diagnóstico. El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La imagen debe almacenarse en un subdirectorio del proyecto y también debe mostrarse al usuario al mostrar el resumen del turno del ejercicio 2. ¿Qué sucede si 2 usuarios cargan imágenes con el mismo nombre de imagen? ¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen con el mismo nombre?
	
	Para evitar que dos usuarios se "pisen" la imagen si tiene el mismo nombre, lo que se hizo fue almacenar la imagen con el id del turno en el nombre, de esta forma, aunque la imagen se suba dos veces, no se pisa la existente y se vincula al turno.
	
5. Utilice las herramientas para desarrollador del navegador y observe cómo fueron codificados por el navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Qué diferencia nota?

	Se debio cambiar el mecanismo de codificacion del formulario, ahora los datos se envian utilizando "multipart/form-data", ya que la misma modifica la forma en la que se codifican los datos binarios, cuando se trata del envio de adjuntos conviene esta codificacion ya que reduce en hasta un 66% la cantidad de bytes necesarios para el envio.
	Si solo son campos de texto, puede utilizarse la otra ya que no habra diferencias significativas.
	
6. Agregar persistencia al sistema de turnos. Todos los datos del formulario deben almacenarse mediante algún mecanismo para poder ser recuperados posteriormente. Crear una nueva vista que le permita a un empleado administrativo visualizar todos los turnos en una tabla. La tabla debe incluir los siguientes campos:
	a. Fecha del turno
	b. Hora del turno
	c. Nombre del paciente
	d. Teléfono
	e. Email
	f. Link a la ficha del turno (la ficha se implementa en el siguiente punto)
	Esta página y la del formulario del punto 2 deben contar con una barra de navegación que permita ir a una u otra pantalla.
	Además, al procesar el formulario en el lado servidor, el sistema asigne un número de turno (que no debe repetirse).
	Para generar el sistema de persistencia, se aconseja estudiar algún mecanismo de serialización de datos.
	¿Cómo relaciona la imagen del turno con los datos del turno? Comente alternativas que evaluó y opción elegida.
	
	Se vinculo la imagen mediante el id correlativo, ademas se contempla que si edita la imagen y sube otra de diferente formato se elimine la anterior.
	Se serializan los datos mediante JSON en un archivo unico, como un gran array de datos.
	Existe la posibilidad de guardar el path completo al archivo, posibilitando usar nombre pseudo-aleatorios para las imagenes, pero esto hace dificil de visualizar los archivos sin el software en cuestion y aumenta la cantidad de datos a almacenar.
	Se evaluo almacenar la imagen en base64, pero esto no solo hace mas lento el procesado, muy grande los archivos sino que requiere de un tratamiento especial para mostrar al navegador.
	Se puede utilizar un sistema de almacenamiento externo, al estilo google drive o servicios similares, en estos casos requiere que el usuario realice una tarea aparte en otra plataforma e ingrese el link publico.
	Se opto por un directorio donde el nombre de la imagen coincida con el id del turno, facilitando su lectura sin sistema y minimizando los datos a almacenar serializados.

7. Construya la vista de ficha de turno. Dicha vista debe permitir acceder al turno y mostrar todos sus datos, recuperados del mecanismo de persistencia elaborado en el punto anterior. ¿Cómo se identifica y discrimina un turno de otro? Debe funcionar el link a la ficha que se encuentra en la tabla de turnos. Recuerde agregar un enlace para volver a la tabla de turnos.
	
	Cada turno se identifica mediante un id correlativo y unico el cual se general al dar de alta un turno.
