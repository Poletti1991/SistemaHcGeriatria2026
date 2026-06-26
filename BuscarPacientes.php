<?php
session_start();

if ($_SESSION['valor'] != true) {	
	header('Location: index.html');
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Busqueda</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main (2).css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript (2).css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
<H1>Buscar una historia clinica especifica: </h1></br>
								<form action="#" method="post">	
                                <div id="fade-box">
								<input type="text" name="DNI" id="dni" placeholder="DNI" required></br>
								<button>Realizar Búsqueda</button>
								</form>
<div class="inner">
</br></br></br>	<h1>Paciente<h1>


					</div>								
<div class="container">

   <div class="col-4 col-12-small">							
<?php 
include "conectar.php";//conectar a la base de dato
$DNI=$_POST ['DNI'];
 if(is_numeric($DNI)){
$verificar_usuario=mysql_query("SELECT *
		FROM historia_clinica
		WHERE  dni LIKE '$DNI'");
}
//if
	//(is_string($DNI)){ 
	//echo "<b>El DNI ingresado contiene caracteres no numericos.</b>";
	//} 			

elseif (is_string($DNI)){
$verificar_usuario=mysql_query("SELECT *
		FROM historia_clinica
		WHERE  nombre_apellido LIKE '%$DNI%'");
}  

		




$long= strlen($nombre);
$i=5;
while ($articulo= mysql_fetch_array($verificar_usuario)){
	$substr=$articulo['id_paciente'];
	$substr1=$articulo['nombre_apellido'];
	$substr2=$articulo['dni'];
	$substr3=$articulo['domicilio'];
	$substr4=$articulo['	edad'];
	$substr5=$articulo['ocupacion'];
	$substr6=$articulo['obra_social'];
	$substr7=$articulo['motivo_de_consulta'];
	$substr8=$articulo['vive_con'];
	$substr9=$articulo['contencion'];
	$substr10=$articulo['que_contencion_tiene'];
	$substr11=$articulo['	fecha'];
	$substr12=$articulo['file_name'];
	$i=$i+1;
	echo "<form  method='post' action='HCPdf.php' id='search'>";
	echo "<tr><td><input class='button$i' name='id' type='submit' value='$substr' /></td><td>  $substr2  </td><td> - $substr1  </td></tr>";
	echo "</form><br/>";	
	
}
?></div></div>								
								
								
								
								
								</div>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="menu.php">Principal</a></li>
							<li><a href="cerrar_sesion.php">cerrar sesion</a></li>
							
							<li><a href="InformePacientes.php">Cargar Informes Pacientes</a></li>							
							<li><a href="CargarHC.php">Cargar Historias Clinicas</a></li>
							
							<li><a href="ModificarHC.php">Modificar Historias Clinicas</a></li>
						
							<li><a href="AdministrarTurnos.php">Administrar Turnos</a></li>
							
							<li><a href="Informe2Pacientes.php">Ver Informes Pacientes</a></li>
							<li><a href="BuscarPacientes.php">Buscar/Listar H.C. Pacientes</a></li>							
										
							<li><a href="AgregarEvolucion.php">Evolucion</a></li>
							<li><a href="AgregarPendientes.php">Pendientes</a></li>
							
							
							<li><a href="escalas.php">Calcular Escalas</a></li>
															<!--<li><a href="AgregarPendientes.html">Agregar Pendientes</a></li>-->
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						
					
</div>
					
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>