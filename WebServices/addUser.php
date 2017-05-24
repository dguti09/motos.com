<?php
include_once 'config.php';

if (isset($_REQUEST['id_club']) AND isset($_REQUEST['user_name']) AND isset($_REQUEST['email_user']) AND isset($_REQUEST['pass']) AND $_REQUEST['phone_user'] != 'null') {
	
	$club = $_REQUEST['id_club'];
	$user = $_REQUEST['user_name'];
	$email = $_REQUEST['email_user'];
	$pass = $_REQUEST['pass'];
	$phone = $_REQUEST['phone_user'];

	$passHash = password_hash($pass, PASSWORD_DEFAULT);

	$sqlInsertUser = 'INSERT INTO MIEMBRO VALUES ( null,'.$club.', "'.$user.'", "'.$email.'", "'.$passHash.'", "'.$phone.'", "N")';


	$return = ($conn->query($sqlInsertUser) === TRUE) ? 'TRUE' : 'FALSE' ;

	$obj =  array('validate' => $return);


}elseif (isset($_REQUEST['id_club']) AND isset($_REQUEST['user_name']) AND isset($_REQUEST['email_user']) AND isset($_REQUEST['pass']) AND $_REQUEST['phone_user'] == 'null' ) {

	$club = $_REQUEST['id_club'];
	$user = $_REQUEST['user_name'];
	$email = $_REQUEST['email_user'];
	$pass = $_REQUEST['pass'];
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	$sqlInsertUser = 'INSERT INTO MIEMBRO VALUES ( null,'.$club.', "'.$user.'", "'.$email.'", "'.$passHash.'", null, "N")';


	$return = ($conn->query($sqlInsertUser) === TRUE) ? 'TRUE' : 'FALSE' ;

	$obj =  array('validate' => $return);


}else{

	$obj =  array('validate' => 'FALSE');

	
}

$json = json_encode($obj);
echo $json;

?>

