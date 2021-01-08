<?php
if (!isset($_SESSION["aMultas"])) {
    $_SESSION["aMultas"] = array(
        array(
            "matricula" => "XXX",
            "descripcion" => "mat1",
            "fecha" => "10-02-2020",
            "importe" => "300",
            "estado" => "pendiente"
        ),
        array(
            "matricula" => "YYY",
            "descripcion" => "mat2",
            "fecha" => "28-04-2020",
            "importe" => "500",
            "estado" => "pendiente"
        ),
        array(
            "matricula" => "ZZZ",
            "descripcion" => "mat3",
            "fecha" => "03-08-2020",
            "importe" => "100",
            "estado" => "pendiente"
        ),
        array(
            "matricula" => "AAA",
            "descripcion" => "mat4",
            "fecha" => "03-10-2020",
            "importe" => "50",
            "estado" => "pagada"
        )
    );
}
