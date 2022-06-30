Jerarquía de directorios: rutas absolutas y relativas
*****************************************************
Todos los sistemas operativos abstraen de las complejidades de los sistemas de archivos a los usuarios a través de lo que denominamos **jerarquía de directorios**. Esta jerarquía no es más que un árbol de directorios y ficheros. Para acceder a los directorios y ficheros se usan rutas, y hay dos tipos de rutas: absolutas y relativas.

En la siguiente imagen puedes ver parte de este árbol de directorios en los sistemas GNU/Linux. Como ves, este árbol comienza en una **carpeta raíz** que se llama :file:`/`:

.. figure:: ./img/jerarquialinux_completa.svg
    :width: 100%

    Jerarquía de directorios en GNU/Linux

En Windows, la carpeta raíz de cada sistema de archivo tiene como nombre una letra seguida de dos puntos y una barra. Por ejemplo, el sistema de archivos donde está instalado Windows se llama :file:`C:/`. Si conectas un *pendrive*, la raíz de este *pendrive* será la siguiente letra libre, por ejemplo, :file:`D:/` y así sucesivamente.

.. note::
    Cuando hablamos de sistema de archivos nos referimos a un disco duro, disco sólido, *pendrive*, etc, formateado con algún sistema de archivos como *NTFS*, *FAT32*, *ext4*, etc.

Rutas absolutas
===============
Las rutas absolutas se llaman así porque empiezan por la raíz del sistema de archivos, :file:`/` en GNU/Linux y :file:`C:/` en Windows. A partir, para indicar el camino que se sigue en el árbol hay que ir indicando los nombres de las carpetas separando dichas carpetas con el carácter :kbd:`/`.

Por ejemplo, partiendo de la siguiente estructura de directorios de GNU/Linux:

.. figure:: ./img/jerarquia_para_ejemplos.svg
    :width: 60%
    :align: center

- La ruta absoluta al directorio :file:`Descargas` sería :file:`/home/roman/Descargas`
- La ruta absoluta al directorio :file:`etc` sería :file:`/etc`
- La ruta absoluta al fichero :file:`practica1.odt` sería :file:`/home/roman/Documentos/informatica/practica1.odt`

.. note::
    Las rutas a directorios pueden terminar con :kbd:`/` opcionalmente. Por ejemplo, las dos siguientes rutas son iguales::

        /home/roman/Descargas
        /home/roman/Descargas/

Rutas relativas
===============
Las rutas relativas partes de un lugar determinado. A partir de ahí se indica el camino a seguir por medio del nombre de las carpetas usando el carácter :kbd:`/` como separador, hasta llegar el destino.

Los caminos son hacia abajo en el árbol, pero cuando usamos rutas relativas vamos a necesitar una forma de ir hacia arriba del árbol de directorios y, también, indicar de alguna manera que la ruta es hacia el directorio actual, en el que nos encontramos. Para estos dos casos especiales se tiene dos *comodines* a saber:

- :file:`.` es el comodín que indica el :literal:`directorio actual`, o dicho de otro modo el :literal:`directorio de trabajo`.
- :file:`..` es el comodín que indica el :literal:`directorio padre`.

Por ejemplo, partiendo de la siguiente estructura de directorios de GNU/Linux:

.. figure:: ./img/jerarquia_para_ejemplos.svg
    :width: 60%
    :align: center

- La ruta relativa a la carpeta :file:`Descargas` desde :file:`home` sería :file:`roman/Descargas`
- La ruta relativa a la carpeta :file:`roman` desde :file:`Documentos` sería :file:`..`
- La ruta relativa a la carpeta :file:`home` desde :file:`Imágenes` sería :file:`../..`
- La ruta relativa al fichero :file:`crontab` desde :file:`roman` sería :file:`../../etc/crontab`
