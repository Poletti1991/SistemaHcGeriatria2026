<?php
include "conectar.php";//conectar a la base de dato
include_once "ValidadorModificarHC.php";

// Validar datos antes de procesar
$errores = ValidadorModificarHC::validar($_POST, $_FILES);
if (count($errores) > 0) {
	$mensajeErrores = "Errores de validacion:\\n - " . implode("\\n - ", $errores);
	echo "<script>
			alert('$mensajeErrores');
			window.history.back();
		</script>";
	exit();
}

$mensaje="";
//primera parte
$id=$_POST ['ID'];
$substr=$id;
$foto= $_FILES['archivo']['tmp_name'];	//ultimo	
$fecha=$_POST ['fecha'];
$Nombre=$_POST ['Nombre'];//1
$DNI=$_POST ['DNI'];
$Domicilio=$_POST ['Domicilio'];
$Edad=$_POST ['Edad']; 
$Ocupacion=$_POST ['Ocupacion']; 
$OS=$_POST ['OS']; 
$motivo=$_POST ['motivo']; 
$vive_con=$_POST ['vive_con'];
$conteccion=$_POST ['conteccion']; //muestra si no
$con=$_POST ['con']; //muestra el por que 
$Nombrefoto= $_FILES['archivo']['name'];


$query ="UPDATE historia_clinica SET nombre_apellido = '$Nombre', dni='$DNI', domicilio = '$Domicilio', edad='$Edad', ocupacion = '$Ocupacion', obra_social='$OS', motivo_de_consulta = '$motivo', vive_con='$vive_con', contencion= '$conteccion', que_contencion_tiene='$con', fecha= '$fecha', file_name='$Nombrefoto' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);	

