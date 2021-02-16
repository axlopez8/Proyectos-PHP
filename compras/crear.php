<?php

include_once "../Conexion.php";
$Total_Monto = trim ($_POST['Total_Monto']);
$Total_Pagado = trim($_POST['Total_Pagado']);
$Proveedor = trim($_POST['proveedor']);
$Estado = trim($_POST['estado']);
$Producto1 = trim($_POST['Producto1']);
$Cantidad1 = trim($_POST['cantidad1']);

if ($Estado=="Cancelado"){$Estado=1;}
if ($Estado=="Deuda"){$Estado=2;}


if($Total_Monto != "" && $Total_Pagado != "" && $Proveedor != "" && $Estado != "" && $Producto1 != "" && $Cantidad1 != ""  ){
    $crear="INSERT INTO compras (`idCompra`, `Total_Monto`, `Total_Pagado`, `FK_Proveedor`, `FK_Estado`) VALUES (NULL, '$Total_Monto', '$Total_Pagado','$Proveedor','$Estado')";
    
    if(mysqli_query($conexion, $crear)) {
       $factura= mysqli_insert_id($conexion);
       if( isset($_POST['cantidad3']) && isset($_POST['Producto3']) &&isset($_POST['cantidad2']) && isset($_POST['Producto2'])){
        $Producto2 = trim($_POST['Producto2']);
        $Cantidad2 = trim($_POST['cantidad2']);
        $Producto3 = trim($_POST['Producto3']);
        $Cantidad3 = trim($_POST['cantidad3']);
       }
        
    }else{
        echo "Parece que algo salio mal";
    }
}
