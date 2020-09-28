<?php
for($i=1; $i<1000; $i++){
    echo numeroEsPerfecto($i);
}

function numeroEsPerfecto($num){
    $divisores = 0;
    for($i=1; $i<$num; $i++){
        if($num%$i==0){
           $divisores+= $i;
        }
    }
    return ($divisores === $num) ? "El $num es perfecto<br>": "";
}
