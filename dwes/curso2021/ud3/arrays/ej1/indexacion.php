<?php
$array = array(
    "Indexación de los ejercicios mediante un array",
    "Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos",
    "Define un array que permita almacenar y mostrar la siguiente información:" => array("Meses del año", "Tablero para jugar al juego de los barcos", "Nota de los alumnos de 2ºDAW para el módulo DWES", "Verbos irregulares en inglés", "Información sobre continentes, países, capitales y banderas"),
    "Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el precio del menú suponiendo que éste se calcula sumando el precio de cada uno de los platos incluidos y con un descuento del 20%",
    "Dado un array de 20 elementos que consiste en números reales (con coma decimal) y que cada elemento representa la venta del día de un comercio. Calcular el promedio de venta por día utilizando alguna estructura iterativa. Mostrar el resultado por pantalla",
    "Dado un array 10 elementos de números enteros (sin coma decimal), encontrar el máximo y la media de los valores almacenados",
    "Escribir un script que permita generar y almacenar en un array los números de la lotería primitiva"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Indexación de ejercicios</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Indexación de ejercicios.</h2>
    <?php
    foreach ($array as $key => $ejercicio) {
        if (is_numeric($key)) {
            echo "$ejercicio</br>";
        } else {
            echo "$key</br>";
            foreach ($ejercicio as $key2) {
                echo "&nbsp&nbsp&nbsp&nbsp$key2</br>";
            }
        }
    }

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>