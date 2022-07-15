Evolución de la programación en el lado del servidor
####################################################

Los primeros servidores web ofrecían páginas web estáticas, lo que pronto presentó una serie de limitaciones.

En este apartado os ofrezco una visión histórica que, aunque extremadamente resumida, os puede dar una idea de la evolución de las tecnologías, en cuanto a la programación del lado del servidor.

Common Gateway Interface (:abbr:`CGI (Common Gateway Interface)`)
=================================================================
La primera solución técnica realizada fue la posibilidad de que el servidor web ejecutase programas residentes en la máquina servidor. Esta tecnología, conocida como :literal:`Common Gateway Interface` o :abbr:`CGI (Common Gateway Interface)`, permitía lanzar programas escritos principalmente en :literal:`C` o :literal:`Perl` si bien la tecnología CGI resolvía el problema de la presentación exclusiva de información estática, al mismo tiempo presentaba dos limitaciones importantes:

- El problema de seguridad que podía suponer el hecho de que mediante una petición se pudiesen ejecutar programas indeseados en el servidor.
- La carga del servidor (si una página que lanzaba un programa era llamada desde 100 clientes simultáneamente, el servidor ejecutaba 100 procesos, uno por cada cliente que solicitaba dicha página).

Servlets
========
Para resolver los problemas derivados del uso de :abbr:`CGI (Common Gateway Interface)`, se buscó desarrollar una tecnología que permitiera ejecutar, en un único proceso del servidor, todos los pedidos de ejecución de código sin importar la cantidad de clientes que se conectaban concurrentemente. Así surgieron los denominados :literal:`servlets`, basados en la tecnología Java de Sun Microsystems, y los filtros ISAPI de Microsoft. Estos permitían ejecutar código en un único proceso externo que gestionaba todas las integrado realizadas por el servidor web, impidiendo al mismo tiempo que el servidor web pueda ejecutar programas del sistema operativo.

No obstante, de este modo se limitaron los problemas de prestación y seguridad de la tecnología :abbr:`CGI (Common Gateway Interface)`, y no se resolvió el problema representado por un desarrollo demasiado costoso en términos de tiempo.

Lenguajes embebidos en HTML
===========================
Para resolver las limitaciones de los :literal:`servlets`, fueron desarrollados lenguajes que pueden ser incluidos en los propios ficheros HTML. De aquí surgen dos opciones:

- ASP o PHP, cuyo código es interpretado.
- JSP o ASP.NET, cuyo código es precompilado.

Opción para este curso
======================
En este curso de Desarrollo Web en Entorno Servidor vamos a utilizar PHP, en cuya web puedes encontrar toda la información que necesites: `Página web oficial de PHP <https://www.php.net>`__
