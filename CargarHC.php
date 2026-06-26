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

		<title>Cargar Historia Clinica</title>
				<link rel="shortcut icon" href="images/favicon.ico" /> 
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
						<form action="subirHC.php" enctype="multipart/form-data" action="uploader.php" method="POST">
							<h1>HISTORIA CLINICA</h1>
							  <div id="divMain" class="row" >
							 <div class="col-4 col-12-small">  
						<div id="divFileUpload">
						<p>Foto del Paciente: </p>
						 	
                <input type="file" name="archivo" id="archivo" />
            </div>
			 </div>
			<div class="col-4 col-12-small">  
            <div id="file-preview-zone" alt="" class="img-fluid" style="width:100%">
			
            </div>
        </div>
		</div>
							 
    <div id="page">
	
<input type="date" name="fecha" step="1"
       min="<?php echo $min; ?>"
       max="<?php echo $max; ?>"
       value="<?php echo $hoy; ?>">
                     <br><br>
	  <div class="container">
  <div class="row">
   <div class="col-4 col-12-small">
    <label for="name">Nombre y Apellido:</label><input type="text" name="Nombre" id="username" placeholder="Nombre y Apellido" required><br />
	   </div>
  <div class="col-4 col-12-small">
   <label for="name">DNI:</label>
	  <input type="text" name="DNI" id="dni" placeholder="DNI" required> <br />
	   </div>
  <div class="col-4 col-12-small">
   <label for="name">Domicilio:</label>
	   <input type="text" name="Domicilio" id="domicilio" placeholder="Domicilio" required> <br />
	    </div>
 
  <div class="col-4 col-12-small">
   <label for="name">Edad</label>
	   <input type="text" name="Edad" id="edad" placeholder="Edad" required> <br />
	    </div>
  <div class="col-4 col-12-small">
   <label for="name">Ocupaci&oacuten:</label>
	    <input type="text" name="Ocupacion" id="ocupacion" placeholder="Ocupacion" required> <br />
		 </div>
  <div class="col-4 col-12-small">
   <label for="name">Obra Social:</label>
		 <input type="text" name="OS" id="os" placeholder="Obra Social" required> <br />
		  </div>
 
       
	
 </div>
  </div>
   <label for="name">Motivo de Consulta:</label>
  <textarea name="motivo" rows="10" cols="40" id="motivo" placeholder="Motivo de consulta" required></textarea>
   <div class="col-4 col-12-small">
   
    <div class="col-4 col-12-small">
	 <label for="name">Vive con:</label>
      <input type="text" name="vive_con" id="vivecon" placeholder="Vive con" required> <br />
	   </div>
 <label for="name">Contenci&oacuten: </label>
<select name="conteccion">

<option>Si</option>

<option>No</option>

</select>
</br>
 </div>
  <textarea name="con" rows="10" cols="40" id="con" placeholder="Escribir que contencion tiene"></textarea>
		<h1>Antecedentes Familiares:  </H1>
		  <div class="container">
  <div class="row">
  
		 <div class="col-4 col-12-small"> 
		 <label for="name">Madre:</label>
     <input type="text" name="Madre" id="Madre" placeholder="Madre" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Padre:</label>
	  <input type="text" name="padre" id="padre" placeholder="Padre" > <br />
	   </div>
  <div class="col-4 col-12-small">
   <label for="name">Hermanos:</label>
	   <input type="text" name="hnos" id="hnos" placeholder="Hnos" > <br />
	    </div>
  <div class="col-4 col-12-small">
   <label for="name">Otros:</label>
	    <input type="text" name="otrosF" id="otrosF" placeholder="Otros" > <br />
		 </div>
 
 
  </div>
   </div>
    </div>
	<h1>Antecedentes Patologicos:  </H1>
  <div class="col-4 col-12-small">
<div class="container">
  <div class="row">
