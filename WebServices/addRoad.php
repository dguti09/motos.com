
<?php
include_once 'config.php';


// http://localhost/motos.com/WebServices/addRoad.php?id_miembro=1@2&ciudad_origen=tunja&ciudad_destino=tunja&nombre=prueba&f_salida=21-05-17&f_regreso=30-05-17&lug_encuentro=prueba&hora_encuentro=10:00:00&presupuesto=10000

if (isset($_REQUEST['id_miembro']) AND isset($_REQUEST['ciudad_origen']) AND isset($_REQUEST['ciudad_destino']) AND isset($_REQUEST['nombre']) AND isset($_REQUEST['f_salida']) AND isset($_REQUEST['f_regreso']) AND isset($_REQUEST['lug_encuentro']) AND isset($_REQUEST['hora_encuentro']) AND isset($_REQUEST['presupuesto']) ) {

	$email = $_REQUEST['id_miembro'];
	$origen = $_REQUEST['ciudad_origen']; //nombre -> Tunja
	$destino =  $_REQUEST['ciudad_destino']; //nombre -> Sogamoso
	$nombre = $_REQUEST['nombre'];
	$salida = $_REQUEST['f_salida']; // Formato = yyyy-mm-dd
	$regreso = $_REQUEST['f_regreso'];	// Formato = yyyy-mm-dd
	$lug_encuentro = $_REQUEST['lug_encuentro'];
	$hora_encuentro = $_REQUEST['hora_encuentro']; //Formato HH:MI:SS
	$presupuesto = $_REQUEST['presupuesto'];

	$sqlcity = 'SELECT * FROM CIUDAD where CIUDAD = "'.$origen.'"';
	$queryResult = $conn->query($sqlcity);
	while ($row = mysqli_fetch_row($queryResult)) {
		$idOrigen = $row[0];
	}

	$sqlcity = 'SELECT * FROM CIUDAD where CIUDAD = "'.$destino.'"';
	$queryResult = $conn->query($sqlcity);
	while ($row = mysqli_fetch_row($queryResult)) {
		$idDestino = $row[0];
	}

	$sqlMember = 'SELECT * FROM MIEMBRO WHERE CORREO_MIEMBRO = "'.$email.'"';
	$queryResult = $conn->query($sqlMember);
	while ($row = mysqli_fetch_row($queryResult)) {
		$id_miem = $row[0];
	}

	$hora = $salida." ".$hora_encuentro;

	$sqlInsert = 'INSERT INTO RODADA( ID_MIEMBRO, CIUDAD_ORIGEN, CIUDAD_DESTINO, NOMBRE_RODADA, FECHA_SALIDA, FECHA_REGRESO, LUGAR_ENCUENTRO, HORA_ENCUENTRO, PRESUPUESTO_RODADA) VALUES ('.$id_miem.', '.$idOrigen.', '.$idDestino.', "'.$nombre.'", "'.$salida.'", "'.$regreso.'", "'.$lug_encuentro.'", "'.$hora.'", '.$presupuesto.')';


	$return = ($conn->query($sqlInsert) === TRUE) ? 'TRUE' : 'FALSE' ;

	$obj =  array('validate' => $return);
}else{
	$obj =  array('validate' => 'FALSE');

}

$json = json_encode($obj);
echo $json;
?>
