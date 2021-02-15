<?php

include_once "../Conexion.php";
$direccion_venta = trim ($_POST['direccion_venta']);
$total_monto = trim($_POST['total_monto']);
$total_pagado = trim($_POST['total_pagado']);
$estados = trim($_POST['estados']);

if($direccion_venta != "" && $total_monto != "" && $total_pagado !=  "" && $estados != ""  ){
    $crear="INSERT INTO `ventas` (`idVenta`, `Direccion_Venta`, `Total_monto`, `total_pagado`, `FK_Estado`) VALUES (NULL, '$direccion_venta', '$total_monto', '$total_pagado', '$estados')";
    
    if(mysqli_query($conexion, $crear)) {
        echo "Registro creado";
    }else{
        echo "Parece que algo salio mal";
    }
}
