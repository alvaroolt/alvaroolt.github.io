<?php
include "Empleado.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1 - Clase Empleado</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
    </style>
</head>

<body>
    <h2>Clase Empleado</h2>
    <?php
    $juan = new Empleado("Juan", 3100);
    // $juan->set_nombre("Juan");
    // $juan->set_sueldo(3100);

    $luis = new Empleado("Luis", 2900);
    // $luis->set_nombre("Luis");
    // $luis->set_sueldo(2900);

    // inicializarEmpleado($juan);
    $juan->inicializarEmpleado();

    // inicializarEmpleado($luis);
    $luis->inicializarEmpleado();

    // compruebaImpuesto($juan);
    $juan->compruebaImpuesto();

    // compruebaImpuesto($luis);
    $luis->compruebaImpuesto();
    ?>
    <?php
    echo "<div id='codigo'><a href='../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>