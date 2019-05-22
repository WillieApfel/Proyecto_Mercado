<?php
include 'connect.php';
$consulta = "SELECT * FROM producto WHERE id_producto = 14";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen = $atributo ['imagen'];

?>

<html>
    <head>
        <title>fotoprueba</title>
    </head>
    <?php echo "<img src='$imagen'>" ?>
    <body>
    </body>
</html>