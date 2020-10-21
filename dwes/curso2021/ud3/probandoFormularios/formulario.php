<?php
// if (isset($_POST["nombre"]) && ($_POST["nombre"] != "") && isset($_POST["apellidos"]) && ($_POST["apellidos"] != "")) {
//     echo $_POST["nombre"];
//     echo "<br>";
//     echo $_POST["apellidos"];
// }

// $nombre = $_POST["nombre"];
// $apellidos = $_POST["apellidos"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        table {
            border: 2px solid black;
            margin-top: 2%;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }

        th,
        td {
            padding: 10px;
        }

        input {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <form action="formulario.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre" value="" /></br>
        <input type="text" name="apellidos" placeholder="Apellidos" value="" /></br>
        <input type="text" name="url" placeholder="Url" value="" /></br>
        <textarea id="w3review" name="w3review" rows="4" cols="30" placeholder="Text Area"></textarea></br>
        <input type="radio" id="male" name="gender" value="hombre">
        <label for="male">Hombre</label></br>
        <input type="radio" id="female" name="gender" value="mujer">
        <label for="female">Mujer</label></br>
        <select id="cars">
            <option value="option1">Opción 1</option>
            <option value="option2">Opción 2</option>
            <option value="option3">Opción 3</option>
        </select></br>
        <input type="checkbox" id="checkbox1" name="checkbox1" value="Checkbox 1">
        <label for="checkbox1"> Checkbox 1</label></br>
        <input type="checkbox" id="checkbox2" name="checkbox2" value="Checkbox 2">
        <label for="checkbox2"> Checkbox 2</label></br>
        <input type="checkbox" id="checkbox3" name="checkbox3" value="Checkbox 3">
        <label for="checkbox3"> Checkbox 3</label></br>
        <select name="cars" id="cars" multiple>
            <option value="multiple1">Multiple 1</option>
            <option value="multiple2">Multiple 2</option>
            <option value="multiple3">Multiple 3</option>
            <option value="multiple4">Multiple 4</option>
        </select>
        </br>
        <input type="submit" name="enviar" value="Enviar" />
    </form>

    <?php
    echo "<div id='codigo'><a href='../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>