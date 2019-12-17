# Trabajopráctico N° 4
## Persistencia y  MVC 

### Instalacion & Prueba

En entorno Windows, ejecutar laragon.exe y abrir el navegador en: http://localhost/
Todos los scripts se encuentran en el directorio www

### Consignas

1) Instale el Sistema Gestor de Bases de Datos MySQL y las extensiones necesarias para poder interactuar con la misma desde PHP. Documente brevemente los pasos realizados y como verificó que el driver se instaló correctamente (vía phpinfo y vía un script de prueba).
	
	En este caso, laragon ya provee mysql y sus extensiones habilitadas por defecto, de todas maneras se verifico el php.ini y con la funcion phpinfo que esten habilitadas.
	
2) Genere un objeto que construya y gestione la conexión a la base de datos. El objeto debe permitir vía constructor la provisión de los datos de acceso. Los datos de acceso deben estar en un archivo de configuración específico y fuera del control de versiones. Documentar este mecanismo de forma adecuada.

	Para la gestion de la conexión se utilido la DBAL SwiftTable (https://github.com/codermapuche/PHP-SwifTable/tree/master/MariaDB) una libreria que provee una abstraccion completa del Modelo (en Modelo-Vista-Controlador) y la cual fue desarrollada por el auto de este TP hace tiempo y se encuentra bajo dominio publico.
	
	Dicha libreria, en la linea 34 provee una variable para configurar los datos de conexión:
		$_conn = ["server" => "localhost", "user" => "root", "pass" => "root", "db" => "turnero"]
	Con el objetivo de facilitar las pruebas, se han configurado por defecto los datos de acceso correctos en esta linea y se ha definido a la propiedad como privada.
	A diferencia del punto 2, con el objetivo de poder utilizar phpmyadmin se ha actualizado a la version 7 de PHP

3) Extienda el sistema de gestión de turnos médicos para que los datos sean persistidos sobre una base de datos. La generación del número de turno debe hacerse vía motor de base de datos. ¿Qué cambios hubo que realizar para la generación del id?
	
	El id se genero automaticamente por el motor de bases de datos. Se modifico los metodos de lectura y escritura dentro del modelo para que utilicen la dbal en lugar de un archivo plano.
	
4) Modifique el sistema para permitir que las imágenes sean persistidas sobre la base de datos. El software debe permitir cargar imágenes de hasta 10 MB.

	A pesar que se considera una muy mala idea guardar binarios en la base de datos, se modifico la tabla y se almacenaron en un campo longblob, se mantuvo el macanismo de persistencia en archivos ya que no afectaba a la otra implementacion.
	
5) ¿Qué es un motor de persistencia ORM (Object-Relational Mapping; Mapeo objeto-relacional)? ¿Qué problemática resuelve? Realice una evaluación de cuánto le costaría modificar el código para implementar uno en el sistema de turnos por usted desarrollado. Si para realizar la evaluación necesita elegir un producto particular, aclárelo.
	
	Un ORM es un framework o conjunto de librerias que permiten crear una capa de abstraccion de una base de datos relacional convirtiendo esta en un conjunto de objetos cuyas estructuras son dinamicamente mapeadas a las tablas de la base de datos, permiten crear de forma rapida y en poco tiempo modelos para bases de datos grandes con poco esfuerzo, algunos de los mas complejos, permiten que modificaciones en el modelo impacten de forma automatica en la base de datos, realizando los alter/create table necesarios.
	En general, los ORM solo operan dentro de la capa modelo del mvc, por lo que implementar uno seria relativamente simple puesto que solo se modificaria el modelo.
	En la practica, existen un intermedio entre los ORM y los modelos "manuales", son las llamadas DBAL, se trata de librerias mucho mas simples que ofrecen un conjunto mas acotado de funcionalidades pero que son funcionales en la mayoria de los casos practicos, se han evaluado dbals de frameworks como Symfony, Laravel, Doctrine, proyectos independientes y se ha debatido el tema de forma extensa en varios hilos de foros online.
	En 2013 se publico la primera version de la DBAL (http://www.forosdelweb.com/f18/aporte-clase-para-manejar-base-datos-forma-abstracta-mysqli-1076876/) y gracias a aportes de otros miembros, en 2015 se actualizo y se llego a la version actual, la cual es un producto estable, probado en produccion.
	A menos que un ORM sea estrictamente necesario, una DBAL de menos de 1400 lineas con comentarios como la mencionada, puede servir para la mayoria de los casos.

6) Implemente Modificación y Baja de los registros del sistema de turnos. Dichas acciones deben ser visualmente integradas en la tabla de turnos pedidos realizada en el TP 2.
	
	Se agregaron las opciones de borrado y edicion.