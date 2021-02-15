<?php
include_once "../Conexion.php";
$idPersona = trim ($_POST['idPersona']);


if($idproducto != "" ){
    $borrar=" DELETE FROM `personas` WHERE `idPersona`= $idPersona";
    
    if(mysqli_query($conexion, $borrar)) {
        echo "Registro borrado";
    }else{
        echo "Parece que algo salio mal";
    }
}
