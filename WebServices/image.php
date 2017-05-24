<?php
include_once 'config.php';
if (isset($_FILES['upload'])) {

	if (isset($_REQUEST['name'])) {
			
	$obj =  array('validate' => $_FILES['upload']['name'].' + '.$_REQUEST['name']);
}

}else{

	$obj =  array('validate' => 'FALSE');

}
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
?>