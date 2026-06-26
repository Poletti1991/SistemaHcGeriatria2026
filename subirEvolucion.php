<?php
include "conectar.php";
include_once "ValidadorEvolucion.php";

// Validar datos antes de procesar
$errores = ValidadorEvolucion::validar($_POST);
if (count($errores) > 0) {
	$mensajeErrores = "Errores de validacion:\\n - " . implode("\\n - ", $errores);
	echo "<script>
			alert('$mensajeErrores');
			window.history.back();
		</script>";
	exit();
}

$dn= $_POST ['dni'];
$tip= $_POST ['evolucion'];
$fecha= $_POST ['fecha'];
		
$Sql="INSERT INTO   evolucion (dni, evo_paciente, updated_at) VALUES ('$dn','$tip','$fecha')";	 
if(!$resultado = mysql_query($Sql)){ 
	echo "<b>Los Datos no fueron cargados.</b>";
	die(mysql_error($conn)."Error al tratar de guardar");
} 					
mysql_close($conn);
echo "<script>
		alert('Se guardo con exito.');
		window.location= 'AgregarEvolucion.php'
		</script>";

?>