if ($Nombrefoto!= ''){
$query ="UPDATE historia_clinica SET nombre_apellido = '$Nombre', dni='$DNI', domicilio = '$Domicilio', edad='$Edad', ocupacion = '$Ocupacion', obra_social='$OS', motivo_de_consulta = '$motivo', vive_con='$vive_con', contencion= '$conteccion', que_contencion_tiene='$con', fecha= '$fecha', file_name='$Nombrefoto' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);
$carpeta="Fotos/";
opendir($carpeta);
$destino=$carpeta.$_FILES['archivo']['name'];
move_uploaded_file($_FILES['archivo']['tmp_name'],$destino);
}else{
$query ="UPDATE historia_clinica SET nombre_apellido = '$Nombre', dni='$DNI', domicilio = '$Domicilio', edad='$Edad', ocupacion = '$Ocupacion', obra_social='$OS', motivo_de_consulta = '$motivo', vive_con='$vive_con', contencion= '$conteccion', que_contencion_tiene='$con', fecha= '$fecha' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);
}

 
//Antecedentes Familiares:
$Madre=$_POST ['Madre'];
$padre=$_POST ['padre'];
$hnos=$_POST ['hnos'];
$otrosF=$_POST ['otrosF'];
$var=0;
if($Madre != ''){ $var=1;}elseif($padre != ''){ $var=1;}elseif($hnos != ''){ $var=1;}
elseif($otrosF != ''){ $var=1;}
//buscar en familia
$verificar_usuario=mysql_query("SELECT *
		FROM familiares
		WHERE id_paciente = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
	$Sql="INSERT INTO  familiares (id_paciente, madre, padre, hermanos, otrosF) VALUES
	('$substr','$Madre', '$pare', '$hnos', '$otrosF')";
	
	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Familiares.<br/>";
	}
}else{
$query ="UPDATE familiares SET madre = '$Madre', padre='$pare', hermanos = '$hnos', otrosF='$otrosF' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);

}
//Antecedentes Patologicos:
$HTA=$_POST ['HTA'];
$hta1=$_POST ['hta1'];
$DBT=$_POST ['DBT'];
$DBT1 =$_POST ['DBT1'];
$Epoc=$_POST ['Epoc'];
$Epoc1 =$_POST ['Epoc1'];
$IC=$_POST ['IC'];
$IC1=$_POST ['IC1'];
$IAM=$_POST ['IAM'];
$IAM1=$_POST ['IAM1'];
$arritmia=$_POST ['Arritmia'];
$arritmia1 =$_POST ['arritmia1'];
$tbco=$_POST ['tbco'];
$tbco1=$_POST ['tbco1'];
$oh=$_POST ['OH'];
$oh1=$_POST ['oh1'];				 
$irc=$_POST ['IRC'];
$irc1=$_POST ['irc1'];	
$ACV=$_POST ['ACV'];
$acv1=$_POST ['acv1'];
$HIT=$_POST ['HIT'];
$hit1=$_POST ['hit1']; 
$alergias=$_POST ['Alergias'];
$alergias1=$_POST ['alergias1'];
$trauma=$_POST ['trauma'];
$Internaciones=$_POST ['Internaciones'];
$otrosP=$_POST ['otrosP'];
$va1=0;
if ($HTA != ''){$va1=1;}
elseif($DBT != ''){ $va1=1; }
elseif($Epoc != ''){ $va1=1;}
elseif($IC != ''){ $va1=1;}
elseif($IAM != ''){ $va1=1;}
elseif($arritmia != ''){ $va1=1;}
elseif($tbco != ''){ $va1=1;}
elseif($oh != ''){ $va1=1;}
elseif($irc != ''){ $va1=1;}
elseif($ACV != ''){ $va1=1;}
elseif($HIT != ''){ $va1=1;}
elseif($alergias != ''){ $va1=1;}
elseif($trauma != ''){ $va1=1;}
elseif($Internaciones != ''){ $va1=1;}
elseif($otrosP != ''){ $va1=1;}
//buscar en Antecedentes Patologico
$verificar_usuario=mysql_query("SELECT *
		FROM anpatologicos
		WHERE id_pasiente_pa = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO  anpatologicos (id_pasiente_pa, hta, dbt, epoc, ic, aim, arritmia, tbco, oh, irc, acv, hit, alergias, traumas, internaciones, otrosP,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10,a11,a12) VALUES
	('$substr','$hta1','$DBT1','$Epoc1','$IC1','$IAM1','$arritmia1','$tbco1','$oh1','$irc1','$acv1','$hit1','$alergias1','$trauma','$Internaciones','$otrosP','$HTA','$DBT','$Epoc','$IC','$IAM','$arritmia','$tbco','$oh','$irc','$ACV','$HIT','$alergias')";
    if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Antecedentes Patologicos.<br/>";
	}
}else{
$query ="UPDATE anpatologicos SET hta='$hta1', dbt='$DBT1', epoc='$Epoc1', ic='$IC1', aim='$IAM1', arritmia='$arritmia1', tbco='$tbco1', oh='$oh1', irc='$irc1', acv='$acv1', hit='$hit1', alergias='$alergias1', traumas='$trauma', internaciones='$Internaciones', otrosP='$otrosP',a1='$HTA',a2='$DBT',a3='$Epoc',a4='$IC',a5='$IAM',a6='$arritmia',a7='$tbco',a8='$oh',a9='$irc',a10='$ACV',a11='$HIT',a12='$alergias' WHERE id_pasiente_pa = '$id' ";	
$resultado = mysql_query($query);
}
	
