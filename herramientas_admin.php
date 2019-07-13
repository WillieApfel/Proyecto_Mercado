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

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/herramienta_admin.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
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
            <li id="carrito"><a href="#" class="icon-cart"></a></li>
            <?php else: ?>
            <li><a href="login.html">Acceder</a></li>
			<li>|</li>
			<li><a href="Registro.html">Registrarme</a></li>
            <li id="carrito"><a href="login.php" class="icon-cart"></a></li>
            <?php endif; ?>
		</ul>

		<nav>
				
				<div class="menu-bar">
					<h2><span class="icon-list2"></span>MENÚ</h2>
				</div>

			<ul class="menu">
				<li class="supermercado">
					<a href="#"><span class="icon-sun"></span>Supermercado<span class="icon-circle-down"></span></a>
					<ul class="submenu">
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Alimentos">Alimentos</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Frutas y Verduras">Frutas y Verduras</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Charcuteria">Charcuteria</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Licores">Licores</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Cosmeticos">Cuidado e Higiene</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Mascotas">Mascotas</a></li>
						<li>
							<div class="barra"></div>
							<a href="productos.php?tipo=Limpieza">Limpieza y Hogar</a></li>
					</ul>
				</li>

				<li>
					<a href="#"><span class="icon-ticket"></span>Ofertas</a>
				</li>

				<li>
					<a href="#"><span class="icon-airplane"></span>Importado</a>
				</li>
				<?php if (isset($_SESSION['usuario']) && ($_SESSION['rol']==1)): ?>
					<li><a href="herramientas_admin.php"><span class="icon-user-plus"></span>Administrador</a></li>
				<?php endif; ?>
				<li>
					<a href="contacto.php"><span class="icon-envelop"></span>Contáctanos</a>
				</li>
			</ul>
		</nav>
	</header>


	<section class="main">

    <h2>Añadir nuevo producto</h2>

    <div>
    	<form action="agregar_producto.php" method="post" enctype = "multipart/form-data"
			class="form-registro" onsubmit="return validar(this);">
			<label for="nombre_producto" >Nombre del producto: <span class="requisito">*</span></label>
			<input type="text" id="nombre_producto" name="nombre_producto" maxlength="40" required>

			<label class="tipo" for="tipo" >Tipo de producto: <span class="requisito">*</span></label>
			<select name="tipo">
                <option value="Alimentos">Alimento</option>
                <option value="Charcuteria">Charcuteria</option>
                <option value="Cosmeticos">Cosméticos</option>
                <option value="Frutas y Verduras">Fruta o Verdura</option>
                <option value="Licores">Licor</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Mascotas">Mascotas</option>
            </select>

			<label for="precio" >Precio: <span class="requisito">*</span></label>
			<input type="text" id="precio" name="precio" maxlength="20" required>

			<label for="cantidad" >Cantidad: <span class="requisito">*</span></label>
            <input type="number" id="cantidad" name="cantidad" min="1" step="1" required>
            
            <label for="imagen" >Imagen: <span class="requisito">*</span></label>
			<input type="file" id="imagen" name="imagen" maxlength="60" required>

			<input type="submit" id="añadir" name="añadir" value="Añadir">
		</form>
	</div>
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html> 




