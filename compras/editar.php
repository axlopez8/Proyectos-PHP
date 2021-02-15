<?php

include_once "../Conexion.php";
$id = trim ($_POST['id']);
$Total_Monto = trim ($_POST['Total_Monto']);
$Total_Pagado = trim($_POST['Total_Pagado']);
$Proveedor = trim($_POST['Proveedor']);
$Estado = trim($_POST['Estado']);

if($id != "" && $Total_Monto != "" && $Total_Pagado != "" && $proveedor != "" && $Estado != ""  ){
    $editar="UPDATE `compras` SET `Total_Monto` = '$Total_Monto', `Total_Pagado` = '$Total_Pagado', `FK_Proveedor` = '$proveedor`'  WHERE `productos`.`idProducto` = $id" ;
    
    if(mysqli_query($conexion, $editar)) {
        echo "Registro editado";
    }else{
        echo "Parece que algo salio mal";
    }
}