<div class="col-4 col-12-small">
<input type="checkbox" id="HTA" name="HTA">
<label for="HTA">HTA</label>
 <textarea name="hta1" rows="10" cols="40" id="hta1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="DBT" name="DBT">
<label for="DBT">DBT</label>
 <textarea name="DBT1" rows="10" cols="40" id="DBT1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="Epoc" name="Epoc">
<label for="Epoc">Epoc</label>
 <textarea name="Epoc1" rows="10" cols="40" id="Epoc1" placeholder="describir" ></textarea></br>
</div> 
<div class="col-4 col-12-small">
<input type="checkbox" id="IC" name="IC">
<label for="IC">IC</label>
 <textarea name="IC1" rows="10" cols="40" id="IC1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="IAM" name="IAM">
<label for="IAM">IAM</label>
 <textarea name="IAM1" rows="10" cols="40" id="IAM1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="Arritmia" name="Arritmia">
<label for="Arritmia">Arritmia</label>
 <textarea name="arritmia1" rows="10" cols="40" id="arritmia1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="tbco" name="tbco">
<label for="tbco">Tbco</label>
 <textarea name="tbco1" rows="10" cols="40" id="tbco1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="OH" name="OH">
<label for="OH">OH</label>
 <textarea name="oh1" rows="10" cols="40" id="oh1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="IRC" name="IRC">
<label for="IRC">IRC</label>
 <textarea name="irc1" rows="10" cols="40" id="irc1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="ACV" name="ACV">
<label for="ACV">ACV</label>
 <textarea name="acv1" rows="10" cols="40" id="acv1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="HIT" name="HIT">
<label for="HIT">HIT</label>
 <textarea name="hit1" rows="10" cols="40" id="hit1" placeholder="describir" ></textarea></br>
</div>
<div class="col-4 col-12-small">
<input type="checkbox" id="Alergias" name="Alergias">
<label for="Alergias">Alergias</label>
 <textarea name="alergias1" rows="10" cols="40" id="alergias1" placeholder="describir" ></textarea></br>
