<?php
session_start();
include 'connect.php';

if(isset($_SESSION['usuario'])){
	
    $consulta_tabla_carrito = mysqli_query($conexion, "SELECT * FROM carrito");
	$cantidad_carro = mysqli_num_rows($consulta_tabla_carrito);
	$tope_ciclo = $cantidad_carro +1;
}else{
    header("location:login.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/carro.css">
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
            <li id="carrito"><a href="carro.php" class="icon-cart"></a></li>
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
    <?php
				for($i = 1; $i < $tope_ciclo; $i++){
					$consulta_carro = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_entrada = '$i'
						AND id_persona = '".$_SESSION['id_persona']."'");
					$atributo_carro = mysqli_fetch_array($consulta_carro);

					$referencia = $atributo_carro ['id_producto'];
					
					$consulta_producto = mysqli_query($conexion, "SELECT * FROM producto 
						WHERE id_producto = '$referencia'");
					$atributo_producto = mysqli_fetch_array($consulta_producto);
					$imagen = $atributo_producto ['imagen'];
					$nombre = $atributo_producto ['nombre'];
					$precio = $atributo_producto ['precio'];
					if($_SESSION['id_persona'] == $atributo_carro ['id_persona']){
		    			echo "<div class= 'producto'>
							<a href='detalles.php?id_producto=$i'>
								<img src='$imagen'></a><br>
							<span class='nombre'>$nombre</span><br>
							<span><strong>Precio: </strong>$precio Bs.S</span><br>
							</div>";
					}	
                }
			?>
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>