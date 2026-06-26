<?php
include "conectar.php";
$dn= $_POST ['DNI'];
$tip= $_POST ['evolucion'];
$fecha= $_POST ['fecha'];
		
$Sql="INSERT INTO   pendientes (dni, pendiente, fecha) VALUES ('$dn','$tip','$fecha')";	 
if(!$resultado = mysql_query($Sql)){ 
	echo "<b>Los Datos no fueron cargados.</b>";
	die(mysql_error($conn)."Error al tratar de guardar");
} 					


mysql_close($conn);
echo "<script>
		alert('Se guardo con exito.');
		window.location= 'AgregarPendientes.php'
		</script>";

?>