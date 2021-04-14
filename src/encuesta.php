<?php
   include ("../lib/DbConnect.php");
   include ("../lib/DbFuntion.php");

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

   //Variables por POST
   $codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
   
   //Variables por POST ENCUESTA
   $codigoENC = (isset($_POST['codigoENC'])) ? $_POST['codigoENC'] : '';
   $cedulaENC = (isset($_POST['cedulaENC'])) ? $_POST['cedulaENC'] : '';
   $residenciaENC = (isset($_POST['residenciaENC'])) ? $_POST['residenciaENC'] : '';
   $direccionENC = (isset($_POST['direccionENC'])) ? $_POST['direccionENC'] : '';
   $ocupacionENC = (isset($_POST['ocupacionENC'])) ? $_POST['ocupacionENC'] : '';
   $afiliacionENC = (isset($_POST['afiliacionENC'])) ? $_POST['afiliacionENC'] : '';
   $fechaENC = (isset($_POST['fechaENC'])) ? $_POST['fechaENC'] : '';
   $motivoENC = (isset($_POST['motivoENC'])) ? $_POST['motivoENC'] : '';
   $enfermedadENC = (isset($_POST['enfermedadENC'])) ? $_POST['enfermedadENC'] : '';
   $patologicosENC = (isset($_POST['patologicosENC'])) ? $_POST['patologicosENC'] : '';
   $quirurgicosENC = (isset($_POST['quirurgicosENC'])) ? $_POST['quirurgicosENC'] : '';
   $alergicosENC = (isset($_POST['alergicosENC'])) ? $_POST['alergicosENC'] : '';
   $habitosENC = (isset($_POST['habitosENC'])) ? $_POST['habitosENC'] : '';
   $estilovidaENC = (isset($_POST['estilovidaENC'])) ? $_POST['estilovidaENC'] : '';
   $mambienteENC = (isset($_POST['mambienteENC'])) ? $_POST['mambienteENC'] : '';
   $hlaboralENC = (isset($_POST['hlaboralENC'])) ? $_POST['hlaboralENC'] : '';
   $familiaresENC = (isset($_POST['familiaresENC'])) ? $_POST['familiaresENC'] : '';
   $descripcionENC = (isset($_POST['descripcionENC'])) ? $_POST['descripcionENC'] : '';
   $resumenENC = (isset($_POST['resumenENC'])) ? $_POST['resumenENC'] : '';
   $impresionENC = (isset($_POST['impresionENC'])) ? $_POST['impresionENC'] : '';
   $tratamientoENC = (isset($_POST['tratamientoENC'])) ? $_POST['tratamientoENC'] : '';
   $observacionENC = (isset($_POST['observacionENC'])) ? $_POST['observacionENC'] : '';
   
   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   switch($opcion){
      case 1:
         $query = "SELECT
                     encuesta.Codigo,
                     encuesta.Cedula,
                     user.apellidos_nombres,
                     encuesta.Fecha,
                     encuesta.Telefono 
                  FROM
                     encuesta
                     INNER JOIN user ON user.cedula = encuesta.Cedula 
                  ORDER BY
                     encuesta.Fecha DESC";
         
         $resultado = mysqli_query($con, $query);
      
         if (!$resultado) {
            die("ERROR");
         } else {
            $arreglo["data"] = [];
            while($data = mysqli_fetch_assoc($resultado)) {
               $arreglo["data"][] = $data;
            }
            
            echo json_encode($arreglo);
         }

         mysqli_free_result($resultado);
      break;

      case 2:
         $res = $ver->exitREV($codigo, $cedula);
         echo $res;       
      break;

      case 3:
         $res = $ver->insertDiag($codigoENC, $cedulaENC, $residenciaENC, $direccionENC, $ocupacionENC, $afiliacionENC, $fechaENC, $motivoENC, $enfermedadENC, $patologicosENC, $quirurgicosENC, $alergicosENC, $habitosENC, $estilovidaENC, $mambienteENC, $hlaboralENC, $familiaresENC, $descripcionENC, $resumenENC, $impresionENC, $tratamientoENC, $observacionENC);
         echo $res;       
      break;

   }   
   
?>