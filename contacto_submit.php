<?php
include 'connect.php';
session_start();

//Verifica si hay una sesion iniciada
if(isset($_SESSION['usuario'])){
    $nombre_usuario = $_SESSION['usuario'];

	$consulta = "SELECT * FROM persona WHERE nombre_usuario = '$nombre_usuario'";
	$resultado = mysqli_query($conexion, $consulta);
    $atributo = mysqli_fetch_array($resultado);

    
    $nombre = $atributo['nombres']. " ". $atributo['apellidos'];
    $correo = $atributo['correo'];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];

}else{
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
}

$insertar = "INSERT INTO contacto(nombres, correo, telefono, asunto) 
VALUES ('$nombre', '$correo', '$telefono', '$asunto')";
$enlazar = mysqli_query($conexion, $insertar);
header("location:index.php");
?>