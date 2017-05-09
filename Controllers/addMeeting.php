<?php 
session_start();
include_once "Connect.php";

if (isset($_POST['id_club']) AND isset($_POST['place']) AND isset($_POST['date']) AND isset($_POST['hour']) ) {
	
	$idClub = $_POST['id_club'];
	$date = $_POST['date'];
	$hour = $_POST['hour'];
	$place = $_POST['place'];

	$date_time = $date." ".$hour;

	$sqlAddMeeting = 'INSERT INTO REUNION VALUES (null, '.$idClub.', "'.$date_time.'", "'.$place.'" )';	
	$conn->query($sqlAddMeeting);

}
echo "<meta http-equiv='refresh' content='0;URL=../motoclub.php' />";
 ?>
