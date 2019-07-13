<?php
include 'connect.php';
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/contacto.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<script src="js/jquery.js"></script>
	<script src="js/abrir.js"></script>
	<script src="js/validar_contactanos.js"></script>
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
		
		
		<div id="form-contacto">

			<form action="contacto_submit.php" method="post" onsubmit="return validar(this);">
				<h1>Wolmar</h1>
				<h2>Contacta a nuestro equipo de Servicio al Cliente para dar un comentario o hacer una 
				pregunta acerca de nuestro sitio web</h2>
				<div class="col-izquierda">
				<?php if (isset($_SESSION['usuario'])): ?>
						<label for="nombre">Nombre y Apellido:</label>
						<label> <?php echo $_SESSION['nombres']," ",$_SESSION['apellidos'];?></label>
						<label><br></label>
						<label for="correo">Correo electrónico:</label>
						<label for="correo"><?php echo $_SESSION['correo'];?></label>
						<label><br></label>
					<?php else: ?>	
						<label for="nombre">Nombre y Apellido:</label>
						<input type="text" id="nombre" name="nombre" maxlength="80" required>
							
						<label for="correo">Correo electrónico</label>
						<input type="email" id="correo" name="correo" maxlength="60" required>
					<?php endif; ?>
					
					<label for="telefono">Teléfono</label>
					<input type="tel" id="telefono" name="telefono" maxlength="12" required>
				</div>

				<div class="col-derecha">
					<label for="asunto">Mensaje</label>
					<textarea rows="8" name="asunto" id="asunto" maxlength="500" required></textarea>
					<input type="submit" name="enviar" value="Enviar">
				</div>

				<p><span class="icon-mail2"></span>Escríbenos mediante el formulario de Contacto</p>
				<p><span class="icon-phone"></span>Llámanos 0412-7696232 | 0412-4095885</p>

			</form>
		</div>
		
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>