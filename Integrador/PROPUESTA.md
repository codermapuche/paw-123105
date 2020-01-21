# Trabajo Práctico Integrador

## Entrega #1.1
### Propuesta de TP Integrador

### Idea
Se propone desarrollar un juego de damas online, donde la interface grafica del juego sea responsive e interactiva, permitiendo a los visitantes jugar tanto desde pc como desde telefonos moviles.
HTML5 + CSS3 + Javascript seran las herramientas a utilizar en el frontend para toda la UI del juego, mientras que en el backend, se utilizara PHP para llevar un registro de las partidas en una base de datos Mysql, permitiendo a los visitantes guardar su partida y continuarla posteriormente, incluso guardar en la pc y continuar en el movil.
Cada usuario se identificara mediante una direccion de correo, la cual se utilizara para integrarse con el servicio externo de gravatar y mostrar la imagen asociada a dicho email, en caso de existir.
La IA que juegue contra el usuario sera implementada en Prolog, reutilizando parte del desarrollo que realice para la materia Programacion Funcional y Logica, siendo esta parte tambien de mi autoria.
No se utilizaran librerias de terceros para este proyecto.
Se implementara un nexo entre PHP y Prolog el cual permitira integrar este lenguaje de IA en la web mediante un protocolo de comunicacion entre lenguajes que se desarrollara para tal fin.

### Sitemap
	- Inicio (Pantalla donde se registra el usuario y se vincula con Gravatar)
	- Tablero (Pantalla principal del juego)
	- Ranking (Top 10 de los jugadores que mas partidas ganaron)
		
### Wireframes (carpeta wireframes)
	- Inicio (Pantalla donde se ingresa el email del jugador y se vincula con Gravatar)
	- Tablero (Pantalla interactiva donde se desarrolla el juego)
	- Ranking (Pantalla donde se visualiza las estadisticas de los jugadores)	
				
### Formularios
	- Inicio (este formulario sirve para identificar al usuario actual, dado que solo se contabilizan los triunfos para el ranking no se implementara ningun mecanismo de autenticacion)
	
### Librerias de terceros
	- No se utilizaran librerias de terceros.
		
### Modelos de objetos

Se tendra en el backend dos clases principales, Jugadores y Partidas, cada jugador podra tener multiples partidas vinculadas pero solo puede jugar a la ultima que inicio.

Cada jugador tiene los atributos:
- Id
- Email
- Hash (Gravatar)

Cada partida tiene los atributos:
- Id 
- Jugador
- Finalizada (booleano)
- Ganada (booleano)
- Tablero (estado actual del tablero, serializado como texto)