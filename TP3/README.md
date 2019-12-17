# Trabajopráctico N° 3

## Diseño Web: Hojas de Estilos

1) ¿Qué significa que los estilos se apliquen en cascada? ¿cómo aplica la herencia de estilos?

	Significa que si dos reglas tienen el mismo peso (grado de especificacion) se aplicara la que aparezca ultima en el codigo.
	Las reglas de menor grado de especificacion se aplican primero y son heredadas por las de mayor grado, quienes sobreecriben atributos.
	
2) ¿Por qué es necesario utilizar un CSS de Reset?
	
	Ademas de implementar sus propios mecanismos de priorizacion de reglas, cada browser implementa su propia hoja de estilos por defecto, que son las reglas que aplica si el usuario no indica nada, un reset css permite partir de una base comun, ya que de lo contrario cada navegador podria mostrar estilos distintos para un mismo conjunto de reglas.
	
3) ¿Qué es el CSS box model?
	
	Cada nodo html se puede considerar una caja, la cual contiene una serie de propiedades: margenes, bordes, padding y contenido.	
	
4) ¿Cuál es el código que hay que insertar en una hoja de estilo para poder usar WebFonts?

```css
@font-face {
  font-family: 'Source Code Pro';
  font-style: normal;
  font-weight: 400;
  src: local('Source Code Pro Regular'), url(https://[...].woff2) format('woff2');
  unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}
```

5) ¿Qué son y para qué sirven los pseudoElementos?

	Los pseudo-elementos se añaden a los selectores y permiten añadir estilos a una parte concreta del documento. Por ejemplo, el pseudoelemento ::first-line selecciona solo la primera línea del elemento especificado por el selector.
	::before y ::after tienen sus propios box model pero no requieren de ninguna etiqueta HTML adicional, aumentando las posibilidades de creacion de estilos mediante css.
		
6) ¿Cómo se calcula la prioridad de una regla CSS? Expresarlo como una fórmula matemática.

	100 * COUNT(Ids) + 10 * [COUNT(Classes) + COUNT(Attributes) + COUNT(Pseudo-Classes)] + 1 * [ COUNT(Elements) + COUNT(Pseudo-Elements) ]

7) ¿Qué es el view port? ¿Cómo se configura? ¿qué problema soluciona?

	El viewport del navegador es el área de la ventana en donde el contenido web está visible. Generalmente no es del mismo tamaño que la página renderizada, en donde se brindan barras de desplazamiento para que el usuario pueda acceder a todo el contenido.

	Dispositivos con pantallas angostas (p.e. móviles) muestran la página en una ventana virtual o viewport, que es usualmente más ancho que la pantalla y la comprimen de manera que pueda verse completa. El usuario podrá recorrerla y hacer zoom para ver diferentes áreas de la página. Por ejemplo, si una pantalla móvil tiene un ancho 640px, las páginas pueden ser procesadas con un viewport de 980px, y después comprimidas para que entren en 640px.

	Esto se hace porque muchas páginas no están optimizadas para dispositivos móviles y se quiebran (o, al menos, se ven mal) cuando son procesadas a un ancho de viewport pequeño. El viewport virtual es una forma de resolver el problema de sitios no optimizados para móviles, logrando que se vean mejor.
	
	Un sitio típico optimizado para móvil contiene algo así:
	<meta name="viewport" content="width=device-width, user-scalable=no">
	La propiedad width controla el tamaño del viewport. Puede definirse con un número en pixeles como  width=600 o con un valor especial device-width que es el equivalente al ancho de la pantalla en píxeles CSS en una escala de 100%. (Existen valores correspondientes de height y device-height, los cuales pueden ser útiles para páginas con elementos que cambian tamaño o posición basadas en la altura del viewport (height).

	La propiedad initial-scale controla el nivel de zoom cuando la página se carga por primera vez. Las propiedades maximum-scale, minimum-scale, y user-scalable controlan la forma en cómo se permite a los usuarios aumentar o disminiuir el zoom en la página.

8) ¿Qué son las media querys? Enumere los distintos tipos de medios y las principales características de cada uno de ellos.

	Las media queries son útiles cuando deseas modificar tu página web o aplicación en función del tipo de dispositivo (como una impresora o una pantalla) o de características y parámetros específicos (como la resolución de la pantalla o el ancho del viewport del navegador).
	
	Los Media Types (tipos de medios) describen la categoría general de un dispositivo. Excepto cuando se utilizan los operadores lógicos not o only, el tipo de medio es opcional y será interpretada como all.

	- all
	Apto para todos los dispositivos.
	- print
	Destinado a material impreso y visualización de documentos en una pantalla en el modo de vista previa de impresión. 
	- screen
	Destinado principalmente a las pantallas.
	- speech
	Destinado a sintetizadores de voz.