//Vacunas
$gripe=$_POST ['gripe'];
$neumo=$_POST ['neumo'];
$dt=$_POST ['dt']; 
$vz=$_POST ['vz']; 
$var=0;
if($gripe != ''){ $var=1;}
elseif($neumo != ''){ $var=1;}
elseif($dt != ''){ $var=1;}
elseif($vz != ''){ $var=1;}
//buscar vacunas
$verificar_usuario=mysql_query("SELECT *
		FROM  vacunas
		WHERE id_vacunas_pa = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO  vacunas ( id_vacunas_pa, gripe, numo, dt, vz) VALUES
	('$substr','$gripe', '$neumo', '$dt', '$vz')";
	
	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Vacunas.<br/>";
	}
}else{
	$query ="UPDATE vacunas SET gripe='$gripe', numo='$neumo', dt='$dt', vz='$vz' WHERE id_vacunas_pa = '$id' ";
	$resultado = mysql_query($query);
}		
//Practicas Preventivas
$Control=$_POST ['Control']; 
$psa=$_POST ['psa']; 
$mamo=$_POST ['mamo']; 
$vcc=$_POST ['vcc'];
$aud=$_POST ['aud'];
$buco=$_POST ['buco']; 
$vis=$_POST ['vis'];
$var=0;
if($Control != ''){ $var=1;}
elseif($neumo != ''){ $var=1;}
elseif($mamo != ''){ $var=1;}
elseif($vcc != ''){ $var=1;}
elseif($aud != ''){ $var=1;}
elseif($buco != ''){ $var=1;}
elseif($vis != ''){ $var=1;}
//buscar Preventivas
$verificar_usuario=mysql_query("SELECT *
		FROM  practpreventivas
		WHERE id_p_paci = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO  practpreventivas ( id_p_paci,controlGineco,psa,mamo,vcc,aud,buco,vis) VALUES
	('$substr','$Control', '$psa', '$mamo','$vcc','$aud','$buco', '$vis')";

	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Practicas Preventivas.<br/>";
	}
}else{
$query ="UPDATE practpreventivas SET controlGineco = '$Control', psa='$psa', mamo = '$mamo', vcc='$vcc', aud = '$aud', buco='$buco', vis = '$vis' WHERE id_p_paci = '$id' ";
$resultado = mysql_query($query);
}
//Medicación Habitual
$M1=$_POST["MedicacionHabitual1"];
$M2=$_POST["MedicacionHabitual2"];
$M3=$_POST["MedicacionHabitual3"];
$M4=$_POST["MedicacionHabitual4"];
$M5=$_POST["MedicacionHabitual5"];
$M6=$_POST["MedicacionHabitual6"];
$M7=$_POST["MedicacionHabitual7"];
$M8=$_POST["MedicacionHabitual8"];
$M9=$_POST["MedicacionHabitual9"];
$M10=$_POST["MedicacionHabitual10"];
$MOtro=$_POST["MedicacionHabitualO"];
$MEnfer=$_POST["MedicacionHabitualE"];

$var=0;
if($M1 != ''){ $var=1;}
elseif($M2 != ''){ $var=1;}
elseif($M3 != ''){ $var=1;}
elseif($M4 != ''){ $var=1;}
elseif($M5 != ''){ $var=1;}
elseif($M6 != ''){ $var=1;}
elseif($M7 != ''){ $var=1;}
elseif($M8 != ''){ $var=1;}
elseif($M9 != ''){ $var=1;}
elseif($M10 != ''){ $var=1;}
elseif($MOtro != ''){ $var=1;}
elseif($MEnfer != ''){ $var=1;}
//buscar Medi Habi
$verificar_usuario=mysql_query("SELECT *
		FROM   medi_habituales
		WHERE id_mh_cli = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO   medi_habituales (id_mh_cli,mh1,mh2,mh3,mh4,mh5,mh6,mh7,mh8,mh9,mh10,mh_otros,mhe) VALUES
	('$substr','$M1','$M2','$M3','$M4','$M5','$M6','$M7','$M8','$M9','$M10','$MOtro','$MEnfer')";
	
	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Medicación Habitual.<br/>";
	}
}else{
$query ="UPDATE medi_habituales SET mh1='$M1', mh2='$M2', mh3='$M3', mh4='$M4', mh5='$M5', mh6='$M6', mh7='$M7', mh8='$M8', mh9='$M9', mh10='$M10', mh_otros= '$MOtro', mhe='$MEnfer'  WHERE id_mh_cli = '$id' ";
$resultado = mysql_query($query);
}	

