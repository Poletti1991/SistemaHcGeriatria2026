<?php
include "conectar.php";
$dn= $_POST ['dni'];
$tip= $_POST ['evolucion'];
$fecha= $_POST ['fecha'];

$query ="UPDATE evolucion SET evo_paciente = '$tip' WHERE id = $dn";
$resultado = mysql_query($query);
mysql_close($conn);
echo "<script>
		alert('Se guardo con exito.');
	window.location= 'AgregarEvolucion.php'
		</script>";