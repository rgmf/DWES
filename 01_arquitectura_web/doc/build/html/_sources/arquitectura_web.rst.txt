Arquitectura Web
################
La *World Wide Web* (WWW), normalmente conocida como **Web**, es una de las plataformas de software dominantes en la actualidad, sino la que más. Es un espacio de información donde documentos y otros recursos web pueden ser accedidos a través de Internet utilizando navegadores web.

.. seealso::
    El informático inglés Tim Berners-Lee inventó la Web en 1989 mientras trabajaba en el CERN en Suiza. En 1990 desarrolló los fundamentos de la Web: HTTP, HTML, un navegador web, un servidor y el primero sitio web. [HistoriaWeb]_.

El desarrollo web se basa en la **arquitectura cliente/servidor**, donde las tareas se reparten entre dos actores: el cliente y el servidor. Estos dos actores hacen uso de un protocolo para la comunicación: **HTTP**.

.. figure:: ./img/client_server_model.svg
    :width: 100%

    Arquitectura cliente/servidor

El funcionamiento básico de esta arquitectura se resume en los siguientes apartados.

Cliente
=======
- Los clientes realizan peticiones y reciben las respuestas con los resultados a dichas peticiones.
- A estas peticiones se las conoce como **request**.
- Normalmente, las respuestas que reciben son documentos **HTML**, aunque en el caso de servicios web las respuestas son en forma de documentos **XML** o **JSON**.
- Ofrecen una interfaz al usuario, es el programa que maneja el usuario final.
- Las tecnologías que se usan en el lado del cliente son: HTML, CSS y JavaScript.

Normalmente, en la Web, esta interfaz es una navegador web como *Firefox*, *Chrome* o *Edge*, entre otros. Estos clientes son programas instalados en dispositivos de usuario como un PC, portátil o *smartphone*, por ejemplo.

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

Servidor
========
- Los servidores están a la escucha de las peticiones de los clientes. Es como si estuviera dentro de un *bucle infinito* escuchando sin parar.
- Es un programa multitarea porque tiene que ser capaz de recibir peticiones de muchos clientes.
- Cuando reciben una petición entonces realizan una acción y devuelven un resultado.
- Al resultado que devuelve un servidor se le conoce como **response**.
- Esta respuesta suele ser en formato **HTML** pero también puede ser en formato **XML** o **JSON** en el caso de los servicios web.
- Se encarga, pues, de la lógica del sistema.
- Los servidores son programas instalados en equipos que suelen ser más potentes, con más memoria y más capacidad de almacenamiento secundarios que los ordenadores que normalmente usamos los usuarios finales.
- Las tecnologías que se usan en el lado del servidor son, entre otras: PHP, J2EE (Java), .NET o Python.
- También se suelen usar servidores de bases de datos.

Ejemplos de servidores web:

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

Front-end, Back-end, Full stack
===============================
Teniendo en cuenta el lado en que se ubican las tecnologías y para qué se utilizan éstas, actualmente se habla de 3 perfiles diferentes en el ámbito del desarrollo web:

**Front-end**
    La gente que trabaja en el front-end se encargan del diseño y de la maquetación de la aplicación web, así como de preocuparse de la correcta presentación en cualquier tipo de dispositivos e incluso del posicionamiento en buscadores.

    Dicho de otro modo, estos profesionales se encargan del desarrollo en el lado del cliente, y vosotros trabajaréis en esta parte en el módulo de *Desarrollo web en entorno cliente*.

    Aquí se emplean 3 tecnologías como son HTML, CSS y Javascript.

**Back-end**
    Se trata del desarrollo en el lado del servidor que estudiaremos en este módulo. Los profesionales que se dedican al desarrollo en este área lo hacen con tecnologías como PHP, J2EE (Java), .NET o Python.

    Además, aquí se tiene que instalar y administrar el servidor web y el servidor de la base de datos (a menudo alojados en diferentes servidores).

    En este módulo aprenderás a instalar y montar servidores web y de bases de datos de manera básica para poder programar aplicaciones web y en el módulo *Despliegue de aplicaciones web* profundizarás en este apartado.

**Full stack**
    En este perfil se engloban las dos áreas anteriores. Los profesionales *full stack* se hacen expertos en ambas partes aunque a veces lo mejor es especializarse en *front-end* o *back-end*.

    No obstante, te decantes por el lado por el que te decantes es muy importante conocer ambas áreas y poder participar en cualquiera de los lados.

Estandarización y desarrollo de las tecnologías web
===================================================
Aquí tenemos que dividir los estándares en dos grupos:

- Los estándares de Internet.
- Los estándares web.

.. important::
    Hay que diferenciar entre Internet y la Web.

    Internet es una red mundial y, por tanto, consta de cables, *routers*, *switches* y otros equipos de red.

    Sobre esta red que conocemos como Internet (*hardware*) se han desarrollado multitud de servicios (*software*) como son:

    - La Web o WWW.
    - E-mail.
    - Telefonía IP.
    - *Streaming*.
    - Etc.

    Así pues, como ya intuirás, la Web es tan solo una aplicación más que funciona sobre la red Internet.

Estándares de Internet
----------------------
Los estándares de Internet como HTTP, TCP o IP, son desarrollados por el Grupo de Trabajo de Ingeniería de Internet, o **IETF** de sus siglas en inglés *Internet Engineering Task Force*. Este es el organismo que regula las propuestas y los estándares de Internet, conocidos como **RFC** (*Request For Comment*). Así, los estándares los podemos encontrar en estos RFC.

La IETF es una institución sin fines de lucro y abierta a la participación de cualquier persona, cuyo objetivo es velar para que la arquitectura de Internet y los protocolos que la conforman funcionen correctamente. Se la considera como la organización con más autoridad para establecer modificaciones de los parámetros técnicos bajo los que funciona la red. El IETF se compone de técnicos y profesionales en el área de redes, tales como investigadores, integradores, diseñadores de red, administradores, vendedores, entre otros.

.. seealso::
    Algunos de los RFC más importantes son los siguientes: :RFC:`2616` donde se detalla el protocolo HTTP; :RFC:`791` donde se encuentra el protocolo IP; :RFC:`959` donde se describe el protocolo TCP.

Estándares Web
--------------
Las tecnologías web son estandarizadas por un consorcio denominado **W3C** (*World Wide Web Consortium*) [W3C]_. Esto garantiza el crecimiento de la Web a largo plazo. Algunas de las tecnologías web que estandariza este consorcio son: HTML, CSS o JavaScript.

.. tip::
    Puedes encontrar gran cantidad de recursos de aprendizaje en la web **W3C Schools** [W3CSchools]_.

Resumiendo
==========
El desarrollo web se basa en la arquitectura cliente/servidor donde se usa el protocolo HTTP para que los clientes hagan peticiones (*request*) a los servidores que devuelven respuestas (*response*) en formato HTML (para servicios web se emplea el formato XML o JSON).

El desarrollo se divide entre la parte del cliente, el front-end, y la parte del servidor, el back-end.

Citas, notas y bibliografía
===========================
.. [HistoriaWeb]
    Historia de la Web <https://es.wikipedia.org/wiki/World_Wide_Web#Historia>

.. [W3C]
    Página web oficial <https://www.w3.org/>

.. [W3CSchools]
    W3C Schools <https://www.w3schools.com/>