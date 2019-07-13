<?php
$conexion = mysqli_connect ("localhost","root","","db_mercado");

//Guarda los datos ingresados por el usuario
$nombre_producto = $_POST["nombre_producto"];
$tipo = $_POST["tipo"];
$nombre_imagen = $_FILES['imagen']['name'];
$archivo = $_FILES['imagen']['tmp_name'];
$ruta = "multimedia/img_productos";
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];


if($tipo=="Frutas y Verduras"){
    $ruta="$ruta/Frutas_Verduras/$nombre_imagen";
    move_uploaded_file($archivo, $ruta);
    $insertar = "INSERT INTO producto(nombre, tipo, imagen, precio, cantidad) 
    VALUES ('$nombre_producto', '$tipo', '$ruta', '$precio', '$cantidad')";
    $enlazar = mysqli_query($conexion, $insertar);
    header("location:index.php");
}else {
    $ruta="$ruta/$tipo/$nombre_imagen";
    move_uploaded_file($archivo, $ruta);
    $insertar = "INSERT INTO producto(nombre, tipo, imagen, precio, cantidad) 
    VALUES ('$nombre_producto', '$tipo', '$ruta', '$precio', '$cantidad')";
    $enlazar = mysqli_query($conexion, $insertar);
    header("location:index.php");
}




