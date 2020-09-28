<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej4</title>
    <style>
        tr:nth-child(odd) {
            background-color: lightgray;
        }
    </style>
</head>

<?php
$arrayclubes = array(
    "Bucks" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/Wd6xIEIXpfqg9EZC6PAepQ_48x48.png'>", 53, 12),
    "Raptors" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/745IgW4NSvnRxg-W9oczmQ_48x48.png'>", 46, 18),
    "Celtics" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/GDJBo7eEF8EO5-kDHVpdqw_48x48.png'>", 43, 21),
    "Heat" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/0nQXN6OF7wnLY3hJz8lZJQ_48x48.png'>", 41, 24),
    "Pacers" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/andumiE_wrpDpXvUgqCGYQ_48x48.png'>", 39, 26),
    "76ers" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/US6KILZue2D5766trEf0Mg_48x48.png'>", 39, 26),
    "Nets" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/iishUmO7vbJBE7iK2CZCdw_48x48.png'>", 30, 34),
    "Magic" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/p69oiJ4LDsvCJUDQ3wR9PQ_48x48.png'>", 30, 35),
    "Wizards" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/NBkMJapxft4V5kvufec4Jg_48x48.png'>", 24, 40),
    "Hornets" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/ToeKy5-TrHAnTCl-qhuuHQ_48x48.png'>", 23, 42),
    "Bulls" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/ofjScRGiytT__Flak2j4dg_48x48.png'>", 22, 43),
    "Knicks" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/-rf7eY39l_0V7J4ekakuKA_48x48.png'>", 21, 45),
    "Pistons" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/qvWE2FgBX0MCqFfciFBDiw_48x48.png'>", 20, 46),
    "Hawks" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/pm5l5mtY1elOQAl9ZEcm2A_48x48.png'>", 20, 47),
    "Cavaliers" => array("<img src='//ssl.gstatic.com/onebox/media/sports/logos/NAlGkmv45l1L-3NhwVhDPg_48x48.png'>", 19, 46)
);

$contador = 0;
?>

<body>
    <h2>Tabla de resultados de la NBA</h2>
    <h3>Álvaro Leiva Toledano</h3>
    <table border="1px solid black">
        <?php
        foreach ($arrayclubes as $key => $value) {
            $contador++;
            echo "<tr><td>" . $contador . "</td><td>" . $key . "</td>";
            foreach ($arrayclubes[$key] as $value2) {
                echo "<td>" . $value2 . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    echo "<br/><a href='../verCodigo.php?src=" . __FILE__ . "'><button>Ver Codigo</button></a>";
    ?>
</body>

</html>