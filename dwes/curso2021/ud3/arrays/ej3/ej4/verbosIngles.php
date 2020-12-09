<?php
session_start();

$arrayTareaVerbos;
$tablaVerbos = "<table><tr><th colspan='4'>Verbos irregulares - inglés</th></tr>";
$tablaTarea = "<form action='verbosIngles.php' method='post'><table><tr><th colspan='4'>Tarea - Verbos irregulares</th></tr>";

if (!isset($_SESSION["verbosIrregulares"])) {
    $_SESSION["verbosIrregulares"] = array(
        "ser, estar" => array("be", "was/were", "been"),
        "convertirse en, hacerse" => array("become", "became", "become"),
        "empezar, comenzar" => array("begin", "began", "begun"),
        "morder" => array("bite", "bit", "bitten"),
        "soplar" => array("blow", "blew", "blown"),
        "romper" => array("break", "broke", "broken"),
        "llevar, traer" => array("bring", "brought", "brought"),
        "construir" => array("build", "built", "built"),
        "comprar" => array("buy", "bought", "bought"),
        "poder" => array("can", "could", "been able"),
        "coger, atrapar, tomar" => array("catch", "caught", "caught"),
        "elegir, escoger" => array("choose", "chose", "chosen"),
        "venir" => array("come", "came", "come"),
        "costar" => array("cost", "cost", "cost"),
        "cortar" => array("cut", "cut", "cut"),
        "hacer" => array("do", "did", "done"),
        "dibujar" => array("draw", "drew", "drawn"),
        "beber" => array("drink", "drank", "drunk"),
        "conducir" => array("drive", "drove", "driven"),
        "comer" => array("eat", "ate", "eaten"),
        "caer" => array("fall", "fell", "fallen"),
        "sentir" => array("feel", "felt", "felt"),
        "pelear, luchar" => array("fight", "fought", "fought"),
        "encontrar" => array("find", "found", "found"),
        "volar" => array("fly", "flew", "flown"),
        "olvidar" => array("forget", "forgot", "forgotten"),
        "perdonar" => array("forgive", "forgave", "forgiven"),
        "congelar(se)" => array("freeze", "froze", "frozen"),
        "obtener" => array("get", "got", "got"),
        "dar" => array("give", "gave", "given"),
        "ir" => array("go", "went", "gone"),
        "crecer" => array("grow", "grew", "grown"),
        "colgar" => array("hang", "hung", "hung"),
        "tener" => array("have", "had", "had"),
        "oír" => array("hear", "heard", "heard"),
        "esconder(se)" => array("hide", "hid", "hidden"),
        "golpear" => array("hit", "hit", "hit"),
        "sostener" => array("hold", "held", "held"),
        "herir" => array("hurt", "hurt", "hurt"),
        "mantener" => array("keep", "kept", "kept"),
        "saber/conocer" => array("know", "knew", "known"),
        "poner/colocar" => array("lay", "laid", "laid"),
        "dirigir" => array("lead", "led", "led"),
        "salir" => array("leave", "left", "left"),
        "prestar" => array("lend", "lent", "lent"),
        "dejar" => array("let", "let", "let"),
        "mentir" => array("lie", "lay", "lain"),
        "iluminar" => array("light", "lit", "lit"),
        "perder" => array("lose", "lost", "lost"),
        "hacer/fabricar" => array("make", "made", "made"),
        "significar/querer decir" => array("mean", "meant", "meant"),
        "conocer" => array("meet", "met", "met"),
        "pagar" => array("pay", "paid", "paid"),
        "poner" => array("put", "put", "put"),
        "leer" => array("read", "read", "read"),
        "montar" => array("ride", "rode", "ridden"),
        "sonar/llamar" => array("ring", "rang", "rung"),
        "subir/alzarse" => array("rise", "rose", "risen"),
        "correr" => array("run", "ran", "run"),
        "decir" => array("say", "said", "said"),
        "ver" => array("see", "saw", "seen"),
        "buscar" => array("seek", "sought", "sought"),
        "vender" => array("sell", "sold", "sold"),
        "enviar" => array("send", "sent", "sent"),
        "establecer" => array("set", "set", "set"),
        "coser" => array("sew", "sewed", "swen/sewed"),
        "agitar" => array("shake", "shook", "shaken"),
        "brillar" => array("shine", "shone", "shone"),
        "disparar" => array("shoot", "shot", "shot"),
        "mostrar" => array("show", "showed", "shown/showed"),
        "encoger" => array("shrink", "shrank", "shrunk"),
        "encerrar" => array("shut", "shut", "shut"),
        "cantar" => array("sing", "sang", "sung"),
        "hundir(se)" => array("sink", "sank", "sunk"),
        "sentar(se)" => array("sit", "sat", "sat"),
        "dormir" => array("sleep", "slept", "slept"),
        "oler" => array("smell", "smelt", "smelt"),
        "hablar" => array("speak", "spoke", "spoken"),
        "gastar(se)" => array("spend", "spent", "spent"),
        "propagar" => array("spread", "spread", "spread"),
        "estar de pie/aguantar" => array("stand", "stood", "stood"),
        "robar" => array("steal", "stole", "stolen"),
        "pegar(se)/adherir(se)" => array("stick", "stuck", "stuck"),
        "golpear/atacar" => array("strike", "struck", "struck"),
        "nadar" => array("swim", "swam", "swum"),
        "balancear(se)" => array("swing", "swung", "swung"),
        "coger/tomar" => array("take", "took", "taken"),
        "enseñar" => array("teach", "taught", "taught"),
        "arrancar/partir" => array("tear", "tore", "torn"),
        "contar" => array("tell", "told", "told"),
        "pensar" => array("think", "thought", "thought"),
        "lanzar" => array("throw", "threw", "thrown"),
        "entender" => array("understand", "understood", "understood"),
        "despertar" => array("wake", "woke", "woken"),
        "llevar puesto" => array("wear", "wore", "worn"),
        "ganar" => array("win", "won", "won"),
        "escribir" => array("write", "wrote", "written")
    );
}

