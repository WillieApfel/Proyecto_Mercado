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

		<div class="slider">
			<ul>
				<li><img src="multimedia/varios.jpg" alt=""></li>
				<li><img src="multimedia/super.jpg" alt=""></li>
				<li><img src="multimedia/alcohol.jpg" alt=""></li>
				<li><img src="multimedia/fruteria.jpg" alt=""></li>
				<li><img src="multimedia/sonic.jpg" alt=""></li>
				<li><img src="multimedia/limpieza.jpg" alt=""></li>
			</ul>
		</div>
		
		<div class="contenido">
		<h2>Productos Destacados</h2>
		
			<div class="productos destacados">
				<center>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[1]?>">
						<img class="alto" src="<?php echo $imagen[1]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[1]?>">
						<?php echo "$nombre[1]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[1]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[1]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[10]?>">
						<img class="ancha" src="<?php echo $imagen[10]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[10]?>">
						<?php echo "$nombre[10]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[10]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[10]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[13]?>">
						<img class="cuadrado" src="<?php echo $imagen[13]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[13]?>">
						<?php echo "$nombre[13]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[13]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[13]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[5]?>">
						<img class="alto" src="<?php echo $imagen[5]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[5]?>">
						<?php echo "$nombre[5]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[5]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[5]?>" class="ver">Ver producto</a><br>
					</div>
				</center>
			</div>

		<h2>Productos en Oferta !</h2>
		
		<div class="productos oferta">
				<center>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[3]?>">
						<img class="alto" src="<?php echo $imagen[3]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[3]?>">
						<?php echo "$nombre[3]"?></a></span><br>
					<span><strong>Precio: </strong><del><?php echo $precio[3]?> Bs.S</del></span><br>
					<span><?php echo $precio[3]/2?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[3]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[20]?>">
						<img class="ancha" src="<?php echo $imagen[20]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[20]?>">
						<?php echo "$nombre[20]"?></a></span><br>
					<span><strong>Precio: </strong><del><?php echo $precio[20]?> Bs.S</del></span><br>
					<span><?php echo $precio[20]/2?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[20]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[41]?>">
						<img class="grande" src="<?php echo $imagen[41]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[41]?>">
						<?php echo "$nombre[41]"?></a></span><br>
					<span><strong>Precio: </strong><del><?php echo $precio[41]?> Bs.S</del></span><br>
					<span><?php echo $precio[41]/2?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[41]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[34]?>">
						<img class="alto" src="<?php echo $imagen[34]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[34]?>">
						<?php echo "$nombre[34]"?></a></span><br>
					<span><strong>Precio: </strong><del><?php echo $precio[34]?> Bs.S</del></span><br>
					<span><?php echo $precio[34]/2?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[34]?>" class="ver">Ver producto</a><br>
					</div>
				</center>
			</div>

		<h2>Novedades</h2>
		
		<div class="productos novedades">
				<center>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[31]?>">
						<img class="alto" src="<?php echo $imagen[31]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[31]?>">
						<?php echo "$nombre[31]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[31]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[31]?>" class="ver">Ver producto</a><br>
					</div>
					
					<div class="producto">
					<a href="detalles.php?id_producto=<?php echo $id[32]?>">
						<img class="alto" src="<?php echo $imagen[32]?>"></a><br>
					<span class="nombre"><a href="detalles.php?id_producto=<?php echo $id[32]?>">
						<?php echo "$nombre[32]"?></a></span><br>
					<span><strong>Precio: </strong><?php echo $precio[32]?> Bs.S</span><br>
					<a href="detalles.php?id_producto=<?php echo $id[32]?>" class="ver">Ver producto</a><br>
					</div>
				</center>
			</div>

		</div>
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>