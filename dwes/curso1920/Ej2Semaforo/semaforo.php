<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej2</title>
    <style>
        table {
            background-color: gray;
        }
    </style>
</head>

<body>
    <h2>Semáforo</h2>

    <table>
        <?php
        $colores = array("red", "yellow", "green");

        for ($i = 0; $i < 3; $i++) {
            echo "<tr><td>";
            echo "<svg width='100' height='100'>";
            echo "<circle cx='50' cy='50' r='40' stroke='black' stroke-width='4' fill='$colores[$i]' />";
            echo "</svg>";
            echo "</td></tr>";
        }
        ?>
    </table>
    <?php
    echo "<br/><a href='../verCodigo.php?src=" . __FILE__ . "'><button>Ver Codigo</button></a>";
    ?>

</body>

</html>