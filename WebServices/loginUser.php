<?php
include_once 'config.php';
if (isset($_REQUEST['email']) AND isset($_REQUEST['pass'])) {

	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];

	

	$sqlSearchUser = 'SELECT * FROM MIEMBRO WHERE CORREO_MIEMBRO = "'.$email.'"';
	$resultUser = $conn->query($sqlSearchUser);

	while ($rowUser = mysqli_fetch_row($resultUser)){
		
		$passHash = $rowUser[4];
		$user_name = $rowUser[2];
	}

	if (password_verify($pass, $passHash)) {

		$obj  =  array('validate' =>  $user_name);

	}else{

		$obj  =  array('validate' =>  'FALSE');
	}
}else{
	$obj  =  array('validate' =>  'FALSE');
}

$json = json_encode($obj);
echo $json;
?>