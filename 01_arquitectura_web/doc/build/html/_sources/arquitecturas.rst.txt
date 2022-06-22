Arquitectura cliente/servidor
#############################
En esta arquitectura las tareas se reparten entre dos actores:

**Cliente**
    Los clientes realizan peticiones y reciben las respuestas con los resultados a dichas peticiones.

    Se encargan de ofrecer una interfaz al usuario, es la parte que maneja el usuario final.

**Servidor**
    Los servidores están a la escucha de las peticiones de los clientes. Cuando reciben una petición entonces realizan una acción y devuelven un resultado.

    Se encarga, pues, de la lógica del sistema.

Cuando hablamos de cliente y de servidor nos estamos refiriendo, de forma general, tanto al software como al hardware.

La arquitectura cliente/servidor no es exclusiva del desarrollo web y es utilizada por multitud de aplicaciones. Algunos ejemplos son:

- Los servicios de nube o almacenamiento de archivos en red.
- El correo electrónico.
- Servicios de impresión en red.
- La Web o WWW (*World Wide Web*).

A los servidores se les suele dar un nombre relacionado con el servicio al que atienden: servidores de archivo, servidores de correo, servidores de impresión o servidores web, en los ejemplos listados arriba.

En el caso que nos ocupa, el desarrollo web, los clientes solicitan que se les sirva una página web para visualizarla. En este contexto, a la solicitud que hacen los clientes se les denomina **petición** (*request*) y a lo que devuelve el servidor se le llama **respuesta** (*response*).

Lo normal es que hayan muchos clientes haciendo peticiones a un servidor, por tanto el servidor tiene que estar preparado para soportar una determinada carga de peticiones que tiene que ser medida cuando se implanta. Cuando un servidor no puede hacerse cargo de todas las peticiones se puede quedar *colgado* y, en este caso, quedar el servicio interrumpido hasta que se solucione el problema (esta es la base de los ataques DDoS o ataques de denegación de servicio: se lanzan gran cantidad de peticiones a un servidor hasta "tirarlo").

.. figure:: ./img/client_server_model.svg
    :width: 100%

    Arquitectura cliente/servidor

.. _la-web:

La Web
======
La *World Wide Web* (WWW), normalmente conocida como **Web**, es una de las plataformas de software dominantes en la actualidad, sino la más. Es un espacio de información donde documentos y otros recursos web pueden ser accedidos a través de Internet utilizando navegadores web.

.. seealso::
    El informático inglés Tim Berners-Lee inventó la Web en 1989 mientras trabajaba en el CERN en Suiza. En 1990 desarrolló los fundamentos de la Web: HTTP, HTML, un navegador web, un servidor y el primero sitio web. [HistoriaWeb]_.

La Web emplea la arquitectura cliente/servidor y el **protocolo HTTP** (o HTTPS) para la comunicación entre estos dos actores: cliente y servidor.

Cliente
-------
Un cliente puede ser, a nivel de **hardware**, un PC, portátil, *smartphone*, o cualquier otro dispositivo. En cuanto al **software**, en el contexto de la Web, normalmente es un navegador web como *Firefox*, *Google Chrome*, *Microsoft Edge*, u otros.

Los navegadores web usan el protocolo HTTP (o HTTPS) para solicitar a un servidor web una página web, que no es más que un documento HTML. Los navegadores web interpretan y renderizan el documento HTML recibido para mostrar el contenido.

.. tip::
    Si quieres ver el contenido, el documento base HTML, de una página web, usa el navegador web para acceder a la página web, haz clic con el botón derecho sobre la página y elige la opción "Ver código fuente", o algo similar, como puedes ver en la captura `Ver código fuente`_.

    .. figure:: ./img/ver_codigo_fuente.png
        :name: Ver código fuente
        :width: 50%
        :align: center

        Captura de pantalla con el menú contextual en Firefox donde seleccionar la opción para ver el código HTML de la página web

Existen otros programas, al margen de los navegadores web, que permiten hacer peticiones a servidores web. Por ejemplo, se tiene el programa *curl* que podemos usar en la *terminal*.

.. tabs::

   .. group-tab:: Petición (*request*)

        .. code-block:: shell
            :caption: Ejemplo de ejecución de curl para obtener la página de noticias del IES La Encantá
            :linenos:

            curl http://www.ieslaencanta.com/web/index.php/noticias

   .. group-tab:: Respuesta (*response*)

        .. code-block:: html
            :caption: Respuesta (se muestran las primeras líneas)
            :linenos:

            <!DOCTYPE HTML>
            <html prefix="og: http://ogp.me/ns#" lang="es-es" dir="ltr"  data-config='{"style":"default","layout":null}'>
            <head>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta charset="utf-8" />
                <base href="http://www.ieslaencanta.com/web/index.php/noticias" />
                <meta name="keywords" content="IES vega baja, rojales, ciclos, informática, electricidad y electrónica, peluquería, estética, ciclo formativo, peluquería, estilismo, bienestar" />
                <meta property="og:url" content="http://www.ieslaencanta.com/web/index.php/noticias" />
                <meta property="og:type" content="website" />
                <meta property="og:title" content="NOTICIAS" />

Las tecnologías que se usan en el lado del cliente son: HTML, CSS y JavaScript.

