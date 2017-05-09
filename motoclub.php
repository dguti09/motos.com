<!DOCTYPE html>

<html lang="es">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<meta charset="utf-8">
	<title>Mi Mundo Motos</title>
	<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map{
      	width: 100%; 
      	height: 25em;
      	/*margin: 0;*/
      	/*padding: 15px;*/
      }
  </style>

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

	$now = time();
	if (isset($_SESSION['loggedin']) AND $_SESSION['expire'] >= $now ) {

		$idClub = $_SESSION['id_club'];
		$sqlClub = 'SELECT NOMBRE_CLUB, LOGO_CLUB, DESCRIPCION, X(UBICACION) as LAT, Y(UBICACION) as LON FROM CLUB WHERE ID_CLUB = '.$idClub;
		$executeClub = $conn->query($sqlClub);
		while ($rowClub = mysqli_fetch_assoc($executeClub)) {
			$name = $rowClub['NOMBRE_CLUB'];
			$picture = $rowClub['LOGO_CLUB'];
			$info = $rowClub['DESCRIPCION'];
			$lat = $rowClub['LAT'];
			$lon = $rowClub['LON'];
		}
		?>	
		<div class="row">
			<div class="col m4 s12">
				<div class="card content">
					<blockquote class="flow-text">
						Club <?php echo $name; ?>
					</blockquote>
					<div class="card-image medium">
						<img   class="responsive-img" src="<?php echo $picture; ?>" style="width: 70em;">
						<span class="card-title"></span>
						<a class="activator btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">mode_edit</i></a>

					</div>
					<div class="card-content">
						<H5> <?php echo $info; ?></H5>
					</div>


					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">
							<i class="material-icons right">close</i></span>
							<blockquote>
								Editar datos del club
							</blockquote>
							<form action= "Controllers/editclub.php" method="post">
								<input type="hidden" name="id_club" value="<?php echo $idClub ?>">
								<div class="input-field col s4 m10">
									<input name="name" type="text">
									<label>Nombre</label>
								</div>
								<div class="input-field col s4 m10">
									<input name="desc" type="text">
									<label>Descripcion</label>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<button class="btn waves-effect #d32f2f red darken-2" type="submit" name="edit">
											Editar
											<i class="material-icons right">mode_edit</i>
										</button>
									</div>
								</div>
							</form>
							<br>
							<form enctype="multipart/form-data" action="Controllers/changeImage.php" method="POST">
							<input type="hidden" name="id_club" value="<?php echo $idClub ?>">
								<blockquote>
									Cambiar Logo del Club
								</blockquote>
								<div class="file-field input field"> 
									<a class="btn waves-effect #d32f2f red darken-2"><i class="material-icons">add_a_photo</i>
										<input type="file" name="upload">
									</a>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>

								<div class="col m10 ofset-2">
									<button class="btn waves-effect #d32f2f red darken-2 right" type="submit" name="action">
										Subir
										<i class="material-icons right">cloud_upload</i>
									</button>
								</div>   

							</form>
						</div>
					</div>
				</div>
				<div class="col m8 s12">
					
						<div class="row">
							<div class="col s12 m12">
								<blockquote class="flow-text">
									Ubicacion
								</blockquote>

								<div id="map" class="right"></div>
							</div>
						</div>
					
					<script>

						function initMap() {

							var lat = <?php echo $lat; ?>;
							var lon = <?php echo $lon; ?>;

							var myLatLng = {lat: lat, lng: lon};

							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 15,
								center: myLatLng
							});

							var marker = new google.maps.Marker({
								position: myLatLng,
								map: map,
								title: 'Hello World!'
							});
						}
					</script>
					<script async defer
					src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMo_CyDETnwbjJOLzW_X85lNP5i-U9IRs&callback=initMap">
				</script>




				<div class="card">

					<blockquote class="flow-text">
						Reuniones
					</blockquote>
					<table class="striped">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Lugar</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$sqlReunion = 'SELECT date_format(FECHA_REUNION, "%d %b %Y"), date_format(FECHA_REUNION,"%h:%i %p"), LUGAR_REUNION  FROM REUNION WHERE ID_CLUB = '.$idClub.' ORDER BY 1 DESC';

							$executeReunion = $conn->query($sqlReunion);
							while ($rowReunion = mysqli_fetch_row($executeReunion)) {

								$dia = $rowReunion[0];
								$hora = $rowReunion[1];
								$Lugar = $rowReunion[2];

								echo "<tr>";
								echo "<td>".$dia."</td>";
								echo "<td>".$hora."</td>";
								echo "<td>".$Lugar."</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>

					<div class="card-content">
						<span class="card-title activator btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></span>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">Agregar Reunion<i class="material-icons right">close</i></span>

						<form action= "Controllers/addMeeting.php" method="POST">
							<input type="hidden" name="id_club" value="<?php echo $idClub ?>">
							<div class="input-field col s4">
								<input name="place" value="" type="text" required>
								<label>Lugar</label>
							</div>
							<div class="input-field col s4">
								<input type="date" class="datepicker" name="date" required>
							</div>
							<div class="input-field col s4">
								<input name="hour" class="timepicker" type="time" required>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<button class="btn btn-large waves-effect #d32f2f red darken-2" type="submit" name="action">
										Agregar
										<i class="material-icons right">send</i>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


		</div>
	</div>

	<?php 

}else {

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
