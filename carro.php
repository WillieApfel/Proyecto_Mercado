<?php
session_start();
include 'connect.php';

if(isset($_SESSION['usuario'])){
	$nombre_usuario = $_SESSION['usuario'];
	$consulta = mysqli_query($conexion, "SELECT * FROM persona WHERE nombre_usuario = '$nombre_usuario'");
	$atributo = mysqli_fetch_array($consulta);
    $rol = $atributo ['id_permisos'];
    $id_usuario = $atributo['id_persona'];
    
    $consulta_carro = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_persona = '$id_usuario'");
    $cantidad_usuario = mysqli_num_rows($consulta_carro);
    $consulta_tabla_carrito = mysqli_query($conexion, "SELECT * FROM carrito");
    $cantidad_carro = mysqli_num_rows($consulta_tabla_carrito);
}else{
    header("location:login.html");
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
				<?php if (isset($_SESSION['usuario']) && ($rol==1)): ?>
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
    echo "$cantidad_carro $cantidad_usuario $id_usuario";
				for($i = 0; $i = $cantidad_carro; $i++){
					$atributo_carro = mysqli_fetch_array($consulta_carro);
					$id_productos = $atributo_carro ['id_producto']
		    		$consulta_producto = mysqli_query($conexion, "SELECT * FROM producto WHERE id_producto = $id_productos")
		    		echo "<div class= 'producto'>
						<a href='detalles.php?id_producto=$i'>
							<img src='$imagen'></a><br>
						<span class='nombre'><a href='detalles.php?id_producto=$i'>
							$nombre</a></span><br>
						<span><strong>Precio: </strong>$precio Bs.S</span><br>
						<a href='detalles.php?id_producto=$i' class='ver'>Ver producto</a><br>
						</div>";

                }
                
			?>
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>