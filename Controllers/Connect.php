<?php 
	$conn = mysqli_connect("localhost", "root", "", 'juan_motos');
	if (!$conn->set_charset("utf8")) {
	    //printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
	    exit();
	} 
	if (!$conn) {
	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
?>