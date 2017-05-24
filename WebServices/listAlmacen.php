<?php
include_once 'config.php';
$sqlAlmacen = 'SELECT *,
				if (TIPO_ALMACEN = "T", "Taller", "Almacen")
				FROM ALMACEN a, CIUDAD c 
				WHERE a.ID_CIUDAD = c.ID_CIUDAD';
$queryAlmacen = $conn->query($sqlAlmacen);
while ($rowAlmacen = mysqli_fetch_row($queryAlmacen)) {
	$Almacen[] = array(
		'ciudad' => $rowAlmacen[8],
		'tipo' => $rowAlmacen[9],
		'direccion' => $rowAlmacen[3],
		'telefono' => $rowAlmacen[4],  
		'responsable' => $rowAlmacen[5],  
		);
}
echo json_encode($Almacen, JSON_UNESCAPED_UNICODE);
?>