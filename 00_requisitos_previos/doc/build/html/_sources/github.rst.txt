Trabajar con GitHub
********************
A lo largo del curso vamos a usar `GitHub <https://www.github.com>`__ para alojar nuestro repositorio de Git. Así que, si no tienes cuenta en GitHub, regístrate.

GitHub es un servicio de alojamiento de repositorios Git muy utilizado en la actualidad. La versión gratuita te permitirá crear todos los repositorios públicos que desees.

Otros servicios de alojamiento de repositorios Git populares son:

- `GitLab <https://about.gitlab.com/>`__
- `Bitbucket <https://bitbucket.org>`__
- `Codeberg <https://codeberg.org>`__

En esta parte te voy a explicar los pasos que tienes que dar cada vez que tengas que crear un nuevo repositorio/proyecto en GitHub.

Crear un nuevo proyecto
=======================
Vamos a imaginar que queremos crear un proyecto usando como control de versiones **Git** y alojando nuestro proyecto en **GitHub**. El nuevo proyecto se va a llamar :file:`ejemplo` y tan solo va a contener un fichero llamado :file:`nombre.txt` con tu nombre y apellidos como contenido.

Los pasos que tienes que llevar a cabo son los que te explico en los siguientes apartados.

Paso 1: crear proyecto en GitHub
---------------------------------
Tras iniciar sesión con tu cuenta de GitHub, haz clic en el "+" que hay en la barra de arriba a la derecha y selecciona la opción *New repository*:

.. figure:: ./img/github_clic_new_repository.png
    :width: 30%
    :align: center

En el formulario para crear un nuevo repositorio rellena únicamente el *Repository name*, lo demás déjalo como está. Haz clic en el botón *Create repository* y ya tendrás un repositorio nuevo y, de momento, vacío.

.. figure:: ./img/github_crear_repo.svg
    :width: 50%
    :align: center

Paso 2: iniciar un nuevo repositorio local
------------------------------------------
Crea, en algún lugar de tu ordenador, una carpeta llamada :file:`ejemplo`. Entra a esa carpeta y ejecuta el comando:

.. code-block:: console

    $ git init

Paso 3: añade ficheros a este repositorio local
------------------------------------------------------
Ahora crea un fichero de texto llamada :file:`nombre.txt` con tu nombre y apellidos, y guárdalo dentro de la carpeta :file:`ejemplo`.

Hay que añadir el nuevo fichero creado:

.. code-block:: console

    $ git add nombre.txt

Paso 4: primer commit
---------------------
.. code-block:: console

    $ git commit -am "Primer commit"

Paso 5: establece el nombre de tu rama principal
------------------------------------------------
.. code-block:: console

    $ git branch -M main

Paso 6: añade el repositorio remoto
-----------------------------------
.. code-block:: console

    $ git remote add origin git@github.com:rgmf/ejemplo.git

Aquí, el *remote* :command:`git@github.com:rgmf/ejemplo.git` lo tomamos de GitHub:

.. figure:: ./img/github_direccion_repo_ejemplo.png
    :width: 30%
    :align: center

Tras este paso ya tenemos vinculado nuestro repositorio local (en nuestra máquina) con el repositorio remoto (en GitHub).

Paso 7: empuja los cambios al repositorio remoto
------------------------------------------------
.. code-block:: console

    $ git push -u origin main
