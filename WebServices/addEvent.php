<?php
include_once 'config.php';

if (isset($_REQUEST['ciudad']) AND isset($_REQUEST['fecha_inicio']) AND isset($_REQUEST['fecha_fin']) AND isset($_REQUEST['lugar']) AND isset($_REQUEST['valor']) AND isset($_REQUEST['descripcion']) ) {


	$city = $_REQUEST['ciudad']; 
	$inicio = $_REQUEST['fecha_inicio']; // Formato = yyyy-mm-dd
	$fin = $_REQUEST['fecha_fin']; // Formato = yyyy-mm-dd
	$lugar = $_REQUEST['lugar'];
	$valor = $_REQUEST['valor'];
	$descripcion = $_REQUEST['descripcion'];
	//$archivo = $_FILES['upload'];

	$sqlDept ='SELECT * FROM CIUDAD WHERE CIUDAD like "%'.$city.'%"';
	$resultDept = $conn->query($sqlDept);
	while ($rowdept = mysqli_fetch_row($resultDept)) {
		$department = $rowdept[0];
	}

	if (isset($_FILES['upload'])) {

		$uploadedfile_size = $_FILES['upload']['size'];
		$targetFile = '../Images/';
		$targetFile = $targetFile. $_FILES['upload']['name'];

		$auxurl = 'http://knowlinemieds.com/Images/';
		$auxurl = $auxurl. $_FILES['upload']['name'];

		$sqlInsert = 'INSERT INTO EVENTO(ID_CIUDAD, URL_LOGO_EVENTO, FECHA_INICIO, FECHA_FIN, LUGAR_EVENTO, VALOR_ENTRADA, DESCRIPCION_EVENTO) VALUES ("'.$department.'", "'.$auxurl.'", "'.$inicio.'", "'.$fin.'", "'.$lugar.'", '.$valor.', "'.$descripcion.'")';

		if ($uploadedfile_size<4000000){
		//echo "tam";
			if(move_uploaded_file ($_FILES['upload']['tmp_name'], $targetFile)){

				$obj = ($conn->query($sqlInsert) === TRUE) ? 'TRUE' : 'FALSE' ;

			}else{
				$obj =  array('validate' => 'FALSE');
			}
		}else{
			$obj =  array('validate' => 'FALSE');
		}
		
	}else{
		$obj =  array('validate' => 'FALSE');
	}
}else{
	$obj =  array('validate' => 'FALSE');
}
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
?>