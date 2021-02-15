<?php

include_once "../Conexion.php";
$id = trim ($_POST['id']);
$direccion_venta = trim ($_POST['direccion_venta']);
$total_monto = trim($_POST['total_monto']);
$total_pagado = trim($_POST['total_pagado']);
$estados = trim($_POST['estados']);

if($id != "" && $direccion_venta != "" && $total_monto != "" && $total_pagado != "" && $estados != ""  ){
    $editar="UPDATE `ventas` SET `Direccion_Venta` = '$direccion_venta', `Total_monto` = '$total_monto', `total_pagado` = '$total_pagado',  `FK_Estado` = '$estados`'  WHERE `estados_deudas`.`idEstado` = $id";
    
    if(mysqli_query($conexion, $editar)) {
        echo "Registro editado";
    }else{
        echo "Parece que algo salio mal";
    }
}