<?php
    include 'connect.php';

    $consulta = mysqli_query($conexion,"SELECT * from producto");
    $cantidad = mysqli_num_rows($consulta);
    $atributo = mysqli_fetch_array($consulta);
    $id = $atributo ['id_producto'];
    $tope_ciclo = $id + $cantidad;

    echo "$id"." "."$tope_ciclo";

    for($i = 1; $i < 43; $i++){ 
        $update = "UPDATE `producto` SET `cantidad` = '100' WHERE `producto`.`id_producto` = $i";
        $enlazar = mysqli_query($conexion, $update);
        echo "se hizo en el id = $i ";
    }
?>