<?php
include "conectar.php";//conectar a la base de dato
$nombre= $_POST ['username'];
$pass = $_POST['pass'];
$aux=0;

if ($nombre=='' || $pass=='') {
	header('Location: index.html'); 
}
else {
	$res= mysql_query("SELECT * FROM  users".!$conn );	 
	while ($usuario= mysql_fetch_array($res)){	
		if ($nombre == $usuario['name'] && sha1($pass) == $usuario['password']) {		
				session_start();
				$_SESSION['valor'] = true;
				$_SESSION['nombre'] = $nombre;
				$aux=$aux+1;
				header('Location: menu.php');				
			}	
	}	
}
if($aux==0){
	echo "<script>
                alert('Usuario/Contraseña Invalido/a');
                window.location= 'index.html'
    </script>";
}
?>

  	 	 
		    	 	