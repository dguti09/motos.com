

<!DOCTYPE html>

<html lang="es">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<meta charset="utf-8">
	<title>Mi Mundo Motos</title>
</head>

<body>
	<!--nav-bar-->
	<nav>
		<div class="nav-wrapper #424242 grey darken-3">
			<a href="#!" class="brand-logo center">Mi Mundo Motos</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="motoclub.php"><i class="material-icons left">home</i>Inicio</a></li>
				<li><a href="index.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
				<li><a href="motoclub.php"><i class="material-icons left">home</i>Inicio</a></li>
				<li><a href="index.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
			</ul>
		</div>
	</nav>

	<!--fin-nav-bar-->

	<?php 
	session_start();
	include_once "Controllers/Connect.php";

	//INSERT INTO `CLUB` (`ID_CLUB`, `UBICACION`, `NOMBRE_CLUB`, `LOGO_CLUB`, `DESCRIPCION`) VALUES (NULL, POINT(3123, 312312), 'club 1', 'https://knowlinemieds.com/Images/default.jpg', 'club de motos numero 1')

	$now = time();
	if (isset($_SESSION['loggedin']) AND $_SESSION['expire'] >= $now) {

		$id_miembro = $_SESSION['id_miembro'];

		?>
		<div id="basic-form" class="section">
			<div class="row">
				<div class="col l6 offset-l3">
					<div class="card-panel">
						<form action="" method="POST">
							<blockquote class="flow-text">
								DATOS DEL CLUB
							</blockquote>
							<div class="row">				
								<div class="input-field col s6">
									<input id="name" name="name" value="" type="text" required>
									<label>Nombre</label>
								</div>
								<div class="input-field col s6">
									<input name="desc" value="" type="text" required>
									<label>Descripcion</label>
								</div>
							</div>
							<div class="row">				
								<div class="input-field col s6">
									<input name="lat" value="" type="text" required>
									<label>Latitud</label>
								</div>
								<div class="input-field col s6">
									<input name="lon" value="" type="text" required>
									<label>Longitud</label>
								</div>
							</div>
							<blockquote class="flow-text">
								Imagen del club
							</blockquote>
							<div class="file-field input field"> 
									<a class="btn waves-effect #d32f2f red darken-2"><i class="material-icons">add_a_photo</i>
										<input type="file" name="upload">
									</a>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
								<div class="row">
									
								
								<div class="col m10 ofset-2">
									<button class="btn waves-effect #d32f2f red darken-2 right" type="submit" name="action">
										Subir
										<i class="material-icons right">cloud_upload</i>
									</button>
								</div>  
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php 			
	}else {
		session_destroy();
		?>
		<div class="container">
			<div class="row">
				<div class="col s6">
					<h5>Su sesion ha expirado</h5>
					<a href="index.php">Inicie Sesion</a>
				</div>
			</div>
		</div>

		<?php 
	}
	?>
	<!--footer-->
	<main></main>
	<footer class="page-footer #424242 grey darken-3">
		<div class="container">
			<div class="row">

			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2017 KnowLine S.A.S
					<a class="grey-text text-lighten-4 right" href="#!">Mundo Motos</a>
				</div>
			</div>
		</footer>

		<!--fin footer-->


		<!--imports js-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<!--fin imports js-->
		<!--nav lateral responsivo-->
		<script>
			$(document).ready(function () {

				$(".button-collapse").sideNav();

			})
		</script>


		<!--fin nav lateral responsivo-->
	</body>

	</html>
