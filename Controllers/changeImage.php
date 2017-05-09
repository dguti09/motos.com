<?php
include_once "Connect.php";
if (isset($_POST['id_club'])) {

	$id_club = $_POST['id_club'];

	$uploadedfile_size = $_FILES['upload']['size'];
	$targetFile = '../Images/';
	$targetFile = $targetFile. $_FILES['upload']['name'];


	$auxurl = 'http://localhost/motos.com/Images/';
	$auxurl = $auxurl. $_FILES['upload']['name'];

	$sql = 'UPDATE CLUB SET LOGO_CLUB = "'.$auxurl.'" WHERE ID_CLUB='.$id_club;

	if ($uploadedfile_size<4000000){
		echo "tam";
		if (($_FILES['upload']['type'] =="image/pjpeg" OR $_FILES['upload']['type'] =="image/png" OR $_FILES['upload']['type'] =="image/jpeg")) {
			echo "tipo archvo";
			if(move_uploaded_file ($_FILES['upload']['tmp_name'], $targetFile)){
				echo "Subir archivo";
				if ($conn->query($sql) === TRUE) {
					echo "Ha sido subido satisfactoriamente";
				} else {
					echo "Error " . $conn->error;
				}



			}

		}

	}


}
echo "<meta http-equiv='refresh' content='0;URL=../motoclub.php' />";

?>