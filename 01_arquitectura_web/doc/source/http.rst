El protocolo HTTP
#################
El protocolo que se utiliza en la Web para la comunicación entre cliente y servidor se denomina **HTTP** (y su versión cifrada **HTTPS**).

.. important::
    Hoy en día todos los servidores web deben usar la versión cifrada de HTTP, es decir, HTTPS. La diferencia básica entre ambos protocolos es que con HTTPS las peticiones del cliente y las respuestas de los servidores viajan cifradas, añadiendo cierta seguridad en las comunicaciones Web.

**HTTP** es un acrónimo para *HyperText Transfer Protocol* (protocolo de transferencia de hipertexto). El hipertexto son las páginas web que no son más que ficheros **HTML**, acrónimo para *HyperText Markup Language* (lenguaje de marcas de hipertexto). No obstante, en el ámbito de los servicios web, hoy en día, se suele usar el formato **JSON** para responder a las peticiones de los clientes.

.. tabs::

    .. group-tab:: Ejemplo HTML

        .. code-block:: html
            :caption: Ejemplo de página web en HTML

            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Ejemplo de página web</title>
            </head>
            <body>
                <h1>Mi primera página web</h1>
                <p>¡Hola Mundo!</p>
            </body>
            </html>

    .. group-tab:: Ejemplo JSON

        .. code-block:: javascript
            :caption: Ejemplo de fichero en formato JSON con información de temperaturas máximas y mínimas de los primeros tres días de la semana

            [
                "lunes": {
                    "maxima": 32,
                    "minima": 23
                },
                "martes": {
                    "maxima": 30,
                    "minima": 21
                },
                "miércoles": {
                    "maxima": 33,
                    "minima": 22
                }
            ]

Para poder desarrollar aplicaciones web es necesario que, al menos, tengas unas nociones básicas del funcionamiento de este protocolo HTTP.

Características del protocolo HTTP
==================================
Se trata de un protocolo orientado a transacciones que sigue un esquema de petición-respuesta entre un cliente y un servidor. Al cliente que efectúa una petición se le denomina **user agent** y suele ser un navegador web.

La información que se transmite se denomina **recurso** y se la identifica mediante un localizador uniforme de recursos: **URL** (*Uniform Resource Locator*). Como su nombre indica, una URL no es más que una dirección que es dada a un recurso único en la Web (página web, imagen, vídeo, etc).

El protocolo HTTP no tiene estado, esto es, no guarda ninguna información sobre conexiones anteriores. Una conversación en este protocolo habitualmente comienza por una petición del cliente de un determinado recurso al servidor. El servidor, responde sirviendo dicho recurso. Pero no guarda ningún tipo de registro o memoria de qué recursos ha servido y a qué clientes. Si a continuación el mismo cliente vuelve a pedir otro recurso, la respuesta del servidor será idéntica al caso en el que un cliente diferente haya pedido el recurso.

Que el protocolo HTTP sea un protocolo sin estado lo hace altamente escalable pero es, al mismo tiempo, una de sus principales limitaciones que aprenderemos a mitigar cuando desarrollemos aplicaciones web.

URL
===
URL significa *Uniform Resource Locator* (Localizador de Recursos Uniforme). Una URL no es más que una dirección que es dada a un recurso único en la Web. Cada URL válida apunta a un único recurso. Dichos recursos pueden ser páginas HTML, documentos CSS, imágenes, vídeos, etc.

.. note::
    Las URL las escribimos en la barra de direcciones del navegador web, aunque mucha gente hace uso de un buscador como Google o DuckDuckGo para acceder a las páginas web ya que, a veces, es difícil acordarse de estas URL.

Este es el formato de las URL::

    protocolo://maquina:puerto/ruta/al/fichero?variables#anchor

- protocolo

    normalmente será *http* o *https*, y va seguido de.

- ://

    separador entre el protocolo y la máquina.

- maquina

    puede ser una dirección IP o un nombre de dominio.

- :

    separador entre la máquina y el puerto. Solo hay que ponerlo si se especifica el puerto.

- puerto

    número donde escucha el servidor.

    Los servicios tienen un puerto asociado, de esta manera, en un mismo servidor, con una misma IP o nombre de dominio, se puede tener varios servicios instalados y escuchando a peticiones de los clientes.

    Los primeros 1024 números están reservados para el sistema operativo y usados por "protocolos bien conocidos", como por ejemplo:

    - 80: puerto para HTTP (servidor web).
    - 443: puerto para HTTPS (servidor web con cifrado).
    - 21: puerto para FTP (servidor de transferencia de ficheros).
    - 22: puerto para SSH (acceso al shell de un servidor, acceso remoto a un servidor).
    - 25: puerto para SMTP (servidor de envío de e-mails).
    - 587: puerto para SMTP encriptado (servidor de envío de e-mails encriptado).
    - 143: puerto para IMAP (servidor de recepción de e-mails).
    - 993: puerto para IMAP sobre SSL/TLS (servidor de recepción de e-mails a través de un canal cifrado y seguro).

