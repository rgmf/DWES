Lab 1: HTTP con Apache
**********************
En este *Lab* vas a aprender a instalar Apache en el sistema operativo Linux, configurar un *Virtual Host* y subir sitios web estáticos que serán servidos por este servidor web. Por último, harás uso de un navegador web y la herramienta *cURL* para realizar peticiones al servidor e interpretar las respuestas.

El objetivo último de este *Lab* es, por tanto, que entiendas cómo funciona un servidor web.

Paso 1: preparar máquina virtual
================================
En este primer paso tienes que importar la máquina virtual en VirtualBox. Se trata de una máquina con la distribución de GNU/Linux Debian 11 (nombre en clave *bullseye*) con los siguientes usuarios creados:

- **Usuario regular**
    nombre de usuario: daw

    contraseña: daw

- **Superusuario (root)**
    nombre de usuario: root

    contraseña: root

Entra siempre con el usuario regular **daw** y cuando necesites realizar alguna acción donde se requiera de permisos de administración entonces cambia a **root**.

.. note::
    El usuario **root** se suele desactivar, para evitar problemas de seguridad, aunque en este *Lab* no lo vamos a hacer.

Paso 2: instalar Apache
=======================
Tras iniciar sesión con el usuario **daw** abre una terminal (puedes usar el atajo :kbd:`Ctrl` + :kbd:`Alt` :kbd:`T`).

.. figure:: ./img/terminal_debian.png
    :width: 60%
    :align: center

    Captura de pantalla de la terminal en Debian

Ejecuta el siguiente comando para cambiar al usuario **root** y llevar a cabo la instalación de Apache:

.. code-block:: console

    $ su

Antes de instalar Apache es importante que actualices el sistema ejecutando estos dos comandos en la terminal:

.. code-block:: console

    # apt update
    # apt upgrade -y

Ya puedes instalar Apache ejecutando el siguiente comando en la terminal:

.. code-block:: console

    # apt install apache2 -y

Paso 3: comprobar estado de Apache
==================================
Apache es un servicio, un programa que arranca cuando se inicia el sistema operativo y queda ejecutándose todo el tiempo a la espera de peticiones por el puerto 80 (por defecto).

Puedes comprobar el estado del servicio, pararlo, iniciarlo, etc, con el comando :command:`systemctl`. Por ejemplo, para ver el estado en que se encuentra el servicio, ejecuta este comando en la terminal con el usuario **root**:

.. code-block:: console

    # systemctl status apache2

Tras ejecutar el comando deberías ver que está activo, como se muestra en la siguiente captura de pantalla:

.. figure:: ./img/estado_apache_ok.png
    :width: 80%
    :align: center

    Estado OK de Apache tras un systemctl status apache2

Paso 4: probar servidor web (con navegador web)
===============================================
Por defecto, Apache, sirve los recursos que hay dentro de la carpeta :file:`/var/www/html`. Una vez instalado Apache verás que dentro de esa carpeta hay una página web llamada :file:`index.html`. Así pues, nada más instalar Apache, este sirve dicha página web.

Para probarlo:

1. Averigua la IP de la máquina virtual Debian,
2. abre el navegador web en la máquina anfitriona (la máquina física), y
3. escribe la IP de la máquina virtual en la barra de direcciones del navegador.

Tras estos tres pasos deberías ver la siguiente página web, que indica que Apache está instalado y listo para funcionar (en mi caso, la máquina virtual tenía la IP 192.168.1.23 como ves en la captura):

.. figure:: ./img/firefox_web_inicial_apache.png
    :width: 80%
    :align: center

    Captura de pantalla con página inicial de Apache

Paso 5: probar servidor web (con cURL)
======================================
Con **cURL** podemos ver el código HTML de la página web :file:`index.html` que está en la carpeta :file:`/var/www/html` ejecutando en la máquina anfitriona el siguiente comando (cambia la IP 192.168.1.23 por la IP de tu máquina virtual):

.. code-block:: console

    $ curl -X GET 192.168.1.23

Paso 6: crear nuevos recursos
=============================
Entra en la carpeta :file:`/var/www/html` como *root* y crea, ahí dentro, la siguiente jerarquía de directorios:

.. figure:: ./img/jerarquia_lab1.svg
    :width: 50%
    :align: center

Una vez creada la jerarquía, lleva a cabo los siguientes pasos:

1. Crea un fichero de texto llamada :file:`nombre.txt` con tu nombre y guárdalo en la carpeta :file:`textos` de la jerarquía creada anteriormente.
2. Escribe una página web en formato HTML y guárdala en la carpeta :file:`web` de la jerarquía con el nombre :file:`pagina.html`. El contenido de la página web es libre, te pongo un ejemplo que puedes usar si quieres:

.. code-block:: html
    :caption: Ejemplo de página web
    :linenos:

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Hola Mundo</title>
    </head>
    <body>
        <h1>Página web</h1>
        <p>¡Hola Mundo!</p>
    </body>
    </html>

3. Descarga una imagen del Everest en formato JPEG y guárdala en la carpeta :file:`img` de la jerarquía con el nombre :file:`everest.jpg`.

Asegúrate que, tras estos pasos, tu servidor web puede servir los siguientes recursos (donde ves la IP tienes que poner la IP de tu máquina virtual, donde está tu servidor web)::

    http://192.168.1.23/recursos/paginas/textos/nombre.txt
    http://192.168.1.23/recursos/paginas/web/pagina.html
    http://192.168.1.23/recursos/img/everest.jpg

Paso 7: cambiar puerto donde escucha Apache
===========================================
Por defecto, Apache escucha las peticiones que llegan al puerto 80 (puerto HTTP por defecto).

Si queremos cambiar el puerto al que escucha nuestro servidor Apache hay que modificar dos ficheros de configuración.

Abre el siguiente fichero de configuración de Apache con nano:

.. code-block:: console

    # nano /etc/apache2/ports.conf

Cambia la línea :literal:`Listen 80` por :literal:`Literal 8585`.

Ahora, abre este otro fichero, donde está el VirtualHost por defecto, con nano:

.. code-block:: console

    # nano /etc/apache2/sites-available/000-default.conf

En la primera línea tienes:

.. code-block:: console

    <VirtualHost *:80>

Cambia ese :literal:`80` por el :literal:`85`.

Cada vez que cambies la configuración de Apache, hay que reiniciar el servicio:

.. code-block:: console

    # systemctl restart apache2

Ahora, si abres el navegador web e intentas acceder al sitio web :literal:`http://192.168.1.23` verás un error porque el servidor web no está escuchando al puerto 80.

Tienes que indicar en la URL el puerto :literal:`8585` tal que así: :literal:`http://192.168.1.23:8585`.
