<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej1</title>
    <style>
        tr:nth-child(odd) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h2>Tabla de multiplicar</h2>
    <table border="1px solid black">
        <?php
        for ($i = 1; $i < 11; $i++) {
            echo "<tr><td> Tabla del " . $i . "</td>";
            for ($x = 1; $x < 11; $x++) {
                echo "<td>" . $x * $i . "</td>";
            }
            echo "</tr>";
        }
        echo "<br/><a href='../verCodigo.php?src=" . __FILE__ . "'><button>Ver Codigo</button></a>";
        ?>
    </table>
</body>

</html>