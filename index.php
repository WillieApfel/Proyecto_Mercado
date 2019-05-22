<?php
session_start();
include 'connect.php';

$consulta = "SELECT * FROM producto WHERE id_producto = 1";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen1 = $atributo ['imagen'];
$nombre1 = $atributo ['nombre'];
$id1 = $atributo ['id_producto'];
$precio1 = $atributo ['precio'];

$consulta = "SELECT * FROM producto WHERE id_producto = 10";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen2 = $atributo ['imagen'];
$nombre2 = $atributo ['nombre'];
$id2 = $atributo ['id_producto'];
$precio2 = $atributo ['precio'];

$consulta = "SELECT * FROM producto WHERE id_producto = 13";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen3 = $atributo ['imagen'];
$nombre3 = $atributo ['nombre'];
$id3 = $atributo ['id_producto'];
$precio3 = $atributo ['precio'];

$consulta = "SELECT * FROM producto WHERE id_producto = 5";
$resultado = mysqli_query($conexion, $consulta);
$atributo = mysqli_fetch_array($resultado);
$imagen4 = $atributo ['imagen'];
$nombre4 = $atributo ['nombre'];
$id4 = $atributo ['id_producto'];
$precio4 = $atributo ['precio'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
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
            <li><a href="#" class="icon-cart"></a></li>
            <?php else: ?>
            <li><a href="login.html">Acceder</a></li>
			<li>|</li>
			<li><a href="Registro.html">Registrarme</a></li>
            <li><a href="#" class="icon-cart"></a></li>
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
							<a href="#">Alimentos</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Frutas y Verduras</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Charcuteria</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Licores</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Cuidado e Higiene</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Mascotas</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Limpieza y Hogar</a></li>
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

		<div class="slider">
			<ul>
				<li><img src="multimedia/super.jpg" alt=""></li>
				<li><img src="multimedia/varios.jpg" alt=""></li>
				<li><img src="multimedia/alcohol.jpg" alt=""></li>
				<li><img src="multimedia/fruteria.jpg" alt=""></li>
				<li><img src="multimedia/sonic.jpg" alt=""></li>
				<li><img src="multimedia/limpieza.jpg" alt=""></li>
			</ul>
		</div>
		
		<div class="contenido">
		<h2>Productos Destacados</h2>
		
			<div class="productos-destacados">
				<center>
					
					<div class="producto">
					<a href="detalles.php?=<?php echo $id3?>">
						<img id="aceite" src="<?php echo $imagen1?>"></a><br>
					<span class="nombre"><a href="detalles.php?=<?php echo $id3?>">
						<?php echo "$nombre1"?></a></span><br>
					<span><strong>Precio: </strong><?php echo "$precio1"?> Bs.S</span><br>
					<a href="detalles.php?=<?php echo $id1?>">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?=<?php echo $id3?>">
						<img id="jamon" src="<?php echo $imagen2?>"></a><br>
					<span class="nombre"><a href="detalles.php?=<?php echo $id3?>">
						<?php echo "$nombre2"?></a></span><br>
					<span><strong>Precio: </strong><?php echo "$precio2"?> Bs.S</span><br>
					<a href="detalles.php?=<?php echo $id2?>">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?=<?php echo $id3?>">
						<img id="queso" src="<?php echo $imagen3?>"></a><br>
					<span class="nombre"><a href="detalles.php?=<?php echo $id3?>">
						<?php echo "$nombre3"?></a></span><br>
					<span><strong>Precio: </strong><?php echo "$precio3"?> Bs.S</span><br>
					<a href="detalles.php?=<?php echo $id3?>">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?=<?php echo $id3?>">
						<img id="cafe" src="<?php echo $imagen4?>"></a><br>
					<span class="nombre"><a href="detalles.php?=<?php echo $id3?>">
						<?php echo "$nombre4"?></a></span><br>
					<span><strong>Precio: </strong><?php echo "$precio4"?> Bs.S</span><br>
					<a href="detalles.php?=<?php echo $id4?>">Ver producto</a><br>
					</div>
				</center>
			</div>

		<h2>Productos en Oferta</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<h2>Novedades</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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