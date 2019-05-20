<?php
include 'connect.php';

$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$nombre_usuario = $_POST["nombre_usuario"];
$clave = $_POST["clave"];

$consuta_nombre = "SELECT * from persona WHERE nombre_usuario = '$nombre_usuario'";
$consuta_correo = "SELECT * from persona WHERE correo = '$correo'";

$result_nombre = mysqli_query($conexion, $consuta_nombre);
$result_correo = mysqli_query($conexion, $consuta_correo);

if(mysqli_num_rows($result_nombre) > 0){
    $repite_nombre = true;
}else{
    $repite_nombre = false;
}

if(mysqli_num_rows($result_correo) > 0){
    $repite_correo = true;
}else{
    $repite_correo = false;
}

if($nombres == "" || $apellidos == "" || $correo == "" || $nombre_usuario == "" || $clave == ""){
    echo "sigues dando cringe";
}else{
    if($repite_nombre==true and $repite_correo==false){
        echo "tu nombre de usuario da cringe";
    }elseif($repite_correo==true and $repite_nombre==false){
        echo "tu correo da cringe";
    }elseif($repite_nombre==true and $repite_correo==true){
        echo "tu correo y tu usuario dan cringe";
    }else{
        $insertar = "INSERT INTO persona(nombres, apellidos, correo, nombre_usuario, clave) 
        VALUES ('$nombres', '$apellidos', '$correo', '$nombre_usuario', '$clave')";
        $enlazar = mysqli_query($conexion, $insertar);
        session_start();
        $_SESSION['usuario'] = $nombre_usuario;
        header("location:index.php");
    }
}
?>