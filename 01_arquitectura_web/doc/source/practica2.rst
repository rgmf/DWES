Práctica 2: de URL a ruta absoluta
**********************************
Descarga el `siguiente fichero JSON <./_static/practicas/practica2/practica2.json>`__, complétalo y súbelo al repositorio :file:`dwes-tema1` de tu GitHub.

En dicho JSON tienes que traducir las URL a la ruta absoluta del servidor donde está el recurso que se indica en la URL.

El fichero de configuración del *VirtualHost* de Apache es el siguiente:

.. code-block:: linux-config

    <VirtualHost *:80>
        DocumentoRoot /home/daw/web
    </VirtualHost>