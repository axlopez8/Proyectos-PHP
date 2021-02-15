<?php

include_once "../Conexion.php";
$Total_Monto = trim ($_POST['Total_Monto']);
$Total_Pagado = trim($_POST['Total_Pagado']);
$Proveedor = trim($_POST['Proveedor']);
$Estado = trim($_POST['Estado']);

if($Total_Monto != "" && $Total_Pagado != "" && $Proveedor != "" && $Estado != ""  ){
    $crear="INSERT INTO `compras` (`idCompra`, `Total_Monto`, `Total_Pagado`, `FK_Proveedor`, `FK_Estado`) VALUES (NULL, '$Total_Monto', '$Total_Pagado','$Proveedor','$Estado')";
    
    if(mysqli_query($conexion, $crear)) {
        echo "Registro creado";
    }else{
        echo "Parece que algo salio mal";
    }
}
