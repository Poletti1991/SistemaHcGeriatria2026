<?php
include "conectar.php";
$dn= $_POST ['dni'];
$nom= $_POST ['nombre'];
$fecha= $_POST ['fecha'];//ok
$hora= $_POST ['hora'];//ok
		
$Sql="INSERT INTO   turnos (fecha_turno, hora_turno, dni, nombre) VALUES ('$fecha','$hora','$dn','$nom')";	 
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