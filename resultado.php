<?php
	include ("lib/DbFuntion.php");

   $db = new DbOperation;

   //Determinamos la zona horaria
   date_default_timezone_set('America/Guayaquil');
   //Hora del servidor...
   $fecha = date('d/m/Y H:i:s');

   //Datos insert laboratorista
   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
   $apename = (isset($_POST['apename'])) ? $_POST['apename'] : '';
   $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
   $edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
   $sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
   $nacionalidad = (isset($_POST['nacionalidad'])) ? $_POST['nacionalidad'] : '';
   $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
   $canton = (isset($_POST['canton'])) ? $_POST['canton'] : '';
   $parroquia = (isset($_POST['parroquia'])) ? $_POST['parroquia'] : '';
   $RQ1 = (isset($_POST['RQ1'])) ? $_POST['RQ1'] : '';
   $RQ2 = (isset($_POST['RQ2'])) ? $_POST['RQ2'] : '';
   $RQ3 = (isset($_POST['RQ3Q'])) ? $_POST['RQ3Q'] : '';
   $RQ3 = json_decode($RQ3);
   $RQ4 = (isset($_POST['RQ4'])) ? $_POST['RQ4'] : '';
   $RQ5 = (isset($_POST['RQ5'])) ? $_POST['RQ5'] : '';
   $RQ6 = (isset($_POST['RQ6'])) ? $_POST['RQ6'] : '';
   $RQ7 = (isset($_POST['RQ7'])) ? $_POST['RQ7'] : '';
   $RQ8 = (isset($_POST['RQ8'])) ? $_POST['RQ8'] : '';
   $RQ9 = (isset($_POST['RQ9'])) ? $_POST['RQ9'] : '';
   $RQ10 = (isset($_POST['RQ10'])) ? $_POST['RQ10'] : '';
   $RQ11 = (isset($_POST['RQ11'])) ? $_POST['RQ11'] : '';
   $RQ12 = (isset($_POST['RQ12'])) ? $_POST['RQ12'] : '';
   $RQ13 = (isset($_POST['RQ13'])) ? $_POST['RQ13'] : '';
   $RQ14 = (isset($_POST['RQ14'])) ? $_POST['RQ14'] : '';
   $RQ15 = (isset($_POST['RQ15'])) ? $_POST['RQ15'] : '';
   $RQ16 = (isset($_POST['RQ16'])) ? $_POST['RQ16'] : '';
   $RQ17 = (isset($_POST['RQ17'])) ? $_POST['RQ17'] : '';
   $RQ18 = (isset($_POST['RQ18'])) ? $_POST['RQ18'] : '';
   $RQ19 = (isset($_POST['RQ19Q'])) ? $_POST['RQ19Q'] : '';
   $RQ19 = json_decode($RQ19);
   $latitud = (isset($_POST['latitud'])) ? $_POST['latitud'] : '';
   $longitud = (isset($_POST['longitud'])) ? $_POST['longitud'] : '';
   
	$res = $db->exitUser($cedula);
	if ($res === false) {
      $codigoE = $db->codigoENC();
      if ($codigoE === false) {
         $res = '3';
         echo $res;
      } else {
         $db->insertUser($cedula, $apename, $telefono, $edad, $sexo, $nacionalidad, $estado, $canton, $parroquia);
         $db->insertENC($codigoE, $cedula, $fecha, $telefono);
         $db->resultadoENC($codigoE, $RQ1, $RQ2, $RQ3, $RQ4, $RQ5, $RQ6, $RQ7, $RQ8, $RQ9, $RQ10, $RQ11, $RQ12, $RQ13, $RQ14, $RQ15, $RQ16, $RQ17, $RQ18, $RQ19, $latitud, $longitud);
         $res = '0';
         echo $res;
      }
   } else {
      $res = '1';
		echo $res;
   }
	
?>