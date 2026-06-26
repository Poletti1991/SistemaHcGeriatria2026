<?php
include "conectar.php";
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