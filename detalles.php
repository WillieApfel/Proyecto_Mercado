<?php
session_start();
include 'connect.php';
$numero_id = $_GET['id_producto'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/detalles.css">
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
            <li id="carrito"><a href="#" class="icon-cart"></a></li>
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
							<a href="productos.php?tipo=Alimento">Alimentos</a></li>
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

				<li>
					<a href="contacto.php"><span class="icon-envelop"></span>Contáctanos</a>
				</li>
			</ul>
		</nav>
	</header>

	<section class="main">
	
	<div class="contenido">
	    <?php	
	        $consulta = mysqli_query($conexion,"SELECT * from producto WHERE id_producto = '$numero_id'");
			$atributo = mysqli_fetch_array($consulta);
	   		$imagen = $atributo ['imagen'];
	   		$nombre = $atributo ['nombre'];
		    $precio = $atributo ['precio'];
		    		echo "<div class= 'producto'>
						<img src='$imagen'>
						</div><br>
						<h3>$nombre</h3><br>
						<p class='precio'><strong>Precio: </strong>$precio Bs.S</p><br>";
		?>

		<div id="btn-agg-carrito">
			<a href="agregar_carrito.php?id_producto=<?php echo "$numero_id"?>" class="Agregar">Agregar al Carrito</a>
		</div>

		<h4>Descripción del Producto</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
	</div>
		
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>