- /ruta/al/fichero

    es un *path* o ruta relativa al recurso en el sistema de archivos del servidor donde se encuentra el sitio web.

- ?

    separador entre la ruta y las variables. Solo se pone si hay variables.

- variables

    parejas clave-valor separadas por el carácter *&*, por ejemplo: "edad=18&nombre=Pepa&apellidos=Marín".

- anchor

    enlace interno a la página.

.. important::
    Sobre las URL tienes que tener presente los siguientes puntos:

    - El puerto es opcional si se emplea al puerto por defecto del protocolo utilizado.
    - No todos los recursos necesitan variables.
    - El anchor solo se pone en casos muy concretos que iremos viendo.

Ejemplos de URL::

    https://www.ieslaencanta.com/web/

    http://www.ieslaencanta.com/web/index.php/noticias

    https://www.debian.org/releases/stable/amd64/index.es.html

Análisis de una URL
-------------------
Dada la siguiente URL::

    http://www.ejemplo.com:80/paginas/datos/miperfil.html?key1=value1&key2=value2#AlgunLugarEnElDocumento

estas serían las partes en que se divide:

- **http** protocolo
- **www.ejemplo.com** dirección o nombre de dominio
- **80** puerto (en este ejemplo no hace falta indicar el puerto ya que estamos usando el puerto por defecto del protocolo http)
- **/paginas/datos/miperfil.html** ruta al fichero (se trata de un fichero HTML)
- **?key1=value1&key2=value2** parámetros que se envían al servidor (como ves son parejas de clave-valor)
- **#AlgunLugarEnElDocumento** *anchor element* interno

Si escribimos esta URL en la barra de direcciones del navegador, accederíamos al **protocolo http** al **puerto 80** de la **máquina www.ejemplo.com**. Dentro de esta máquina debería haber un servidor web sirviendo el contenido de algún directorio de la máquina. Partiendo de ese directorio, el servidor web iría al **directorio "/paginas/datos"** y buscaría el recurso **miperfil.html**.

URL semánticas
--------------
Las **URL semánticas** o **URL amigables** son aquellas URL que son, dentro de lo que cabe, entendibles por el usuario. Lejos de las clásicas URL de las páginas dinámicas llenas de variables y números difíciles de recordar, las URL semánticas están formadas con palabras relacionadas con el contenido de la página y fáciles de recordar.

Te pongo un par de ejemplos para que entiendas la importancia de las URL semánticas frente a las tradicionales.

Aquí te muestro una URL no semántica::

    http://www.miweb.com/index.php?seccion=noticias&id_noticia=133&vista=navegador&tema=claro&map=f4ab3cf4ddff00

Y aquí tienes una URL semántica::

    http://www.miweb.com/noticias/url-semanticas.html

Ambas URL te llevarían al mismo recurso pero la segunda es más fácil de recordar y más *amigable* para el usuario final.

.. note::
    Las URL semánticas son conocidas en inglés y técnicamente como **RESTful URLs**.

.. seealso::
    REST son las siglas del inglés *Representational State Transfer* (Transferencia de Estado Representacional) y no es más que una serie de principios arquitectónicos alrededor de las tecnologías que usan el protocolo HTTP. Si quieres saber más haz clic aquí: [REST]_

Peticiones HTTP
===============
Las peticiones HTTP (**request**) siguen la siguiente sintaxis::

    Método SP URL SP Versión Http CRLF
    (nombre-cabecera: valor-cabecera (, valor-cabecera)*CRLF)*
    Cuerpo del mensaje

Donde:

- Los paréntesis indican que lo que hay dentro es opcional.
- Los asteriscos indican que lo que hay delante de ellos se puede repetir una o más veces.
- **Método** es uno de los métodos (también conocidos como "verbos") del protocolo HTTP e indican la acción a realizar. Los principales "verbos" son:

    **HEAD**: pide al servidor que le envíe una respuesta idéntica a la que enviaría a una petición GET pero sin el cuerpo de la respuesta.

    **GET**: pide al servidor que le envíe un recurso.

    **POST**: envía datos al servidor para que sean procesados por el recurso especificado en la petición. Sirve para crear un recurso en el servidor (como si de un *insert* se tratara).

    **PUT**: envía un recurso determinado al servidor para actualizar un recurso (como si de un *update* se tratara).

    **DELETE**: envía una solicitud para eliminar un recurso (como si de un *delete* se tratara).