9) ¿En qué circunstancias se pueden utilizar las variables css? ¿Qué problemas pueden traer aparejadas? ¿Cuándo consideras que sería bueno utilizarlas?

	Sitios web complejos tienen cantidades muy grandes de CSS, a menudo con una gran cantidad de valores repetidos. Por ejemplo, el mismo color se puede utilizar en cientos de lugares diferentes, que requieren búsqueda global y reemplazar si ese color necesita cambiar. Las variables CSS permiten que un valor se almacene en un lugar y luego se haga referencia en varios otros lugares. Un beneficio adicional son los identificadores semánticos. Por ejemplo --main-text-color es más fácil de entender que #00ff00, especialmente si este mismo color también se utiliza en otro contexto.
	
	El clásico concepto CSS de validez, vinculado a cada propiedad, no es muy útil con respecto a las propiedades personalizadas. Cuando se analizan los valores de las propiedades personalizadas, el explorador no sabe dónde se utilizarán, por lo que debe considerar casi todos los valores como válidos.

	Desafortunadamente, estos valores válidos se pueden usar, a través de la notación funcional var(), en un contexto en el que tal vez no tengan sentido. Propiedades y variables personalizadas pueden llevar a declaraciones CSS no válidas, dando lugar al nuevo concepto de válido en tiempo calculado.
	
	Considero bueno utilizarlas cuando su uso sea inequivoco, implementando un sistema de notación hungara para prevenir su uso incorrecto.	
	
10) CSS Grid Layout ¿Qué es? Explicar las reglas que intervienen en el armado de una grilla. ¿Qué ventajas y desventajas tiene frente a otros Layouts?

	Es una técnica en hojas de estilo en cascada que permite crear diseños de diseño web responsivos complejos de manera más fácil y consistente en todos los navegadores. 
	Esta formado por un elemento padre y uno o varios hijos, puede verse como una tabla, con la particularidad de que las filas y columnas ocupadas por cada elemento son definidos mediante css y no mediante html, con lo cual permite que el layout cambie de forma adaptandose al espacio disponible.
	Comparado con Flexbox este sistema opera en 2 dimensiones mientras que flexbox lo hace en una sola, sirviendo cada uno para fines diferentes.

11) ¿Qué puntos en común y en que se diferencian las Material Design Guidelines de Google y las Human Interface Guidelines de Apple?

	Las aplicaciones móviles nativas para iOS y Android tienen características especiales específicas del sistema operativo. Las directrices de Apple y Google recomiendan utilizar controles de navegación estándar de plataforma siempre que sea posible: controles de página, barras de pestañas, controles segmentados, vistas de tabla, vistas de colección y vistas divididas. Los usuarios están familiarizados con la forma en que estos controles suelen funcionar en cada plataforma, por lo que si se usan los controles estándar, sus usuarios intuitivamente sabrán cómo moverse por su aplicación.
	
	La navegación entre pantallas es una acción común en las aplicaciones móviles. Es muy importante tener en cuenta que iOS y Android tienen diferentes pautas de diseño de aplicaciones nativas cuando se trata de patrones de navegación. Hay una barra de navegación universal en la parte inferior de los dispositivos Android. Usar el botón Atrás en la barra de navegación es una manera fácil de volver a la pantalla o paso anterior, y funciona en casi todas las aplicaciones de Android.
	
	Por otro lado, el enfoque de diseño de Apple es bastante diferente. No hay una barra de navegación global, por lo que no podemos retroceder utilizando un botón de retroceso global en el diseño de la aplicación iOS nativa. Esto afecta el diseño de las aplicaciones móviles de iOS. Las pantallas internas deben tener una barra de navegación nativa con un botón Atrás en la esquina superior izquierda.
	
	Apple también incluye un gesto de deslizar de izquierda a derecha en las aplicaciones para ir a la pantalla anterior. Este gesto funciona en casi todas las aplicaciones.
	La diferencia entre iOS y Android en este caso es que en los dispositivos con iOS en las aplicaciones nativas, el gesto deslizar de izquierda a derecha lo llevará a la pantalla anterior. El mismo gesto en dispositivos Android cambiará pestañas. Pero a diferencia de iOS, hay una barra de navegación inferior en dispositivos Android con el botón Atrás que te devolverá a la pantalla anterior.
	
	Hay algunas opciones de navegación diferentes en las Pautas de Material Design. Un conocido patrón de navegación utilizado en las aplicaciones de Android es una combinación de un cajón de navegación y pestañas.
	
	Un cajón de navegación es un menú que se desliza desde la izquierda o la derecha presionando el ícono de menú de hamburguesas. Las pestañas se encuentran justo debajo del título de la pantalla y permiten la organización del contenido en un nivel alto, lo que permite al usuario cambiar entre las vistas, los conjuntos de datos y los aspectos funcionales de una aplicación.
	
	Fuente: https://medium.muz.li/differences-between-designing-native-ios-apps-and-native-android-apps-e71256dfa1ca?gi=a5c9b3699045

