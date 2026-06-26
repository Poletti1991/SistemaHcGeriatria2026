<?php
$dbhost='190.210.186.124';
$dbuser='hcge';
$dbpass='hcgeriatria';
$bd='pacientes';

$conn = mysql_connect($dbhost,$dbuser,$dbpass,$db);
if (!$conn) {
	echo "Error conectando a la base de datos.";
	exit();
	//die ('Error al conectar con MySQL: '. mysql_error());//mustra la utlima operacion que fallo o murio
}

$db = mysql_select_db($bd);
if (!$db) {
	echo "Error seleccionando la base de datos.";
	exit();
	//die ('Error al seleccionar la base de datos: '. mysql_error($conn));//mustra la utlima operacion que fallo o murio
}


function tiondbquery($query){
	global $conn;
	$resultado = mysql_query($query);
	if (!$resultado) {		
		die ('Error al ejecutar la consulta SQL: ' . mysql_error($conn));//mustra la utlima operacion que fallo o murio
	}
	return $resultado;
}
?>