Práctica 1: Git y GitHub
************************
En esta práctica vas a usar Git y GitHub para manejar las versiones de un proyecto ficticio que vas a ir desarrollando en el siguiente paso a paso.

.. important::
    Tienes que ser escrupuloso con los nombres, respetando minúsculas y mayúsculas. Además, sigue el orden, no avances de paso hasta que lo termines.

Paso 1
======
Crea en **GitHub** un repositorio vacío llamado **dwes-tema0-p1**.

Paso 2
======
Crea una carpeta en tu ordenador llamada :file:`dwes-tema0-p1` e inicializa un repositorio en dicha carpeta.

Paso 3
======
Dentro del repositorio que acabas de inicializar, crea un fichero llamado :file:`README.md` con el siguiente contenido::

    # Práctica 1 con Git.
    Cacharreando con esto de Git y GitHub.

Paso 4
======
Ahora realiza las siguientes acciones:

- Prepara el primer *commit* con el mensaje :literal:`Primer commit`,
- establece el nombre de la rama principal para este repositorio a :literal:`main`,
- añade el repositorio remoto y
- publica los cambios en el repositorio remoto (haz un *push*).

Paso 5
======
Crea una carpeta llamada :file:`src` y otra llamada :file:`img`.

Abre un editor de textos para crear un fichero dentro de :file:`src` con el nombre :file:`index.php` y el siguiente contenido:

.. code-block:: php
    :linenos:

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-i">
        <title>Hola Mundo</title>
    </head>
    <body>
        <?php
            echo "¡Hola Mundo!";
        ?>
    </body>
    </html>

Descarga una imagen del Everest en formato :file:`JPEG` desde la Web y guárdala dentro de la carpeta :file:`img` con el nombre :file:`everest.jpg`.

Cuando termines este quinto paso en tu repositorio tendrás creada la siguiente jerarquía:

.. figure:: ./img/jerarquia_practica1.svg
    :width: 30%
    :align: center

Paso 6
======
Añade a tu repositorio los dos ficheros creados en el paso anterior:

- :file:`src/index.php` y
- :file:`img/everest.jpg`.

Paso 7
======
Prepara otro *commit* con el mensaje :literal:`Segundo commit` y haz el *push* al repositorio remoto, es decir, publica tus cambios.
