<?php
include_once "../Conexion.php";
$idproducto = trim ($_POST['idCompra']);


if($idCompra != "" ){
    $borrar=" DELETE FROM `compras` WHERE `idCompra`= $idCompra";
    
    if(mysqli_query($conexion, $borrar)) {
        echo "Registro borrado";
    }else{
        echo "Parece que algo salio mal";
    }
}
