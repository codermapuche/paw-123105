# Trabajo Práctico Integrador

## Entrega #1
### Propuesta de TP Integrador

### Idea
Se propone desarrollar un diario online para la publicacion de noticias y divulgacion de informacion relacionada con cuestiones de genero, el mismo sera donado a la ONG de un colectivo feminista local con el fin de brindar informacion a la comunidad sobre las actividades locales, las leyes vigentes, la historia del movimiento y al mismo tiempo servir como un canal de consultas y ayuda temprana para aquellas personas que sufran de violencia de genero y necesiten ayuda pero no se animen a concurrir a las autoridades policiales.
Este proyecto servira para integrar los conocimientos adquiridos durante la materia, al mismo tiempo que se realiza un aporte de valor a la comunidad.
Con el objetivo de brindar calidad al proyecto y agilizar tiempos, se propone que el diseño grafico del sitio lo realize un diseñador grafico profesional, el cual se ofrecio a realizar el diseño grafico del logo y de la estetica en general, realizando por mi parte, toda las tareas de maquetacion y programacion.
Esto tambien servira como oportunidad para integrar los conocimientos adquiridos en un entorno de trabajo multidisciplinario, con profesionales de otras areas.

La propuesta incluye la maquetacion y programacion del frontend del sitio creando un sitio responsive, moderno acorde a las tendencias actuales, y una webapp que permita a los usuarios instalarse la app en el celular.

Se contempla la creacion de un backend en PHP para la materia PAW, donde se implementaran todas las caracteristicas necesarias de un CMS para funcionar, tambien se desarrollara el "frontend del backend" (aka webadmin) donde los usuarios autorizados podran administrar el contenido.

### Sitemap
	- Home
		- Noticia
		- Informacion
		- Historia
		- Referentes
		- Politica y Leyes
		
### Wireframes (carpeta wireframes + design)
	- Home (wireframe-home.png / wireframe-home.svg)
		- Noticia (wireframe-noticia.png / wireframe-noticia.svg)
		- Informacion (wireframe-informacion.png / wireframe-informacion.svg)
		- Historia (wireframe-historia.png / wireframe-historia.svg)
		- Referentes (wireframe-referentes.png / wireframe-referentes.svg)
		- Politica y Leyes (wireframe-politica.png / wireframe-politica.svg)
		
### Design carpeta (wireframes + design)
	- Home (diario-feminista-home-01.jpg)
	Las interiores seran derivadas de esta propuesta estetica siguiendo la misma linea.
		
### Formularios
	- Carga de noticias
	- Carga de anunciantes
	- Contacto y consultas
	
### Librerias de terceros
	- No se utilizaran librerias de terceros.
	
### CMS
	- Se propone la creacion de un CMS propio, con el objetivo de brindar una interface mas amigable a usuarios menos experimentados.
	Los contactos se administraran desde GMAIL y desde el backend se podran gestionar las noticias y los anunciantes.
	
### Modelos de objetos del CMS

- Capa Modelo 
	- CMS
		- Auth
			- Usuario (usuarios registrados de la plataforma)
			- Grupo de usuario (perfiles de usuarios, ej: administrador y editor)
			- Secciones (secciones del sitio, ej: noticias, anunciantes, usuarios)
			- Permiso (permisos o privilegios, ej: alta, edicion, borrado)
			- Session (determina los permisos del usuario en la session actual)
		- Webadmin
			- Crud (permite realizar operaciones crud validas segun Auth)
			- Image (permite manipular imagenes en el backend)
		- Data
			- DBAL (permite interactuar con la base de datos)

### Modelos de objetos del diario

- Capa Modelo 
	- Diario
		- Noticias
		- Anunciantes
		- Contacto
		
- Capa Controlador 
	- Diario
		- Noticias
		- Anunciantes
		- Contacto
		
- Capa Vista 
	- Diario
		- Noticias
		- Anunciantes
		- Contacto