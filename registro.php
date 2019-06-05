<?php
include 'connect.php';

//Guarda los datos ingresados por el usuario
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$nombre_usuario = $_POST["nombre_usuario"];
$clave = $_POST["clave"];

//Busca los nombres de usuario y correos en la base de datos 
$consuta_nombre = "SELECT * from persona WHERE nombre_usuario = '$nombre_usuario'";
$consuta_correo = "SELECT * from persona WHERE correo = '$correo'";
$result_nombre = mysqli_query($conexion, $consuta_nombre);
$result_correo = mysqli_query($conexion, $consuta_correo);

//Verifica si ya existe el nombre de usuario
if(mysqli_num_rows($result_nombre) > 0){
    $repite_nombre = true;
}else{
    $repite_nombre = false;
}

//Verifica si el correo ya ha sido usado
if(mysqli_num_rows($result_correo) > 0){
    $repite_correo = true;
}else{
    $repite_correo = false;
}

//Verifica que no falte informacion
if($nombres == "" || $apellidos == "" || $correo == "" || $nombre_usuario == "" || $clave == ""){
    echo "sigues dando cringe";
}else{
    //Da Aviso si hay datos repetidos 
    if($repite_nombre==true and $repite_correo==false){
        echo "tu nombre de usuario da cringe";
    }elseif($repite_correo==true and $repite_nombre==false){
        echo "tu correo da cringe";
    }elseif($repite_nombre==true and $repite_correo==true){
        echo "tu correo y tu usuario dan cringe";
    }else{
        //Inserta la informacion a la base de datos si se cumplen todos los requisitos 
        $insertar = "INSERT INTO persona(nombres, apellidos, correo, nombre_usuario, clave, id_permisos) 
        VALUES ('$nombres', '$apellidos', '$correo', '$nombre_usuario', '$clave', '2')";
        $enlazar = mysqli_query($conexion, $insertar);
        //Inicia sesion con el usuario registrado
        session_start();
        $_SESSION['usuario'] = $nombre_usuario;
        header("location:index.php");
    }
}
?>