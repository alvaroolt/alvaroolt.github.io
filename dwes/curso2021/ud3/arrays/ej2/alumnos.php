<?php
$alumnos = array("Álvaro", "Javi", "Cristina", "Maria", "Anrtonio", "David", "Rubén", "Rafa", "Jose Luís");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2 - Alumnos aleatorios</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
</head>

<body>
    <h2>Alumnos aleatorios.</h2>
    <?php
    echo "<p>Alumnos almacenados:";
    foreach ($alumnos as $alumno) {
        echo "&nbsp" . $alumno . ";";
    }
    echo "</p>";
    ?>

    <form action="alumnos.php" method="post">
        <input type="submit" name="enviar" value="Alumno aleatorio">
    </form>
    
    <?php
    $alumnoAleatorio = rand(0, count($alumnos) - 1);
    echo $alumnos[$alumnoAleatorio];

    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>