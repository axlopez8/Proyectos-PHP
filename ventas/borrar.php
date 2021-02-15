<?php
include_once "../Conexion.php";
$idventa = trim ($_POST['idVenta']);


if($idventa != "" ){
    $borrar=" DELETE FROM `ventas` WHERE `idVenta`= $idventa";
    
    if(mysqli_query($conexion, $borrar)) {
        echo "Registro borrado";
    }else{
        echo "Parece que algo salio mal";
    }
}
