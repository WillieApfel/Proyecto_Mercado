<?php
    include 'connect.php';

    session_start();
    //Verifica la sesion
    if(isset($_SESSION['usuario'])){
	    $nombre_usuario = $_SESSION['usuario'];
        $consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE nombre_usuario = '$nombre_usuario'");
        $atributo = mysqli_fetch_array($consulta);
        $id_usuario = $atributo['id_persona'];

        $id_producto = $_GET['id_producto'];

        $insertar = "INSERT INTO carrito(id_persona, id_producto) VALUES ('$id_usuario', '$id_producto')";
        $enlazar = mysqli_query($conexion, $insertar);

        header("location:carro.php");   
    }else{
        header("location:login.html");
    }
?>