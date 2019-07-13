<?php

include 'connect.php';
session_start();

//Pide la informacion a la base de datos
$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE nombre_usuario = '".$_SESSION['usuario']."'");
$atributo = mysqli_fetch_array($consulta);

//Variables de sesion
$_SESSION['nombres'] = $atributo['nombres'];
$_SESSION['apellidos'] = $atributo['apellidos'];
$_SESSION['correo'] = $atributo['correo'];
$_SESSION['rol'] = $atributo ['id_permisos'];
$_SESSION['id_persona'] = $atributo ['id_persona'];

//redirige al inicio
header("location:index.php");
