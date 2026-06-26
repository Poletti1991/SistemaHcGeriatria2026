<?php
include "conectar.php";
$dn= $_GET ['x2'];
$sSQL="Delete From pendientes Where  id = '$dn'";
mysql_query($sSQL);mysql_close($conn);
mysql_close($conn);
echo "<script>
		alert('Se guardo con exito.');
		window.location= 'AgregarPendientes.php'
		</script>";
?>
