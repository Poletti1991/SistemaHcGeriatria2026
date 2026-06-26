<?php
include "conectar.php";
include_once "ValidadorTurno.php";

// Validar datos antes de procesar
$errores = ValidadorTurno::validar($_POST);
if (count($errores) > 0) {
	$mensajeErrores = "Errores de validacion:\\n - " . implode("\\n - ", $errores);
	echo "<script>
			alert('$mensajeErrores');
			window.history.back();
		</script>";
	exit();
}

$dn= $_POST ['dni'];
$nom= $_POST ['nombre'];
$fecha= $_POST ['fecha'];//ok
$hora= $_POST ['hora'];//ok
		
$Sql="CALL RegistrarTurno('$fecha','$hora','$dn','$nom')";	 
if(!$resultado = mysql_query($Sql)){ 
	echo "<b>Los Datos no fueron cargados.</b>";
	die(mysql_error($conn)."Error al tratar de guardar");
} 					
mysql_close($conn);
echo "<script>
		alert('Se guardo con exito.');
		window.location= 'AdministrarTurnos.php'
		</script>";

?>