//Examen fisico
$TAEx=$_POST ['TAEx'];
$FC=$_POST ['FC']; 
$FR=$_POST ['FR'];
$tem=$_POST ['tem'];
$SAT=$_POST ['SAT'];
$KG=$_POST ['KG'];
$talla=$_POST ['talla'];
$orexia=$_POST ['orexia'];
$diuresis=$_POST ['diuresis']; 
$catarsis=$_POST ['catarsis']; 
$somnia=$_POST ['somnia'];
$piel=$_POST ['piel'];
$pulsos=$_POST ['pulsos'];
$sg=$_POST ['sg'];
$cabezaycuello=$_POST ['cabezaycuello'];
$cardio5=$_POST ['5cardio'];
$respiracion=$_POST ['respiracion']; 
$abdom=$_POST ['abdom']; 
$neuro=$_POST ['neuro'];
$genit_mamas=$_POST ['genit/mamas'];
$var=0;
if($TAEx != ''){ $var=1;}
elseif($FC != ''){ $var=1;}
elseif($FR != ''){ $var=1;}
elseif($tem != ''){ $var=1;}
elseif($SAT != ''){ $var=1;}
elseif($KG != ''){ $var=1;}
elseif($talla != ''){ $var=1;}
elseif($orexia!= ''){ $var=1;}
elseif($diuresis != ''){ $var=1;}
elseif($catarsis != ''){ $var=1;}
elseif($somnia != ''){ $var=1;}
elseif($piel != ''){ $var=1;}
elseif($pulsos != ''){ $var=1;}
elseif($sg != ''){ $var=1;}
elseif($cabezaycuello != ''){ $var=1;}
elseif($cardio5 != ''){ $var=1;}
elseif($respiracion != ''){ $var=1;}
elseif($abdom != ''){ $var=1;}
elseif($neumo != ''){ $var=1;}
elseif($genit_mamas != ''){ $var=1;}
//buscar fisico
$verificar_usuario=mysql_query("SELECT *
		FROM   exfisico
		WHERE id_paciente = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO    exfisico (id_paciente,ta,fc,fr,temp,sat,kg,talla,orexana,diuresis,catarsis,somnia,piel,pulso,sg,cabCuello,cardio,respi,abdomi,neuro,mama) VALUES
	('$substr','$TAEx','$FC','$FR','$tem','$SAT','$KG','$talla','$orexia','$diuresis','$catarsis','$somnia','$piel','$pulsos','$sg','$cabezaycuello','$cardio5','$respiracion','$abdom','$neuro','$genit_mamas')";
	
	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Examen fisico.<br/>";
	}
}else{
$query ="UPDATE  exfisico SET ta='$TAEx', fc='$FC', fr='$FR', temp='$tem', sat='$SAT', kg='$KG', talla='$talla', orexana'$orexia', diuresis='$diuresis', catarsis='$catarsis', somnia='$somnia', piel='$piel', pulso='$pulsos', sg='$sg', cabCuello='$cabezaycuello', cardio='$cardio5', respi='$respiracion', abdomi='$abdom', neuro='$neuro', mama='$genit_mamas' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);	
}		
//Problemas:
$proble=$_POST ['proble'];
//Sindromes Geriatricos
$sindr=$_POST ['sindr'];
//Pendientes:
$pend=$_POST ['pend'];

$var=0;
if($proble != ''){ $var=1;}
elseif($sindr != ''){ $var=1;}
elseif($pend != ''){ $var=1;}
//buscar otros
$verificar_usuario=mysql_query("SELECT *
		FROM   otros
		WHERE id_paciente = LIKE '$id'");

if(!$resultado = mysql_query($verificar_usuario)){
$Sql="INSERT INTO otros (id_paciente,problema,sindromes,pendientes) VALUES
	('$substr','$proble','$sindr','$pend')";

	if(!$resultado = mysql_query($Sql)){
		$mensaje="".$mensaje."Error al tratar de guardar Examen fisico.<br/>";
	}
}else{
$query ="UPDATE  otros SET problema='$proble', sindromes='$sindr', pendientes='$pend' WHERE id_paciente = '$id' ";
$resultado = mysql_query($query);
}
if ($mensaje==""){
	$mensaje="Se Guardo con Exito";
}
echo "<script>
         alert('$mensaje');
          window.location= 'menu.php'
    </script>";
?>
