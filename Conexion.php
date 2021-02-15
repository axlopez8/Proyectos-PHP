<?php
$servername = "localhost:3309";
$username = "root";
$database = "tersabd";
$password = "";

$conexion = mysqli_connect($servername, $username, $password) or die("No fue posible conectar al servicio de base de datos. Error: " . $conexion->connect_error);

$db = mysqli_select_db( $conexion, $database) or die ("Hijole Yo Creo Que No Se Va A Poder. Error: " . $dbs->connect_error);