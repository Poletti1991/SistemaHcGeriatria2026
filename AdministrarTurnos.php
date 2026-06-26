<?php
session_start();

if ($_SESSION['valor'] != true) {	
	header('Location: index.html');
}

$hoy = date('Y-m-d');
$min = '2019-01-01';
$max = (date('Y') + 10) . '-12-31';  // permite hasta fin de (año actual + 10)

$hoy = date('Y-m-d');
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Turnos</title>
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
							<!-- 	<a href="index.html" class="logo">
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
						<div class="inner ">
							<h1>Turnos</h1>
							  <form action="subirTurno.php" method="post">	
    <div id="page">
	<p>Seleccione una fecha para el turno</p>
<input type="date" name="fecha" step="1" min="<?php echo $min; ?>" max="<?php echo $max; ?>" value="<?php echo $hoy; ?>">
	  <br />
	  <p>Seleccione el Horario</p>
	  <select name="hora" id="Hs" required style="background-color: #1e293b; color: #fff; border: 1px solid #334155; border-radius: 4px; padding: 10px; width: 100%;">
          <option value="">-- Seleccionar Horario --</option>
          <optgroup label="Turno Mañana (08:00 - 12:30)" style="color: #c084fc; font-weight: bold;">
              <option value="08:00">08:00 hs</option>
              <option value="08:30">08:30 hs</option>
              <option value="09:00">09:00 hs</option>
              <option value="09:30">09:30 hs</option>
              <option value="10:00">10:00 hs</option>
              <option value="10:30">10:30 hs</option>
              <option value="11:00">11:00 hs</option>
              <option value="11:30">11:30 hs</option>
              <option value="12:00">12:00 hs</option>
              <option value="12:30">12:30 hs</option>
          </optgroup>
          <optgroup label="Turno Tarde (16:00 - 20:30)" style="color: #38bdf8; font-weight: bold;">
              <option value="16:00">16:00 hs</option>
              <option value="16:30">16:30 hs</option>
              <option value="17:00">17:00 hs</option>
              <option value="17:30">17:30 hs</option>
              <option value="18:00">18:00 hs</option>
              <option value="18:30">18:30 hs</option>
              <option value="19:00">19:00 hs</option>
              <option value="19:30">19:30 hs</option>
              <option value="20:00">20:00 hs</option>
              <option value="20:30">20:30 hs</option>
          </optgroup>
	  </select>
	  <br /><br />
	  	<p>Ingrese el DNI de un paciente</p>
	  <input type="text" name="dni" id="dni" placeholder="(*)DNI" required> <br />
	  <p>Ingrese el Apellido y Nombre de un paciente</p>
	  <input type="text" name="nombre" id="nombre" placeholder="Apellido y Nombre" > <br />         
 <button>Asignar Turnos</button> 
        </div>
      </form><br/><br/>

<h1>Lista de Turnos:</h1>

<?php 
include "conectar.php";//conectar a la base de dato

// Obtener la fecha seleccionada para filtrar (por defecto es hoy)
$fecha_filtro = isset($_GET['fecha_filtro']) ? $_GET['fecha_filtro'] : date('Y-m-d');
?>

<!-- Formulario interactivo de filtro por fecha -->
<form method="GET" action="AdministrarTurnos.php" style="margin-bottom: 25px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap; background-color: #1e293b; padding: 15px; border-radius: 8px; border: 1px solid #334155; width: 100%;">
    <span style="color: #94a3b8; font-weight: 600; font-size: 0.95rem;">Filtrar por fecha:</span>
    <input type="date" name="fecha_filtro" value="<?php echo $fecha_filtro; ?>" onchange="this.form.submit()" style="background-color: #0f172a; color: #fff; border: 1px solid #334155; border-radius: 4px; padding: 8px 12px; font-family: inherit;">
    <a href="AdministrarTurnos.php" style="background: linear-gradient(135deg, #8b5cf6, #c084fc); color: #fff; padding: 8px 16px; border-radius: 4px; text-decoration: none; font-size: 0.9rem; font-weight: bold; text-align: center; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">Ver Hoy</a>
</form>

