<?php
include 'connect.php';
session_start();

//Verifica si hay una sesion iniciada y guarda los datos
if(isset($_SESSION['usuario'])){
    
    $nombre = $_SESSION['nombres']. " ". $_SESSION['apellidos'];
    $correo = $_SESSION['correo'];

}else{
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];

}

//Define los datos faltantes
$telefono = $_POST["telefono"];
$asunto = $_POST["asunto"];

//Registra todo en la base de Datos
$insertar = "INSERT INTO contacto(nombres, correo, telefono, asunto) 
VALUES ('$nombre', '$correo', '$telefono', '$asunto')";
$enlazar = mysqli_query($conexion, $insertar);
header("location:index.php");
?>