<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wolmar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/contacto.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<script src="jquery.js"></script>
	<script src="abrir.js"></script>
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
							<a href="#">Carnes</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Charcuteria</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Licores</a></li>
						<li>
							<div class="barra"></div>
							<a href="#">Cuidado Personal</a></li>
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
		
		
		<div id="form-contacto">

			<form>
				<h1>Wolmar</h1>
				<h2>Contacta a nuestro equipo de Servicio al Cliente para dar un comentario o hacer una pregunta acerca de nuestro sitio web</h2>
				<div class="col-izquierda">
					<label for="nombre">Nombre y Apellido</label>
					<input type="text" name="nombre">
							
					<label for="correo">Correo electrónico</label>
					<input type="email" name="correo">
							
					<label for="telefono">Teléfono</label>
					<input type="tel" name="telefono">
				</div>

				<div class="col-derecha">
					<label for="asunto">Mensaje</label>
					<textarea rows="8" name="asunto" id="asunto"></textarea>
					<input type="submit" name="enviar" value="Enviar">
				</div>

				<p><span class="icon-mail2"></span>Escríbenos mediante el formulario de Contacto</p>
				<p><span class="icon-phone"></span>Llámanos 0412-7696232</p>

			</form>
		</div>
		
	</section>

	<footer>
		<p>© Wolmar C.A. 2019 | todos los derechos en uso</p>
	</footer>
</body>
</html>