</div>
</div>
</div>
<div class="container">
  <div class="row">
  
		 <div class="col-4 col-12-small">
		  <label for="name">Cirugias+/traumas:</label>
 <input type="text" name="trauma" id="CX/traumas" placeholder="Cirugias+/traumas" > <br />
 </div>
     <div class="col-4 col-12-small">
    <label for="name">Internaciones</label>
 <input type="text" name="Internaciones" id="Internaciones" placeholder="Internaciones" > <br />
  </div>
  <div class="col-4 col-12-small">
    <label for="name">Otros:</label>
 <input type="text" name="otrosP" id="otrosP" placeholder="Otros" > <br />
  </div>
   </div>
 </div>
  	<h1>Vacunas  </H1>
	<div class="container">
  <div class="row">

   <div class="col-4 col-12-small">
     <label for="name">Gripe:</label>
 <input type="text" name="gripe" id="gripe" placeholder="Gripe" > <br />
  </div>
    <div class="col-4 col-12-small">
	  <label for="name">Neumo:</label>
 <input type="text" name="neumo" id="neumo" placeholder="Neumo" > <br />
  </div>
   <div class="col-4 col-12-small">
     <label for="name">DT:</label>
 <input type="text" name="dt" id="dt" placeholder="DT" > <br />
  </div>
  <div class="col-4 col-12-small">
    <label for="name">VZ:</label>
 <input type="text" name="vz" id="vz" placeholder="VZ" > <br />
  </div>
  
 </div></div>
 <h1>Practicas Preventivas</h1>
 <div class="container">
  <div class="row">
  
  <div class="col-4 col-12-small">
    <label for="name">Control Ginecologico/Urologico:</label>
 <input type="text" name="Control" id="Control" placeholder="Control Ginecologico/urologico" > <br />
 
  </div>
 <div class="col-4 col-12-small">
  <label for="name">PSA:</label>
 <input type="text" name="psa" id="psa" placeholder="PSA" > <br />
  </div>
   <div class="col-4 col-12-small">
    <label for="name">Mamografia:</label>
 <input type="text" name="mamo" id="mamo" placeholder="Mamografia" > <br />
  </div>
   <div class="col-4 col-12-small">
    <label for="name">VCC:</label>
 <input type="text" name="vcc" id="vcc" placeholder="VCC" > <br />
  </div>
 
   <div class="col-4 col-12-small">
    <label for="name">Auditivo:</label>
 <input type="text" name="aud" id="aud" placeholder="Auditivo" > <br />
  </div>
   
   <div class="col-4 col-12-small">
    <label for="name">BucoDental:</label>
 <input type="text" name="buco" id="buco" placeholder="BucoDental" > <br />
  </div>
   <div class="col-4 col-12-small">
    <label for="name">Visual:</label>
 <input type="text" name="vis" id="vis" placeholder="Visual" > <br />
  </div>
   </div>
    </div>
 
 <h1>Medicaci&oacuten Habitual</h1>
 <div class="container">
  <div class="row">
   <div class="col-6">
      <label for="name">1:</label>
 <input type="text" name="MedicacionHabitual1" id="MedicacionHabitual1" placeholder="1 Medicacion Habitual" > 
 </div>
  <div class="col-6">
    <label for="name">2:</label>
  <input type="text" name="MedicacionHabitual2" id="MedicacionHabitual1" placeholder="2 Medicacion Habitual" > 
  </div>
  <div class="col-6">
     <label for="name">3:</label>
   <input type="text" name="MedicacionHabitual3" id="MedicacionHabitual3" placeholder="3 Medicacion Habitual" > 
   </div>
  <div class="col-6">
      <label for="name">4:</label>
    <input type="text" name="MedicacionHabitual4" id="MedicacionHabitual4" placeholder="4 Medicacion Habitual" > 
	</div>
   <div class="col-6">
	   <label for="name">5:</label>
	 <input type="text" name="MedicacionHabitual5" id="MedicacionHabitual5" placeholder="5 Medicacion Habitual" > 
	 </div>
   <div class="col-6">
	    <label for="name">6:</label>
  <input type="text" name="MedicacionHabitual6" id="MedicacionHabitual6" placeholder="6 Medicacion Habitual" > 
  </div>
  <div class="col-6">
     <label for="name">7:</label>
   <input type="text" name="MedicacionHabitual7" id="MedicacionHabitual7" placeholder="7 Medicacion Habitual" > 
   </div>
   <div class="col-6">
      <label for="name">8:</label>
    <input type="text" name="MedicacionHabitual8" id="MedicacionHabitual8" placeholder="8 Medicacion Habitual" > 
	</div>
  <div class="col-6">
	   <label for="name">9:</label>
	 <input type="text" name="MedicacionHabitual9" id="MedicacionHabitual9" placeholder="9 Medicacion Habitual" > 
	 </div>
   <div class="col-6">
	    <label for="name">10:</label>
  <input type="text" name="MedicacionHabitual10" id="MedicacionHabitual10" placeholder="10 Medicacion Habitual" >
  </div>
  </div>
  </div>
<label for="name"> Otros:</label>
  <input type="text" name="MedicacionHabitualO" id="MedicacionHabitualO" placeholder=" Medicacion Habitual" > <br />
<h1> Enfermedad Actual:</h1>
<textarea name="MedicacionHabitualE" rows="10" cols="40" id="MedicacionHabitualE" placeholder="Enfermedad Actual" ></textarea>
   
  
<h1>Examen fisico</h1>
<div class="container">
  <div class="row">
  <div class="col-4 col-12-small">
   <label for="name">TA:</label>
 <input type="text" name="TAEx" id="TAEx" placeholder="TA" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">FC:</label>
