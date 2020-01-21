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
	
	Se lo puede ver en funcionamiento seleccionando la opcion "Alta" del menu del index, o directamente en el link: http://localhost/turno.php?action=alta
	La vista esta en www/view/turno-form.php donde se puede observar la ficha de este punto.
	Las validaciones del servidor se pueden encontrar en www/model/turno.php en el metodo "validate"
	
2. Extienda el ejercicio anterior para que al enviar el formulario mediante el método POST se muestre al usuario un resumen del turno.

	La vista esta en www/view/turno-view.php donde se puede observar la ficha de este punto.
	
3. Realice las modificaciones necesarias para que el script del punto anterior reciba los datos mediante el método GET. ¿Qué diferencia nota? ¿Cuándo es conveniente usar cada método? Consejo: Utilice las herramientas de desarrollador de su Navegador (Pestaña Red) para observar las diferencias entre las diferentes peticiones.
	
	Cuando se envia mediante GET, los datos son visibles en la url, este metodo es conveniente cuando se requiere que el usuario tenga conocimiento rapido de los datos que esta enviando y eventualmente pueda modificarlos, siempre pensando en su uso dentro de una navegador web, aunque por supuesto este no es el unico uso posible del metodo. Generalmente se utiliza para pasar unos pocos datos que identifican al recurso que se solicita ya que la querystring posee una capacidad limitada de datos que puede transportar.
	En el desarrollo del ejercicio, se opto por mantener en la querystring los parametros "action" e "id" con el objetivo de indicar que se esta haciendo y con que, pero enviando por POST todos los datos adicionales.

4. Agregue al formulario un campo que permita adjuntar una imagen, y que la etiqueta del campo sea Diagnóstico. El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La imagen debe almacenarse en un subdirectorio del proyecto y también debe mostrarse al usuario al mostrar el resumen del turno del ejercicio 2. ¿Qué sucede si 2 usuarios cargan imágenes con el mismo nombre de imagen? ¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen con el mismo nombre?
	
	Para evitar que dos usuarios se "pisen" la imagen si tiene el mismo nombre, lo que se hizo fue almacenar la imagen con el id del turno en el nombre, de esta forma, aunque la imagen se suba dos veces, no se pisa la existente y se vincula al turno.
	
5. Utilice las herramientas para desarrollador del navegador y observe cómo fueron codificados por el navegador los datos enviados por el navegador en los dos ejercicios anteriores. ¿Qué diferencia nota?

	Se debio cambiar el mecanismo de codificacion del formulario, ahora los datos se envian utilizando "multipart/form-data"
	
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
	El listado puede verse en: http://localhost/turno.php?action=listado
	Desde alli se pueden editar, agregar o ver turnos.

7. Construya la vista de ficha de turno. Dicha vista debe permitir acceder al turno y mostrar todos sus datos, recuperados del mecanismo de persistencia elaborado en el punto anterior. ¿Cómo se identifica y discrimina un turno de otro? Debe funcionar el link a la ficha que se encuentra en la tabla de turnos. Recuerde agregar un enlace para volver a la tabla de turnos.
	
	Cada turno se identifica mediante un id correlativo y unico el cual se general al dar de alta un turno.