## Programación FrontEnd: Introducción a JavaScript

Nota: En todos los ejercicios se pide que se cumplan los estándares de HTML y CSS. Las hojas de estilo deben ser planteadas pensando las características necesarias para que el ejercicio sea reutilizable y que tenga las condiciones mínimas para una correcta visualización con estilos actuales y funcionales.

1. Implementar una librería que permita insertar un juego tipo Buscaminas en un sitio web.
		Descripción del Juego:
		https://es.wikipedia.org/wiki/Buscaminas#Reglas
		
2. Implementar una librería que permita insertar un juego tipo Tres en Línea (TaTeTi) en un sitio web. El juego debe permitir ingresar los nombres de los 2 jugadores y mantener una tabla con las partidas ganadas por cada uno.
Debe tener varios niveles de dificultad, permitiendo jugar en tableros cuadrados de 3x3 hasta de 6x6, cambiando también la cantidad de fichas en línea que se deben lograr.
	
	El juego se encuentra en la carpeta tateti.
	
3. Implementar una librería que permita insertar un juego tipo Criptograma en un sitio web. Ej juego debe permitir elegir entre varias frases y que se genere al azar
el reemplazo por los criptógrafos. Estos últimos se deben poder elegir entre 3 grupos de elementos (Números, Letras o Dibujos).

	El juego esta en la carpeta criptograma

4. Implementar una librería que reciba como parámetro una estructura JSON con la configuración del test: El título, todas las preguntas con sus respuestas, cuantas preguntas se harán en cada test y el tiempo total que durará el test. La aplicación debe elegir las preguntas al azar, armar el cuestionario y puntuar las respuestas dadas por el usuario una vez que termino de completarlo o se acabó el tiempo estipulado.
```
{
	"titulo": "Título del Test",
	"preguntas": [{
		"pregunta": "Pregunta 1",
		"respuestas": ["respuesta A", "respuesta B", "respuesta C", "respuesta D"],
		"correctas": [0, 3]
	},
	{..}, {..} , … ],
	"cantidadAPreguntar": nPreguntas,
	"tiempoDeTrabajo": xSegundos
}
```

	El test esta en la carpeta test
	
5. Implementar una librería que permita convertir un listado de imágenes en slides (diapositivas) de imágenes de tipo "carrucel". Debe cumplir con las reglas del Diseño Responsivo y deberá contar con diferentes efectos de transición en el pasaje de imágenes (3 como mínimo). Además, se debe mostrar una barra de progreso que muestre el avance (porcentual) de la descarga de las imágenes de tal manera que cuando llegue al 100% empiece a animarse la muestra de imágenes. Las diapositivas deben poder pasarse por thumbs, por botones y presionando las teclas de las flechas.
Solo recibirá como parámetro el contenedor de las imágenes y debe permitir trabajar dentro del contenedor y ocupando todo el viewport redimensionando las imágenes para tal fin.
Pueden utilizar el sitio https://www.jssor.com para sacar algunas ideas interesantes.

	El slider esta en la carpeta slider.

6. Implementar una librería que permita insertar en un sitio web un reproductor de video que administre una lista de reproducción.

	El reproductor esta en la carpeta playlist.