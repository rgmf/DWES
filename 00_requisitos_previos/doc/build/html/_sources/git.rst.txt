Git
***
Git es un software de **control de versiones** de código abierto y libre, diseñado por `Linus Torvalds <https://es.wikipedia.org/wiki/Linus_Torvalds>`__ quien, también, creó Linux.

Un software de **control de versiones** gestiona los diversos cambios que se realizan en los ficheros fuente de un programa (aunque es extensible a todo tipo de proyectos donde se usen ficheros).

Dicho sistema te permite regresar a versiones anteriores de tus archivos, regresar a una versión anterior del proyecto completo, comparar cambios a lo largo del tiempo, ver quién modificó por última vez algo que pueda estar causando problemas, ver quién introdujo un problema y cuándo, y mucho más. Usar un sistema de control de versiones también significa generalmente que si arruinas o pierdes archivos, será posible recuperarlos fácilmente.

En la página web de Git tienes toda la información y documentación que necesitas: `documentación de Git <http://git-scm.com/doc>`__.

También tienes un libro online oficial de Git: `libro online <http://git-scm.com/book/es/v2>`__

¿Cómo funciona Git?
===================
Los repositorios Git suelen encontrarse en un servidor que los aloja (**repositorio remoto**). A partir de ahí, los desarrolladores, que trabajan en un mismo proyecto, bajan una copia del repositorio a su ordenador (**repositorio local**), hacen los cambios que tengan que hacer en local y los suben al repositorio remoto para que dichos cambios estén disponibles para los demás desarrolladores.

.. important::
    Un repositorio no es más que un carpeta preparada con Git. Dentro de esa carpeta puedes usar todos los comandos de Git.

.. figure:: ./img/git_remoto_local.svg
    :width: 80%
    :align: center

Los tres estados de Git
-----------------------
Así pues, cuando tienes que trabajar en un proyecto lo harás en tu copia local. Esta copia local puede encontrarse en alguno de **los tres estados de Git**, que son:

**Confirmado** (*committed*): los datos están almacenados de forma segura en tu copia local.

**Modificado** (*modified*): significa que has hecho cambios que no están confirmados.

**Preparado** (*staged*): significa que has marcado un archivo modificado en su versión actual para que vaya a tu próxima confirmación.

Ramas
-----
Sin entrar en muchos detalles, en Git puedes crear varias ramas de manera que tendrás una rama principal, normalmente llamada *main*, donde tines los cambios principales y creas otras ramas para ir añadiendo nuevas funcionalidades o que usas para corregir *bugs*, por ejemplo.

Así, si tienes un *bug* que impide a los usuario iniciar sesión correctamente podrías crear una rama llamada, por ejemplo, *bugInicioSesion*, hacer las correcciones necesarias y, cuando esté corregido, mezclas la rama *bugInicioSesion* en la rama *main*.

Primeros pasos con Git: configuración
=====================================
Antes de usar por primera vez Git tienes que personalizar tu entorno:

**Tu identidad**: tienes que establecer tu nombre y tu dirección de correo electrónico:

.. code-block:: console

    $ git config --global user.name "Román Martínez"
    $ git config --global user.email rgmf@riseup.net

**Tu editor**: será el editor que se abra cuando sea necesario:

.. code-block:: console

    $ git config --global core.editor nano

Comandos básicos de Git
=======================

Comenzar un proyecto
---------------------
Puedes obtener o comenzar un proyecto Git de dos maneras:

**Crear un repositorio local**: entra en una carpeta y ejecuta el siguiente comando:

.. code-block:: console

    $ git init

**Clonar un repositorio remoto**: con el siguiente comando obtendrás una copia local de un repositorio remoto:

.. code-block:: console

    $ git clone git@github.com:rgmf/dwes-tema00.git

En ambos casos, en la carpeta del proyecto, se crea un directorio llamado :file:`.git` donde está toda la información que necesita el sistema Git para la gestión de los ficheros del repositorio.

Añadir ficheros nuevos
----------------------
Cuando creas un nuevo fichero en tu repositorio local, tienes que añadirlo al seguimiento de Git. Se usa el comando :command:`git add` indicando, mediante una ruta relativa, el fichero a añadir. Imagina que has creado un fichero llamado :file:`HolaMundo.java` y lo quieres añadir al seguimiento. En este caso tienes que ejecutar el siguiente comando:

.. code-block:: console

    $ git add HolaMundo.java

Eliminar ficheros
-----------------
Se usa el comando :command:`git rm` junto a la ruta relativa al fichero que se quiere sacar del repositorio. Por ejemplo, imagina que quieres eliminar un fichero llamado :file:`HolaMundo.java` que está en la carpeta :file:`fuentes`:

.. code-block:: console

    $ git rm fuentes/HolaMundo.java

Revisar el estado del repositorio local
---------------------------------------
En cualquier momento puedes revisar el estado del repositorio: qué ficheros hay confirmados, los ficheros que hay modificados, los que han sido eliminados, los que se han añadido, etc, con el domando:

.. code-block:: console

    $ git status

Ver el historial
----------------
Se usa el comando siguiente:

.. code-block:: console

    $ git log

Verás todos los commit que se han hecho entre otras cosas.

Confirmar cambios (*commit*)
----------------------------
Una vez quieras confirmar los cambios de tu repositorio local tienes que ejecutar un :command:`git commit`. Cuando hablo de cambios me refiero a modificaciones de ficheros existentes, ficheros nuevos y ficheros borrados. Cada commit se acompaña de un mensaje como ves en el ejemplo siguiente:

.. code-block:: console

    $ git commit -am "Cambios realizados: este es el mensaje de esta confirmación o commit, escribe lo que quieras"

Con la opción :command:`-a` nos ahorramos el paso de tener que hacer el *staged* para los ficheros que se tiene que añadir.

Subir cambios al repositorio remoto
-----------------------------------
Cuando tienes un proyecto que quieres compartir, debes enviarlo a un servidor. El comando para hacerlo es simple: :command:`push [nombre-remoto] [nombre-rama]`. Donde:

- nombre-remoto: suele ser *origin*.
- nombre-rama: la rama donde quieres subirlo.

Por ejemplo, el siguiente *push* lo hace al servidor *origin* y rama *main*:

.. code-block:: console

    $ git push origin main
