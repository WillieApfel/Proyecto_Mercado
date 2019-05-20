<?php
include 'connect.php';

//Guarda los datos ingresados por el usuario
$nombre_usuario = $_POST["nombre_usuario"];
$clave = $_POST["clave"];

//Pide la informacion a la base de datos
$consulta = "SELECT * FROM persona WHERE nombre_usuario = '$nombre_usuario'";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);

//echo "$nombre_usuario". "\n". $atributo['nombre_usuario']. "\n". "$clave"."\n". $atributo['clave']. "\n";

//Verifica que los datos concuerden e inicia la sesion 
if ($nombre_usuario==($atributo['nombre_usuario']) and $clave==($atributo['clave'])) {
    session_start();
    $_SESSION['usuario'] = $nombre_usuario;
    header("location:index.php");
}else{
    echo "Das Cringe";
}
?>