- **SP** es un espacio,
- **CRLF** es un retorno de carro, es decir, un *intro*,
- El cuerpo del mensaje suele quedar vacío a excepción de cuando se envía un formulario, se sube un fichero, etc.

Con un ejemplo se entenderá mejor

.. code-block:: http
    :linenos:

    GET /web/ HTTP/1.1
    Host: www.ieslaencanta.com:80
    User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:91.0) Gecko/20100101 Firefox/91.0

Estas peticiones HTTP las hace el navegador web cuando navegamos por Internet.

Para ponerlo en práctica podemos emplear el programa **cURL** de la terminal de GNU/Linux. Te invito a que ejecutes estas dos órdenes y veas el resultado por pantalla:

.. code-block:: shell

    curl -X GET -H "User-Agent: Firefox" -H "Accept: text/html" -v "https://www.ieslaencanta.com" -L

    curl -X GET -H "User-Agent: Firefox" -H "Accept: text/html" -v "https://reqbin.com/echo"

Respuestas HTTP
===============
Las respuestas HTTP que envía el servidor (**response**) a las peticiones de un cliente siguen la siguiente sintaxis::

    Versión-http SP código-estado SP frase-explicación CRLF
    (nombre-cabecera: valor-cabecera (", " valor-cabecera)* CRLF)*
    Cuerpo del mensaje

Donde:

- Los paréntesis indican que lo que hay dentro es opcional.
- Los asteriscos indican que lo que hay delante de ellos se puede repetir una o más veces.
- **Versión-http** indica la versión del protocolo HTTP que está usando el servidor, algo como "HTTP/1.1".
- **código-estado** es un número indicando el estado de la petición. Estos son algunos de los códigos de estado:

    **200** la operación resultó exitosa.
    **302** la operación ha resultado en una redirección exitosa.
    **404** el recurso solicitado no se encuentra en el servidor.
    **500** error interno en el servidor.

- **SP** es un espacio,
- **CRLF** es un retorno de carro, es decir, un *intro*,
- El cuerpo del mensaje es el resultado que envía el servidor: la página web HTML, un documento de estilos CSS, una imagen, etc.

Con un ejemplo se entenderá mejor:

.. code-block:: html
    :caption: Respuesta a la petición **https://reqbin.com/echo**
    :linenos:

    HTTP/3 200 OK
    content-type text/html; charset=utf-8
    access-control-allow-origin *
    <html><head><title>ReqBin Echo</title><meta name="description" content="ReqBin Echo Interface"><meta charset="utf-8"><meta name="viewport" content="width=device-width"><link rel="shortcut icon" href="/static/favicon.ico"><style>body {font-size: 1.5rem;} li {margin: 0.3rem;} </style></head><body> <h1>ReqBin Echo</h1> <p>Simple echo interface for HTTP methods.</p> <ul> <li>https://reqbin.com/echo/get/json</li> <li>https://reqbin.com/echo/post/json</li> <li>https://reqbin.com/echo/head/json</li> <li>https://reqbin.com/echo/get/xml</li> <li>https://reqbin.com/echo/post/xml</li> <li>https://reqbin.com/echo/post/form</li> </ul></body></html>

Páginas web estáticas y dinámicas
=================================
Una página web puede ser estática o dinámica en función de si su contenido se adapta o cambia en función de una serie de variables como el usuario que ha iniciado sesión, la localización del usuario, configuración, etc.

Las páginas web estáticas no cambian y están escritas con tecnologías del lado del cliente: HTML, CSS y JavaScript.

Las páginas web dinámicas son generadas en el servidor con tecnologías como PHP, así pues, cada vez que se solicita una página web que es dinámica su contenido podría ser diferente entre petición y petición.

Profundizar en HTTP request and response
========================================
Si sientes curiosidad y quiere profundizar más sobre peticiones y respuestas puedes hacerlo en la siguiente página web: `REQBIN <https://reqbin.com>`__

Bibliografía y referencias
==========================
`Mozilla Developer. ¿Qués es una URL? <https://developer.mozilla.org/es/docs/Learn/Common_questions/What_is_a_URL>`__

.. [REST] `¿Qué significa y qué es REST? <https://es.wikipedia.org/wiki/Transferencia_de_Estado_Representacional>`__

`Mozilla Developer. Códigos de estado HTTP <https://developer.mozilla.org/es/docs/Web/HTTP/Status>`__

`Wikipedia. Códigos de estado HTTP <https://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_de_estado_HTTP>`__
