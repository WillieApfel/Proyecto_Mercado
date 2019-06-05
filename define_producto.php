<?php
include 'connect.php';
$consulta_tipo = mysqli_query($conexion,"SELECT * from producto WHERE tipo = 'Alimento'");
$cantidad = mysqli_num_rows($consulta_tipo);
$atributo = mysqli_fetch_array($consulta_tipo);
$id = $atributo ['id_producto'];
$tope_ciclo = $id + $cantidad;
echo "$tope_ciclo "." "."$cantidad ";

for($i = 28; $i < 33; $i++){ 
    $update = "UPDATE `producto` SET `tipo` = 'Licores' WHERE `producto`.`id_producto` = $i";
    $enlazar = mysqli_query($conexion, $update);
    echo "se hizo en el id = $i ";
}