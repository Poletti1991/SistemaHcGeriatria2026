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
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="InformePacientes.php">
										<h2>Cargar Informes Medicos</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="CargarHC.php">
										<h2>Cargar Historias Clinicas</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="ModificarHC.php">
										<h2>Modificar Historias Clinicas</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="AdministrarTurnos.php">
										<h2>Administar Turnos</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="BuscarPacientes.php">
										<h2>Buscar Pacientes / Listar Pacientes</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="Informe2Pacientes.php">
										<h2>Ver Informes Medicos</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>							
                                   
                                      
								 <article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="AgregarEvolucion.php">
										<h2>Evolucion</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="AgregarPendientes.php">
										<h2>Agregar Pendientes</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>
 								<article class="style5">
									<span class="image">
										<img src="images/pic05.jpg" alt="" />
									</span>
									<a href="escalas.php">
										<h2>Calcular Escalas</h2>
										<div class="content">
											<p></p>
										</div>
									</a>
								</article>								
							</section>
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