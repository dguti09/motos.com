<?php
include_once 'config.php';

$sqlSelectRoad = 'SELECT *, DATE_FORMAT(HORA_ENCUENTRO,"%r") FROM RODADA';
$resultQuery = $conn->query($sqlSelectRoad);

while ($rowRoad = mysqli_fetch_row($resultQuery)) {
		$origen = $rowRoad[2];
		$destino  = $rowRoad[3];



$sqlcity = 'SELECT * FROM CIUDAD WHERE ID_CIUDAD = '.$origen;
$resultCity = $conn->query($sqlcity);
while ($rowCity = mysqli_fetch_row($resultCity)) {
	$cityOrigin = $rowCity[2];
}

$sqlcity = 'SELECT * FROM CIUDAD WHERE ID_CIUDAD = '.$destino;
$resultCity = $conn->query($sqlcity);
while ($rowCity = mysqli_fetch_row($resultCity)) {
	$cityDest = $rowCity[2];
}

	$road[] = array(
		'origen' => $cityOrigin,
		'destino' => $cityDest,
		'nombre' => $rowRoad[4],
		'salida' => $rowRoad[5],
		'regreso' => $rowRoad[6],
		'lugar' => $rowRoad[7],
		'hora' => $rowRoad[10],
		'presupuesto' => $rowRoad[9]
		);



}

echo json_encode($road, JSON_UNESCAPED_UNICODE);
?>