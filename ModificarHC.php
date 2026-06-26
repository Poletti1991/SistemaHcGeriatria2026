<?php
session_start();

if ($_SESSION['valor'] != true) {	
	header('Location: index.html');
}
?>
<!DOCTYPE HTML>

<html>
	<head>
		<link rel="shortcut icon" href="images\icons\favicon.ico" /> 
		<title>Modificar Historia Clinica</title>
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

							<!-- Logo -->
								<!-- <a href="index.html" class="logo">-->
								<!-- 	<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">.</span>-->
								<H1>Buscar una Historia Clínica</h1></br>
								<form action="#" method="post">	
                                <div id="fade-box">
								<input type="text" name="DNI" id="dni" placeholder="DNI" required></br>
								<button>Seleccionar Historia Clínica</button>
								</form>
								</div>
							
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
<?php 
include "conectar.php";//conectar a la base de dato
$DNI=$_POST ['DNI'];
if(is_numeric($DNI)){
$verificar_usuario=mysql_query("SELECT *
		FROM historia_clinica
		WHERE  dni LIKE '$DNI'");
}elseif (is_string($DNI)){
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
	echo "<br/><br/><form method='post' action='MCHC.php' id='search'>";
	echo "<input class='button$i' name='id' type='submit' value='$substr' />  $substr1";
	echo "</form>";	
	
}
?>
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
						<div class="inner ">
					

															

			</div>
</div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>