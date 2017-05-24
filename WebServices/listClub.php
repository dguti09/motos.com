<?php
include_once 'config.php';

$sqlSelectClub = 'SELECT ID_CLUB, X(UBICACION), Y(UBICACION), NOMBRE_CLUB, LOGO_CLUB, DESCRIPCION FROM CLUB';
$resultClub = $conn->query($sqlSelectClub);

while ($rowClub = mysqli_fetch_row($resultClub)) {
	
	$club[] = array(
		'id_club' =>  $rowClub[0],
		'latitud' => $rowClub[1],
		'longitud' => $rowClub[2],
		'nombre_club' => $rowClub[3],
		'logo_club' => $rowClub[4],
		'descripcion' => $rowClub[5]
		);
}

echo json_encode($club, JSON_UNESCAPED_UNICODE);
?>