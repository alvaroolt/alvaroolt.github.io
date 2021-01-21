<?php

require "phpMailer/class.phpmailer.php";

// $mail = new PHPMailer();

// // if(isset($_POST['upload_file'])){
//     $mail->Charset = "utf-8";
//     $mail->From = "lojiprogramador@gmail.com";
//     $mail->FromName = "Administrador";
//     $mail->Subject = "Titulo del correo";

//     $mail->addAddress("javierlopera988@gmail.com"," "); //"Javier Lopera" segundo parametro
//     $mail->msgHTML("Mensaje");

//     // $mail->addAttachment('img/narnia.jpg');

//     if($mail->send()){
//         echo "Correo enviado";
//     }
//     else{
//         echo "ERROR, correo no enviado";
//     }

if(isset($_POST["subida"])){
    echo $_POST["nombre"]."<br>";

    echo "<pre>";
    print_r($_FILES["fichero"]);
    echo "</pre>";

    if(!file_exists("usuarios")){
        mkdir("usuarios",0777,true);
    }

    move_uploaded_file($_FILES["fichero"]["tmp_name"],"usuarios/". $_FILES["fichero"]["name"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="text" name="nombre" value="">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
    <input type="file" name="fichero" value="">
    <input type="submit" value="Subir Fichero" name="subida">
</form>

<?php

// }

?>