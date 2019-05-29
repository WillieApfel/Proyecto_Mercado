<?php
session_start();
include 'connect.php';

$consulta_tablas = mysqli_query($conexion,"SELECT * from producto");
$cantidad_tablas = mysqli_num_rows($consulta_tablas);

for ($i=1; $i <= $cantidad_tablas; $i++) { 
$consulta = "SELECT * FROM producto WHERE id_producto = $i";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen[$i] = $atributo ['imagen'];
$nombre[$i] = $atributo ['nombre'];
$id[$i] = $atributo ['id_producto'];
$precio[$i] = $atributo ['precio'];
}

if(isset($_SESSION['usuario'])){
	$nombre_usuario = $_SESSION['usuario'];
	$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE nombre_usuario = '$nombre_usuario'");
	$atributo = mysqli_fetch_array($consulta);
	$rol = $atributo ['id_permisos'];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link href="https://fonts.googleapis.com/css?family=Caveat|Gochi+Hand|Patrick+Hand|Permanent+Marker&display=swap" rel="stylesheet">
	<script src="js/jquery.js"></script>
	<script src="js/abrir.js"></script>
</head>
<body>
	<header>
		<h1 class="home"><a href="index.php">Wolmar</a></h1>
        
		<ul class="menuP">
            <?php if (isset($_SESSION['usuario'])): ?>
            <li><span class="icon-user"></span><?php echo $_SESSION['usuario']?></li>
            <li>|</li>
            <li><a href ="desconexion.php"><span class="icon-exit"></span>Cerrar Sesion<?php ?></a></li>
			<li>|</li>
            <li><a href="#" class="icon-cart"></a></li>
            <?php else: ?>
            <li><a href="login.html">Acceder</a></li>
			<li>|</li>
			<li><a href="Registro.html">Registrarme</a></li>
            <li><a href="#" class="icon-cart"></a></li>
            <?php endif; ?>
		</ul>


	<section class="main">

    </section>
    <h2>Añadir nuevo producto</h2>
    <form action="agregar_producto.php" method="post" enctype = "multipart/form-data"
		class="form-registro" onsubmit="return validar(this);">
			<label for="nombre_producto" >Nombre del producto: <span class="*">*</span></label>
			<input type="text" id="nombre_producto" name="nombre_producto" maxlength="40" required>

			<label for="tipo" >Tipo de producto: <span class="*">*</span></label>
			<select name="tipo">
                <option value="Alimentos">Alimento</option>
                <option value="Charcuteria">Charcuteria</option>
                <option value="Cosmeticos">Cosméticos</option>
                <option value="Frutas y Verduras">Fruta o Verdura</option>
                <option value="Licores">Licor</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Mascotas">Mascotas</option>
            </select>

			<label for="precio" >Precio: <span class="*">*</span></label>
			<input type="text" id="precio" name="precio" maxlength="20" required>

			<label for="cantidad" >Cantidad: <span class="*">*</span></label>
            <input type="text" id="cantidad" name="cantidad" maxlength="60" required>
            
            <label for="imagen" >Imagen: <span class="*">*</span></label>
			<input type="file" id="imagen" name="imagen" maxlength="60" required>

			<input type="submit" id="añadir" name="añadir" value="Añadir">
		</form>
	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html> 