Servidor
--------
Los servidores web suelen ser, a nivel **hardware**, ordenadores con mayor capacidad de almacenamiento, memoria y procesamiento. Por parte del **software** las opciones se multiplican ya que depende de las tecnologías y lenguajes que se elijan para desarrollar la aplicación web en cuestión: PHP, Java, Python, etc.

En los servidores para aplicaciones web se necesitan, al menos, dos tipos de programas: un servidor web y un servidor de base de datos.

El servidor web es un programa que está a la escucha permanentemente para responder a las peticiones que reciben de los clientes, a través del protocolo HTTP (o HTTPS). Las respuestas de los servidores web con documentos HTML. Ejemplos de servidores web:

**Apache**
    Se trata de uno de los software de servidor web más populares. Se usa con lenguajes como PHP, es software libre y desarrollado por la Fundación Apache.

**nginx**
    Otro de los software para servidores web que se suele emplear con PHP o Python, por ejemplo. También es software libre.

**Tomcat**
    Este software para servidores web se usa con Java. Es desarrollado por Apache y es software libre.

**WebLogic**
    Este es, quizás, el software para servidores más popular para Java. Tiene licencia propietaria y desarrollado por Oracle.

**WildFly**
    Otro software de servidor para Java. Es software libre y desarrollado por Red Hat.

.. figure:: ./img/servidores_logo.png
    :width: 100%

Todas las aplicaciones web necesitan almacenar información, y lo hacen en bases de datos. Algunos de los gestores de bases de datos más populares son:

**Oracle Database**
    Se trata de un sistema gestor de bases de datos de tipo objeto-relacional desarrollado por Oracle. Tiene licencia privativa.

**MySQL**
    Este es un sistema gestor de bases de datos relacional desarrollado por una licencia dual: una licencia software libre y otra licencia comercial por Oracle.

**MariaDB**
    Sistema gestor de bases de datos relacional y se trata de un *fork* de MySQL que se hizo cuando Oracle adquirió MySQL. Se trata de software libre y es desarrollado por la Fundación MariaDB.

**PostgreSQL**
    Sistema gestor de bases de datos relacional orientado a objetos y software libre.

**Microsoft SQL Server**
    Sistema gestor de bases de datos relacional desarrollado por Microsoft y con licencias privativa. Se le suele conocer simplemente como SQL Server.

.. figure:: ./img/servidores_bd_logo.png
    :width: 80%
    :align: center

Protocolo HTTP y documentos HTML
===================================
Como se ha comentado en el apartado :ref:`sobre la Web <la-web>` el protocolo que se utiliza para la comunicación entre cliente y servidor se denomina **HTTP** (y su versión cifrada **HTTPS**).

.. important::
    Hoy en día todos los servidores web deben usar la versión cifrada de HTTP, es decir, HTTPS. La diferencia básica entre ambos protocolos es que con HTTPS las peticiones del cliente y las respuestas de los servidores viajan cifradas, añadiendo cierta seguridad en las comunicaciones Web.

**HTTP** es un acrónimo para *HyperText Transfer Protocol* (protocolo de transfencia de hipertexto). El hipertexto son las páginas web que no son más que ficheros **HTML**, acrónimo para *HyperText Markup Language* (lenguaje de marcas de hipertexto).

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

Más adelante entraré de lleno en el protocolo HTTP.

Front-end, Back-end, Full stack
===============================
Teniendo en cuenta el lado en que se ubican las tecnologías y para qué se utilizan éstas, actualmente se habla de 3 perfiles diferentes en el ámbito del desarrollo web:

**Front-end**
    La gente que trabaja en el front-end se encargan del diseño y de la maquetación de la aplicación web, así como de preocuparse de la correcta presentación en cualquier tipo de dispositivos e incluso del posicionamiento en buscadores.

    Dicho de otro modo, estos profesionales se encargan del desarrollo en el lado del cliente, y vosotros trabajaréis en esta parte en el ḿodulo de *Desarrollo web en entorno cliente*.

    Aquí se emplean 3 tecnologías como son HTML, CSS y Javascript.

**Back-end**
    Se trata del desarrollo en el lado del servidor que estudiaremos en este módulo. Los profesionales que se dedican al desarrollo en este área lo hacen con tecnologías como PHP, JSP (Java) o Python.

    Además, aquí se tiene que instalar y administrar el servidor web y el servidor de la base de datos (a menudo alojados en diferentes servidores).

    En este módulo aprenderás a instalar y montar servidores web y de bases de datos de manera básica para poder programar aplicaciones web y en el módulo *Despliegue de aplicaciones web* profundizarás en este apartado.

**Full stack**
    En este perfil se engloban las dos áreas anteriores. Los profesionales *full stack* se hacen expertos en ambas partes aunque a veces lo mejor es especializarse en *front-end* o *back-end*.

    No obstante, te decantes por el lado por el que te decantes es muy importante conocer ambas áreas y poder participar en cualquiera de los lados.

Resumiendo
==========
El desarrollo web se basa en la arquitectura cliente/servidor donde se usa el protocolo HTTP para que los clientes hagan peticiones (*request*) a los servidores que devuelven respuestas (*response*) en formato HTML.

El desarrollo se divide entre la parte del cliente, el front-end, y la parte del servidor, el back-end.

Citas, notas y bibliografía
===========================
.. [HistoriaWeb]
    Historia de la Web <https://es.wikipedia.org/wiki/World_Wide_Web#Historia>
