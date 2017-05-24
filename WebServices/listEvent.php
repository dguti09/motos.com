<?php
include_once 'config.php';
$sqlEvent = 'SELECT * FROM EVENTO e, DEPARTAMENTO d WHERE d.ID_DEPARTAMENTO=e.ID_DEPARTAMENTO';
$queryEvent = $conn->query($sqlEvent);
while ($rowEvent = mysqli_fetch_row($queryEvent)) {
	$event[] = array(

		'departamento' => $rowEvent[9],
		'url_logo' => $rowEvent[2],
		'fecha_inicio' => $rowEvent[3],  
		'fecha_fin' => $rowEvent[4],  
		'lugar' => $rowEvent[5],  
		'valor' => $rowEvent[6], 
		'descripcion' => $rowEvent[7] 
		);
}
echo json_encode($event, JSON_UNESCAPED_UNICODE);
?>