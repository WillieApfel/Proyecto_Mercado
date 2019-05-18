<?php
include 'connect.php';

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$nombre_usuario = $_POST["nombre_usuario"];
$clave = $_POST["clave"];

$insertar = "INSERT INTO persona(nombres, apellidos, correo, nombre_usuario, clave) 
VALUES ('$nombres', '$apellidos', '$correo', '$nombre_usuario', '$clave')";

$enlazar = mysqli_query($conexion, $insertar);
?>