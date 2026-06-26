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

							<H1>Ver los informes especificos de: </h1></br>
								<form action="#" method="post">	
                                <div id="fade-box">
								<input type="text" name="DNI" id="dni" placeholder="DNI" required></br>
								<label for="name">Tipo de Informe: </label>
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
									</select></br><button>Buscar Informes</button>
								</form>
								</div>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menú</a></li>
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
										
							<li><a href="AgregarEvolucion.php">Evolución</a></li>
							<li><a href="AgregarPendientes.php">Pendientes</a></li>
							
							
							<li><a href="escalas.php">Calcular Escalas</a></li>
															<!--<li><a href="AgregarPendientes.html">Agregar Pendientes</a></li>-->
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<h1>Opcion de Informes</h1>

						
						</div>
					</div>
</div><div class="contenedor_galeria">
<!-- GALERIA -->
				
<?php 
include "conectar.php";
$dni= $_POST ['DNI'];
$tipo= $_POST ['tipo'];
$aux=0;
		    	 	
if($dni != ''){//Hacemos la consulta
	echo"<table>";
$verificar_usuario=mysql_query("SELECT file FROM  informes WHERE dni like '$dni' and tipo like '$tipo' ");

while ($cancion= mysql_fetch_array($verificar_usuario)){
	$imag=$cancion['file'];
	if(stristr($imag, '.jpg')) {
		echo "<tr align= 'center'><td>$imag</td><td><a target='_blank' href='informes/$imag'>
<img src='informes/$imag' alt= 'Foto' class='galeria__img' width= '200px' height='133px' margin-botton='30px'>
</a></td>";
	}elseif (stristr($imag, '.jpeg')) {
echo "<tr align= 'center'><td>$imag</td><td><a target='_blank' href='informes/$imag'>
<img src='informes/$imag' alt= 'Foto' class='galeria__img' width= '200px' height='133px' margin-botton='30px'>
</a></td>";
	} elseif(stristr($imag, '.npg')) {
echo "<tr align= 'center'><td>$imag</td><td><a target='_blank' href='informes/$imag'>
<img src='informes/$imag' alt= 'Foto' class='galeria__img' width= '200px' height='133px' margin-botton='30px'>
</a></td>";
	}else{
		echo "<tr align= 'center'><td>$imag</td><td><a target='_blank' href='informes/$imag'>
<img src='images/otros.jpg' alt= 'Foto' class='galeria__img' width= '200px' height='133px' margin-botton='30px'>
</a></td>";
	}
	
	
	

	$aux = $aux+1;
}
if ($aux<1){
echo"<b>No se encontro resultado a la busqueda...</b>";
	}
	echo"</table>";
}

mysql_close($conn);
?>
					
					
		</div>			

			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>