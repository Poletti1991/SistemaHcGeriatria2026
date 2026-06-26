<?php
include "conectar.php";
$dn= $_POST ['dni'];
$tip= $_POST ['tipo'];
$guar="<b>Guardado:</b>";
if ($_FILES['archivo1']["error"] > 0)	
	{
		//echo "Error: " . $_FILES['archivo1']['error'] . "<br>";		
	}
	else 
	{
	    if(file_exists($_FILES['archivo1']['tmp_name']) || is_uploaded_file($_FILES['archivo1']['tmp_name'])) { 
			$nombre=$_FILES['archivo1']['name'];
			$Sql="INSERT INTO  informes (dni, tipo, file) VALUES ('$dn','$tip','$nombre')";	 
			if(!$resultado = mysql_query($Sql)){ 
				echo "<b>Los Datos no fueron cargados(1).</b>";
				die(mysql_error($conn)."Error al tratar de guardar");
			} 
			else{		
				$carpeta="informes/";
				opendir($carpeta);
				$destino=$carpeta.$_FILES['archivo1']['name'];
				move_uploaded_file($_FILES['archivo1']['tmp_name'],$destino);
				$guar=$guar."Foto1";
			}					
			
       }
}

if ($_FILES['archivo2']["error"] > 0)
{
    //echo "Error: " . $_FILES['archivo2']['error'] . "<br>";
}
else
{
    if(file_exists($_FILES['archivo2']['tmp_name']) || is_uploaded_file($_FILES['archivo2']['tmp_name'])) { 
        $nombre=$_FILES['archivo2']['name'];
        $Sql="INSERT INTO  informes (dni, tipo, file) VALUES ('$dn','$tip','$nombre')";
        if(!$resultado = mysql_query($Sql)){
            echo "<b>Los Datos no fueron cargados(2).</b>";
            die(mysql_error($conn)."Error al tratar de guardar");
        }
        else{
            $carpeta="informes/";
            opendir($carpeta);
            $destino=$carpeta.$_FILES['archivo2']['name'];
            move_uploaded_file($_FILES['archivo2']['tmp_name'],$destino);
            $guar=$guar." / Foto2.";
        }
        
    }
}

if ($_FILES['archivo3']["error"] > 0)
{
    //echo "Error: " . $_FILES['archivo3']['error'] . "<br>";
}
else
{
    if(file_exists($_FILES['archivo3']['tmp_name']) || is_uploaded_file($_FILES['archivo3']['tmp_name'])) { 
        $nombre=$_FILES['archivo3']['name'];
        $Sql="INSERT INTO  informes (dni, tipo, file) VALUES ('$dn','$tip','$nombre')";
        if(!$resultado = mysql_query($Sql)){
            echo "<b>Los Datos no fueron cargados(3).</b>";
            die(mysql_error($conn)."Error al tratar de guardar");
        }
        else{
            $carpeta="informes/";
            opendir($carpeta);
            $destino=$carpeta.$_FILES['archivo3']['name'];
            move_uploaded_file($_FILES['archivo3']['tmp_name'],$destino);
            $guar=$guar." / Foto3.";
        }
       
    }
}
if ($_FILES['archivo4']["error"] > 0)
{
    //echo "Error: " . $_FILES['archivo4']['error'] . "<br>";
}
else
{
    if(file_exists($_FILES['archivo4']['tmp_name']) || is_uploaded_file($_FILES['archivo4']['tmp_name'])) { 
        $nombre=$_FILES['archivo4']['name'];
        $Sql="INSERT INTO  informes (dni, tipo, file) VALUES ('$dn','$tip','$nombre')";
        if(!$resultado = mysql_query($Sql)){
            echo "<b>Los Datos no fueron cargados(4).</b>";
            die(mysql_error($conn)."Error al tratar de guardar");
        }
        else{
            $carpeta="informes/";
            opendir($carpeta);
            $destino=$carpeta.$_FILES['archivo4']['name'];
            move_uploaded_file($_FILES['archivo4']['tmp_name'],$destino);
            $guar=$guar." / Foto4.";
        }
       
    }
}
if ($_FILES['archivo5']["error"] > 0)
{
   // echo "Error: " . $_FILES['archivo5']['error'] . "<br>";
}
else
{
    if(file_exists($_FILES['archivo5']['tmp_name']) || is_uploaded_file($_FILES['archivo5']['tmp_name'])) { 
        $nombre=$_FILES['archivo5']['name'];
        $Sql="INSERT INTO  informes (dni, tipo, file) VALUES ('$dn','$tip','$nombre')";
        if(!$resultado = mysql_query($Sql)){
            echo "<b>Los Datos no fueron cargados(5).</b>";
            die(mysql_error($conn)."Error al tratar de guardar");
        }
        else{
            $carpeta="informes/";
            opendir($carpeta);
            $destino=$carpeta.$_FILES['archivo5']['name'];
            move_uploaded_file($_FILES['archivo5']['tmp_name'],$destino);
            $guar=$guar." / Foto5.";
        }
        
    }
}
echo "<b>El informe ha sido Guardado</b>";"<script>
				alert('$guar');
				window.location= 'InformePacientes.php'
				</script>";



?>
<head>
        <link rel="shortcut icon" href="images\icons\favicon.ico" /> 
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

                    <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/browser.min.js"></script>
            <script src="assets/js/breakpoints.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

                        <script type="text/javascript">

        


            </script>