if (!isset($_SESSION["arrayTareaVerbos"])) {
    // recoge x cantidad de verbos en español  y se convierte en array
    $_SESSION["arrayTareaVerbos"] = array_rand($_SESSION["verbosIrregulares"], 2);

    //recoge UN verbo en inglés
    // $_SESSION["arrayTareaVerbos"] = $_SESSION["verbosIrregulares"][array_rand($_SESSION["verbosIrregulares"])][array_rand($_SESSION["verbosIrregulares"][array_rand($_SESSION["verbosIrregulares"])])];
}

function mostrarTablaVerbosIrregulares($tabla)
{
    if (!empty($_SESSION["verbosIrregulares"])) {
        foreach ($_SESSION["verbosIrregulares"] as $verboEspañol => $verbo) {
            $tabla .= "<tr><td>$verboEspañol</td>";
            foreach ($verbo as $modulo => $nota) {
                $tabla .= "<td>$nota</td>";
            }
            $tabla .= "</tr>";
        }

        $tabla .= "</table>";
        echo $tabla;
    }
}

function mostrarTablaTarea($tabla)
{
    if (!empty($_SESSION["arrayTareaVerbos"])) {
        $contador = 1;
        foreach ($_SESSION["arrayTareaVerbos"] as $verboEspañol) {
            $tabla .= "<tr><td>$verboEspañol</td><td><input type='text' name='opcion$contador-1' id='opcion$contador-1'></td><td><input type='text' name='opcion$contador-2' id='opcion$contador-2'></td><td><input type='text' name='opcion$contador-3' id='opcion$contador-3'></td></tr>";
            $contador++;
        }

        $tabla .= "<tr><td colspan='4'><input type='submit' name='aceptar' id='aceptar' value='Aceptar'></td></tr></table></form>";
        echo $tabla;
    }
}

function comprobarAciertos()
{
    // print_r($_SESSION["arrayTareaVerbos"]);
    // echo $_SESSION["arrayTareaVerbos"][0];
    foreach ($_SESSION["arrayTareaVerbos"] as $verboEspañol) {
        // for ($i = 1; $i <= 2; $i++) {
            array_push($_SESSION["arrayTareaVerbos"][$verboEspañol], array());
            for ($j = 1; $j <= 3; $j++) {
                array_push($_SESSION["arrayTareaVerbos"][$verboEspañol], $_POST["opcion$i-$j"]);
            }
        // }
    }
    
    print_r($_SESSION["arrayTareaVerbos"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3-4 - Verbos irregulares inglés</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
    <style>
        table {
            border: 1px solid black;
        }

        tr:nth-child(odd) {
            background-color: lightgray;
        }

        tr {
            text-align: center;
        }

        th,
        td {
            padding: 0 10px;
        }

        #aceptar {
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h2>Verbos irregulares en inglés.</h2>

    <?php
    // mostrarTablaVerbosIrregulares($tablaVerbos);
    mostrarTablaTarea($tablaTarea);
    // print_r($_SESSION["verbosIrregulares"]);
    // print_r($_SESSION["arrayTareaVerbos"]);

    if (isset($_POST["aceptar"])) {
        comprobarAciertos();
    }
    ?>
    <a href="cerrarSesion.php">Reiniciar</a>
    <?php
    echo "<div id='codigo'><a href='../../../../verCodigo.php?src=" . __FILE__ . "'><button>Ver Código</button></a></div>";
    ?>
</body>

</html>