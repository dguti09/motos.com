<?php
include_once 'config.php';
$sqlEvent = 'SELECT * FROM EVENTO e, CIUDAD c, DEPARTAMENTO d WHERE c.ID_CIUDAD = e.ID_CIUDAD AND c.ID_DEPARTAMENTO = d.ID_DEPARTAMENTO';
$queryEvent = $conn->query($sqlEvent);
while ($rowEvent = mysqli_fetch_row($queryEvent)) {
	$event[] = array(
		'ciudad' => $rowEvent[10],
		'departamento' => $rowEvent[12],
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