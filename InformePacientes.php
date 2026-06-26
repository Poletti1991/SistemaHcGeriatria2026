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
		<title>Informes</title>
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

							<!-- Logo 
								<a href="index.html" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">.</span>
								</a>-->

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
						<h1>Cargar archivos de los pacientes</h1>
							<form action="subirInforme.php" enctype="multipart/form-data" action="uploader.php" method="POST">
                             <input type="file" name="archivo1" id="archivo1" /></br>
                       		 <input type="file" name="archivo2" id="archivo2" /></br>
                  			 <input type="file" name="archivo3" id="archivo3" /></br>
           					 <input type="file" name="archivo4" id="archivo4" /></br>
   							 <input type="file" name="archivo5" id="archivo5" /></br>
                         
						 <p>Seleccionar el paciente al que pertenece el archivo     </p></br>
									
                               <div id="fade-box">
								<input type="text" name="dni" id="dni"  placeholder="DNI" required></br>
								<label for="name">Seleccionar Tipo de Informe: </label>
									<select name="tipo">
									     <option>Laboratorio</option>
									     <option>Cardio</option>
									     <option>Neumo</option>
									     <option>Gastro</option>
									     <option>Neuro</option>
									     <option>Traumato</option>
									     <option>Dermato</option>
									     <option>Gineco</option>
									     <option>Urologia</option>
                                    <option>Oncologia</option>
									     <option>Otros</option>
									</select></br>
								<button>Guardar</button>
								</form>
					 										

			</div>
</div>
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

						<script type="text/javascript">

		


			</script>

	</body>
</html>
				