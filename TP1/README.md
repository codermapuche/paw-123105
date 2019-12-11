# Trabajopráctico N° 1
## Introducción al maquetado

### Teoria

1. ¿Qué es un lenguaje de marcado? ¿Cuál es su utilidad? ¿Qué es un tag? ¿Qué es un atributo?
	Es una forma de codificar un documento incorporando etiquetas o marcas que contienen información adicional acerca de la estructura del texto o su presentación.
	Su utilidad principal es agregar informacion y metadatos al contenido.
	Un tag es una forma de indicar un metadato, por ejemplo: *<h1>Nombre</h1>* de esta forma, estamos indicando que "Nombre" es un titulo principal.
	Un atributo proporciona informacion adicional al metadato, por ejemplo: *<a href="{url}">Website</a>* de esta forma, estamos indicando que "Website" es un link y con el atributo "href" se especifica a donde hace referencia.
2. ¿Cuál es la utilidad de HTML? ¿Qué conjunto mínimo de tags debe contener un documento elaborado en este lenguaje? Describa brevemente su utilidad.
	HTML Es un conjunto estandar de etiquetas y atributos especialmente pensado para su uso en la web, permite definir un documento de hipertexto que los navegadores son capaces de renderizar.
	La estructura basica es:
	```
	<!DOCTYPE html>
	<html>
		<head>
			<title>...</title>
			...
		</head>
		<body>
			...
		</body>
	</html>
	```
3. ¿Cuál es la utilidad e importancia de los enlaces o links entre páginas? ¿Qué significa hipertexto? ¿Un link solo puede apuntar a otra página? ¿Qué importancia tiene esto último?
	Permiten vincular contenido relacionado, de manera tal que un documento pueda referirse a otros. Un texto que contiene enlaces se lo considera hipertexto, ya que permite relacionar total o parcialmente su contenido con otros hipertextos. Un enlace puede apuntar a otro documento, a un numero telefonico, una direccion de email, un protocolo especifico de aplicacion, entre otras cosas, esto permite enlazar contenidos diferentes que pueden ser combinados, por ejemplo, un sitio web puede tener enlazado una imagen, un archivo o la direccion de correo del autor.
4. ¿Qué es el Rendering Engine de un Browser? ¿Cuál es el que utiliza cada uno de los 5 browsers más conocidos (Chrome, Firefox, Safari, IE-Edge, Opera)? ¿Cuál es la importancia de conocer cada uno de ellos en la construcción de un sitio?
	El motor de renderizado determina como sera mostrado visualmente un documento de hipertexto, distintos motores pueden interpretar diferentes conjuntos de etiquetas o bien proveer comportamientos diferentes para una misma etiqueta, si bien se supone que esto esta estandarizado, en la practica cada motor hace cosas diferentes, si se requiere de una funcionalidad especifica de un motor, entonces se deberan utilizar polyfills para emular la funcionalidad en otros motores.
	Los motores mas comunes son:
	Chromium y derivados: Blink
	Firefox: Quantum
	Safari: WebKit
	IE-Edge: EdgeHTML
	Opera: Blink
	
### Practica

5. La captura se encuentra en el archivo lujan-website.png. 
		El wireframe se encuentra en los archivos lujan-wireframe.svg y lujan-wireframe.png
		El maquetado (solo html) se encuentra en el archivo lujan-wireframe.html
	
6. El maquetado (solo html) se encuentra en el archivo cv-nehuen.html
	
7. El maquetado (solo html) se encuentra en el archivo tabla.html