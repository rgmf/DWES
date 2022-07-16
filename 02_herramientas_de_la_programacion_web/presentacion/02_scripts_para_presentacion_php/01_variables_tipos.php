<?php
/*
 * PHP es un lenguaje "loosly o weakly typed" en el sentido que no hace falta
 * declarar una variable indicando su tipo antes de ser usada.
 *
 * Un nombre de variable válido tiene que empezar por el $ segudio de una
 * letra o un carácter de subrayado (underscore), seguido de cualquier número
 * de letras, números y caracteres de subrayado. Como expresión regular se
 * podría expresar como:
 * '[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*'
 *
 * El tipo depende del valor de la variable.
 *
 * En PHP se tienen cuatro tipos primitivos:
 * - boolean
 * - integer
 * - float (número de punto flotante, también conocido como double)
 * - string
 *
 * Cuatro tipos compuestos:
 * - array
 * - object
 * - callable
 * - iterator
 *
 * Y dos tipos especiales:
 * - resource
 * - NULL
 */

$nombre = "Román"; // esta variable es de tipo string
$nombre = true; // ahora es boolean

var_dump($nombre); // con var_dump() en PHP mostramos el contenido y la información de una variable por pantalla

echo $nombre; // echo se usa para mostrar "cosas" por pantalla, en este caso el contenido de una variable

echo $nombre, "\n"; // al final colocamos un salto de párrafo

$precio = 3.14; // tipo float
$cantidad = 4; // tipo integer

echo "El precio es de ", $precio, " euros", "\n";
echo "El precio es de $precio euros\n"; // ahora entiendes lo del $, verdad? Sirve para esto... facilita mostrar cadenas con valores de variables.

var_dump($noexiste);  // estamos mostrando la información de una variable que no ha sido creada... Da NULL
echo $noexiste, "\n"; // estamos mostrando el contenido de una variable que no ha sido creada... Da error



/***********************************************************
 * Hay que llevar cuidado con cosas como esta.
 **********************************************************/
$i = 3;
$j = 5;

$i = "hola";

$suma = $i + $j; // petada porque $i es un string y $j es un número



/***********************************************************
 * Copia por valor y copia por referencia.
 **********************************************************/
// Copia por valor...
$foo = 25;
$bar = $foo;

$foo = 10;

echo $foo, "\n";
echo $bar, "\n";

// Copia por referencia... (apuntan a la misma posición de memoria)
$foo = 25;
$bar = &$foo;

$foo = 10;

echo $foo, "\n";
echo $bar, "\n";


/*****************************************************
 * Constantes en PHP: se puede usar el define o const
 ****************************************************/
define("PI", 3.14);
const HOLA = "Hola";

echo PI, "\n";
echo HOLA, "\n";