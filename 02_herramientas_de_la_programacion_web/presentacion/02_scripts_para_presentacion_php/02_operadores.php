<?php
/*****************************************************************************
 * Los operadores son, básicamente, los mismos que en Java, así como el orden
 * de prioridad de los mismos.
 *
 * En la web oficial se puede ver la prioridad de todos los operadores en
 * php:
 * https://www.php.net/manual/es/language.operators.precedence.php
 *
 * Se pueden dar errores si empleamos tipos incompatibles para un operador.
 * Por ejemplo, sumar un número y un string daría un error.
 ****************************************************************************/

// Vamos a poner el foco en las diferencias con Java. Todo lo demás se puede
// aplicar al igual que en Java.
$a = "hola";
$b = "mundo";

echo $a + $b + "\n"; // esto no funciona en PHP...
echo $a . $b . "\n"; // ... el operador de concatenación para strings es el punto no el +

// Comparación... Tenemos:
// ==  y  ===      igual y estrictamente igual
// !=  y  !==      diferente y estrictamente diferente
var_dump(0 == "0");  // true
var_dump(0 === "0"); // false

// ?? --> este operador devuelve la primera variable que exista y no sea null
echo $noexiste ?? $tampoco ?? $a ?? $b, "\n";  // devuelve "hola" que es el valor de $a, la primera variable que existe y no es null

// No son estrictamente operadores pero pueden ser señalados aquí:
// is_int
// is_float
// is_string
// is_array


/*****************************************************************************
 * Operador de control de errores
 *
 * Se puede anteponer la @ delante de cualquier expresión de manera que se
 * produce un error pase silenciosamente, siga el intérprete para adelante.
 *
 * Se suele usar junto al die para mostrar un mensaje de error "amigable" o
 * hacer algo en su caso.
 ****************************************************************************/
$resultado = @($noexiste1 + $noexiste2) or 0;
var_dump($resultado);

$a = 1;
$b = 2;
$resultado = @($a + $b) or 0;
var_dump($resultado);

// Con die terminamos el programa, se acabó, no puedo seguir si se lanza este error
$resultado = @($noexiste1 + $noexiste2) or die("No puedo seguir, porque hay un error aquí.\n");
