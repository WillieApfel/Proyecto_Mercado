<?php
include 'connect.php';
$consulta_tablas = mysqli_query($conexion,"SELECT * from producto");
$cantidad_tablas = mysqli_num_rows($consulta_tablas);

for($i = 1; $i <= $cantidad_tablas; $i++){
    $consulta = "SELECT * FROM producto WHERE id_producto = $i";
    $resultado = mysqli_query($conexion, $consulta);
    $atributo = mysqli_fetch_array($resultado);
    $imagen = $atributo ['imagen'];
    echo " <img src='$imagen'> ";
}

?>

<html>
    <head>
        <title>fotoprueba</title>
    </head>
    <body>
    </body>
</html>