<?php
// Obtener solamente los turnos del día filtrado llamando al Procedimiento Almacenado
$verificar_usuario = mysql_query("CALL ObtenerTurnosPorFecha('$fecha_filtro')");
$aux = 0;

echo '<div style="overflow-x: auto; margin-top: 20px;">';
echo '<table style="width: 100%; border-collapse: collapse; background-color: #1e293b; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.2); border: 1px solid #334155;">';
echo '<thead>';
echo '  <tr style="background: linear-gradient(135deg, #8b5cf6, #c084fc); color: #ffffff; text-align: left; font-weight: bold;">';
echo '      <th style="padding: 15px; border-bottom: 2px solid #334155;">Fecha</th>';
echo '      <th style="padding: 15px; border-bottom: 2px solid #334155;">Hora</th>';
echo '      <th style="padding: 15px; border-bottom: 2px solid #334155;">DNI</th>';
echo '      <th style="padding: 15px; border-bottom: 2px solid #334155;">Apellido y Nombre</th>';
echo '      <th style="padding: 15px; border-bottom: 2px solid #334155;">Estado de H.C.</th>';
echo '  </tr>';
echo '</thead>';
echo '<tbody>';

while ($articulo = mysql_fetch_array($verificar_usuario)){
	$fecha = $articulo['fecha_turno'];
	$hora = $articulo['hora_turno'];
	$dni = $articulo['dni'];
	$nombre = $articulo['nombre'];	
	$aux = $aux + 1;

	// Limpiar segundos de la hora si los tiene (ej: 09:30:00 -> 09:30)
	$hora_limpia = substr($hora, 0, 5);
	// Formatear fecha a d/m/Y
	$fecha_formateada = date('d/m/Y', strtotime($fecha));
	
	// Verificar si el paciente tiene historia clínica previa para definir el estado
	$escapedDni = mysql_real_escape_string($dni);
	$query_hc = mysql_query("SELECT id_paciente FROM historia_clinica WHERE dni = '$escapedDni' LIMIT 1");
	$es_habitual = ($query_hc && mysql_num_rows($query_hc) > 0);

	if ($es_habitual) {
		$badge_paciente = '<span style="color: #34d399; background-color: rgba(16, 185, 129, 0.15); border: 1px solid #059669; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; display: inline-block;">Habitual (Con H.C.)</span>';
		$nombre_mostrado = ($nombre != '') ? htmlspecialchars($nombre) : '<span style="color: #94a3b8; font-style: italic;">No especificado</span>';
	} else {
		$badge_paciente = '<span style="color: #c084fc; background-color: rgba(167, 139, 250, 0.15); border: 1px solid #8b5cf6; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; display: inline-block;">Nuevo (Sin H.C.)</span>';
		$nombre_mostrado = ($nombre != '') ? htmlspecialchars($nombre) : '<span style="color: #a78bfa; font-style: italic; font-weight: 600;">Paciente Nuevo</span>';
	}

	echo '<tr style="border-bottom: 1px solid #334155; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor=\'#2e3b52\'" onmouseout="this.style.backgroundColor=\'transparent\'">';
	echo '  <td style="padding: 15px; color: #f1f5f9; font-weight: 600;">' . $fecha_formateada . '</td>';
	echo '  <td style="padding: 15px; color: #c084fc; font-weight: 700;">' . $hora_limpia . ' hs</td>';
	echo '  <td style="padding: 15px; color: #94a3b8;">' . htmlspecialchars($dni) . '</td>';
	echo '  <td style="padding: 15px; color: #f1f5f9;">' . $nombre_mostrado . '</td>';
	echo '  <td style="padding: 15px;">' . $badge_paciente . '</td>';
	echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</div>';

if ($aux < 1){
	$fecha_formateada_vacia = date('d/m/Y', strtotime($fecha_filtro));
	echo '<div style="background-color: #3b82f61a; border: 1px solid #3b82f633; border-radius: 8px; padding: 15px; color: #60a5fa; margin-top: 20px; font-weight: 600; text-align: center;">';
	echo 'No se encontraron turnos registrados para el día ' . $fecha_formateada_vacia . '.';
	echo '</div>';
}

mysql_close($conn);
?>
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