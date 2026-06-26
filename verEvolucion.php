<?php
session_start();

if ($_SESSION['valor'] != true) {	
	header('Location: index.html');
}
?>
<!DOCTYPE HTML>
<!--
	
-->
<html>
	<head>
		<link rel="shortcut icon" href="images\icons\favicon.ico" /> 
		<title>Menu</title>
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
								<a href="menu.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">HC GERIATRIA</span>
								</a>

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
						<div class="inner">
							<header>
								<!--<H1>Categorias</h1><br />
								<p>Elegir una opcion del menu.</p>-->
														</header>
							<section class="tiles">
								
							</section>	
							<?php 
include "conectar.php";//conectar a la base de dato
$dn= $_GET ['x2'];
if($dn != ''){//Hacemos la consulta
$verificar_usuario=mysql_query("SELECT *
		FROM  evolucion
		WHERE  id LIKE '$dn'");

while ($articulo= mysql_fetch_array($verificar_usuario)){
	$orden=$articulo['id'];
	$fecha=$articulo['updated_at'];
	$evolucion=$articulo['evo_paciente'];	
	$aux = $aux+1;
	}
	if ($aux<1){
		echo"<b>No se encontro resultado a la busqueda...</b>";
	}

}

mysql_close($conn);
?>
						<form action="MEvolucion.php" method="post">
						<p>Introdusca las modificaciones necesarias:</p>	
						</br>
						<textarea name="evolucion" rows="10" cols="40" id="evolucion"  required><?php echo $evolucion;?></textarea>
						<div id="fade-box">
                         <input type="text" name="dni" id="dni" value="<?php echo $orden; ?>" readonly="readonly"></br>
						</div>
						<button>Guardar Modificaciones</button>
						</form>
								

				
</div></div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>