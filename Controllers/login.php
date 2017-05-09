<?php 
session_start();
include_once "Connect.php";
$email = $_POST['username'];
$password = $_POST['password'];

$sqlGetMiembro = 'SELECT * FROM MIEMBRO WHERE CORREO_MIEMBRO = "'.$email.'"';

$executeGetMiembro = $conn->query($sqlGetMiembro);

if ($executeGetMiembro->num_rows > 0) {
	$rowMiembro = mysqli_fetch_array($executeGetMiembro);

	$typeMiembro = $rowMiembro['TIPO_MIEMBRO'];
	$password_miembro = $rowMiembro['PASSWORD_MIEMBRO'];
	$id_club = $rowMiembro['ID_CLUB'];
	$user_name = $rowMiembro['NOMBRE_MIEMBRO'];
	$idMmiembro = $rowMiembro['ID_MIEMBRO'];

	if (password_verify($password, $password_miembro) AND $typeMiembro== 'A') {

		$_SESSION['loggedin'] = true;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (15 * 60);

		echo var_dump($id_club);

		if ($id_club == null) {
			$_SESSION['id_miembro'] = $id_miembro;
			$_SESSION['user_name'] = $user_name;
			echo "<meta http-equiv='refresh' content='0;URL=../addClub.php' />";
		}else{

			$_SESSION['id_club'] = $id_club;
			$_SESSION['user_name'] = $user_name;
			echo "<meta http-equiv='refresh' content='0;URL=../motoclub.php' />";
		}

	}else{
		echo "Username o Password estan incorrectos.";
		echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
	}

}else{
	echo "Username o Password estan incorrectos.";
	echo "<br><a href='../index.php'>Volver a Intentarlo</a>";
}
?>