<input type="text" name="FC" id="FC" placeholder="FC" > <br />
 </div>
  <div class="col-4 col-12-small">
   <label for="name">FR:</label>
 <input type="text" name="FR" id="FR" placeholder="Frecuencia Respiratoria" > <br />
  </div>
    <div class="col-4 col-12-small">
   <label for="name">T&#176;:</label>
 <input type="text" name="tem" id="tem" placeholder="Temperatura" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">SAT:</label>
 <input type="text" name="SAT" id="SAT" placeholder="SAT" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Peso:</label>
 <input type="text" name="KG" id="KG" placeholder="Peso" d> <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Talla:</label>
 <input type="text" name="talla" id="talla" placeholder="Talla" > <br />
  </div>
   <div class="col-4 col-12-small">
   <label for="name">Orexia:</label>
 <input type="text" name="orexia" id="orexia" placeholder="Orexia" > <br />
  </div>
   <div class="col-4 col-12-small">
   <label for="name">Diuresis:</label>
 <input type="text" name="diuresis" id="diuresis" placeholder="Diuresis" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Catarsis</label>
 <input type="text" name="catarsis" id="catarsis" placeholder="Catarsis" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Somnia:</label>
 <input type="text" name="somnia" id="somnia" placeholder="Somnia" > <br />
  </div>
 
  <div class="col-4 col-12-small">
   <label for="name">Piel:</label>
 <input type="text" name="piel" id="piel" placeholder=" Piel" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Pulsos:</label>
 <input type="text" name="pulsos" id="pulsos" placeholder=" Pulsos" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">SG:</label>
 <input type="text" name="sg" id="sg" placeholder=" SG" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Cabeza y Cuello:</label>
 <input type="text" name="cabezaycuello" id="cabezaycuello" placeholder=" Cabeza y Cuello" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Cardio:</label>
 <input type="text" name="5cardio" id="5cardio" placeholder="Cardio" > <br /> </div>
  <div class="col-4 col-12-small">
   <label for="name">Respiraci&oacuten:</label>
 <input type="text" name="respiracion" id="respiracion" placeholder=" Respiracion" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Abdom:</label>
 <input type="text" name="abdom" id="abdom" placeholder=" Abdom" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Neuro:</label>
 <input type="text" name="neuro" id="neuro" placeholder=" Neuro" > <br />
  </div>
  <div class="col-4 col-12-small">
   <label for="name">Genit/Mamas:</label>
 <input type="text" name="genit/mamas" id="genit/mamas" placeholder="Genit/Mamas" > <br />
  </div>
  
   </div>	   
  </div>	
  <h1>Problemas: </h1>
 <textarea name="proble" rows="10" cols="40" id="broblemas" placeholder="Problemas" ></textarea>
  
    <h1>Sindromes Geriatricos</h1>
 <textarea name="sindr" rows="10" cols="40" id="Diagnosticos" placeholder="Diagnosticos(Smes Geriatricos)" ></textarea>


</br>
  <h1>Pendientes: </h1>
   <textarea name="pend" rows="10" cols="40" id="Pendientes" placeholder="Pendientes" ></textarea>

  </br>
<!--
<a href="Sindromes.html">Calcular escalas</a>
</br></br>
 <h1>Pendientes: </h1>
  <textarea name="evolucion" rows="10" cols="40" id="evolucion" placeholder="Evolucion" required>Evoluci&oacuten </textarea>
  </br>-->
  </br>
 <button>Cargar</button> 
        </div>
      </form>

															

			</div>
</div>


		<!-- Scripts -->
		 <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var filePreview = document.createElement('img');
                    filePreview.id = 'file-preview';
                    //e.target.result contents the base64 data from the image uploaded
                    filePreview.src = e.target.result;
                    console.log(e.target.result);

                    var previewZone = document.getElementById('file-preview-zone');
                    previewZone.appendChild(filePreview);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        var fileUpload = document.getElementById('archivo');
        fileUpload.onchange = function (e) {
            readFile(e.srcElement);
        }

    </script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>