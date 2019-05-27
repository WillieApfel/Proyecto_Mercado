<?php
    $consulta_tipos = mysqli_query($conexion,"SELECT * from producto");
    $atributo = mysqli_fetch_array($consulta_tipo);
    $tipo = $atributo ['tipo'];
