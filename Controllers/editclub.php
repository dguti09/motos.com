<?php 
session_start();
include_once "Connect.php";


if (isset($_POST['id_club'])) {
	$idClub = $_POST['id_club'];

}else{
	echo "<meta http-equiv='refresh' content='0;URL=../motoclub.php' />";
}

if (isset($_POST['name']) AND $_POST['name'] != "" ) {
	$name = $_POST['name'];
	$sqlUpdateName = 'UPDATE CLUB SET NOMBRE_CLUB = "'.$name.'" WHERE ID_CLUB = '.$idClub;
	$conn->query($sqlUpdateName);
	//echo $sqlUpdateName;


}if (isset($_POST['desc']) AND $_POST['desc'] != "" ) {
	$desc = $_POST['desc'];
	$sqlUpdateDesc = 'UPDATE CLUB SET DESCRIPCION = "'.$desc.'" WHERE ID_CLUB = '.$idClub;
	$conn->query($sqlUpdateDesc);
	//echo "<Br>".$sqlUpdateDesc;
}
echo "<meta http-equiv='refresh' content='0;URL=../motoclub.php' />";

?>