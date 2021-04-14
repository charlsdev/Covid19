<?php 
   include ("lib/DbConnect.php");
	$db = new DbConnect();
   $con = $db->connect();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		
		<title>COVID 19 - JIPIJAPA - UNESUM</title>
		
		<link href="img/Unesum.ico" type="image/x-icon" rel="shortcut icon" />
		<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="plugins/style.css" rel="stylesheet" type="text/css" />
      <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
      <link href="plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />

   </head>
    
   <body OnLoad="NoBack();">
		<div class="row-cols-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<img src="img/QuedateEnCasa.png" id="img_logo"/>
				<a><b>Quedate en Casa - Covid 19 - Jipijapa</b></a>
			</nav>
      </div>

      <br>
      <div class="container">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <h3><b>LLENE EL FORMULARIO COMPLETO</b></h3>
               </div>
            </div>

            <br>
            <!-- <div class="row">
               <div class="col-md-4">
                  <h4 style="margin-left: 30px"><b>INFORMACION PERSONAL</b></h4>
               </div>
            </div> -->
            
            <div class="row">
               <div class="col-md-12">
                  <!-- <form id="form" class="was-validated"> -->
                  <form id="form" class="was-validated" method="POST" action="resultado.php">
                     <div class="card border-success mb-3">
                        <div class="card-header bg-success text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;INFORMACION PERSONAL</b>
                        </div>
                        
                        <div class="card-body text-success">
                           <div class="form-row">
                              <div class="col-md-3 mb-3">
                                 <b><label># de Identificación :</label></b>
                                 <input type="text" class="form-control" id="cedula" name="cedula" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" pattern="[0-9]{7,15}" required>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <b><label>Apellidos y Nombres :</label></b>
                                 <input type="text" class="form-control" id="apename" name="apename" onkeypress="return letra(event)" required>
                                 
                              </div>
                              
                              <div class="col-md-3 mb-3">
                                 <b><label>Contacto telefónico :</label></b>
                                 <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return numerosTEL(event)" maxlength="10" required>
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-3 mb-3">
                                 <b><label>Rango de edad : </label></b> 
                                 <select name="edad" id="edad" required class="custom-select">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="0-9">0 - 9</option>
                                    <option value="10-19">10 - 19</option>
                                    <option value="20-29">20 - 29</option>
                                    <option value="30-39">30 - 39</option>
                                    <option value="40-49">40 - 49</option>
                                    <option value="50-59">50 - 59</option>
                                    <option value="60-69">60 - 69</option>
                                    <option value=">70">Mayor de 69</option>
                                 </select>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Sexo : </label></b> 
                                 <select name="sexo" id="sexo" required class="custom-select">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                 </select>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Nacionalidad : </label></b> 
                                 <select name="nacionalidad" id="nacionalidad" required class="custom-select">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="Ecuatoriana">Ecuatoriana</option>
                                    <option value="Extranjera">Extranjera</option>
                                 </select>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Estado civil : </label></b> 
                                 <select name="estado" id="estado" required class="custom-select">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="Soltero/a">Soltero/a</option>
                                    <option value="Casado/a">Casado/a</option>
                                    <option value="Viudo/a">Viudo/a</option>
                                    <option value="ULibre">Unión libre o unión de hecho</option>
                                    
                                 </select>
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-4 mb-3">
                                 <b><label>Cantón : </label></b> 
                                 <select name="canton" id="canton" required class="custom-select">
                                    
                                    <?php 
                                       if (!$con)
                                       {
                                          die("Conexion fallida: " . mysqli_connect_error());
                                       }
                                       
                                       $sql = "SELECT * FROM cantones";
                                       $result = mysqli_query($con, $sql);
                                    ?>

                                    <option disabled selected value="">Seleccionar...</! -->

                                    <?php
                                       while ($ver = mysqli_fetch_assoc($result))
                                       {
                                          ?>
                                          <option value="<?=$ver["ID_Canton"]?>">
                                             <?= utf8_encode($ver["Canton"])?> 
                                          </option>
                                          <?php
                                       }
                                    ?>

                                 </select>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Parroquia : </label></b> 
                                 <select name="parroquia" id="parroquia" class="custom-select" required>
                                    <option disabled selected value=''>Seleccionar...</option>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <input type="hidden" class="custom-select">
                              </div>

                           </div>
                        </div>
                     </div>

                     <div class="card border-info col-md-8 offset-md-2 mb-3">
                        <div class="card-header bg-info text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;VIVIENDA</b>
                        </div>
                        
                        <div class="card-body text-info">
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Usted vive con alguien más en su domicilio actualmente?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q1" id="SIQ1" value="SI" required>
                                    <label class="custom-control-label" for="SIQ1">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q1" id="NOQ1" value="NO" required>
                                    <label class="custom-control-label" for="NOQ1">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q1" id="Q1" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Actualmente ud o algún familiar con el que vive, por trabajo ha sido forzado a salir de casa?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q2" id="SIQ2" value="SI" required>
                                    <label class="custom-control-label" for="SIQ2">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q2" id="NOQ2" value="NO" required>
                                    <label class="custom-control-label" for="NOQ2">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q2" id="Q2" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha estado en contacto con personas que hayan venido de estas provincias?</label></b>
                                 <?php 
                                    if (!$con)
                                    {
                                       die("Conexion fallida: " . mysqli_connect_error());
                                    }
                                    
                                    $sql = "SELECT * FROM provinciascontagios";
                                    $result = mysqli_query($con, $sql);
                                 ?>

                                 <?php
                                    while ($ver = mysqli_fetch_assoc($result))
                                    {
                                       ?>
                                       <div class="custom-control custom-checkbox">
                                          &nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" class="custom-control-input" name="Q3[ ]" id="<?=$ver["ProvinciaContagios"]?>" value="<?=$ver["ProvinciaContagios"]?>">
                                          <label class="custom-control-label" for="<?=$ver["ProvinciaContagios"]?>"> <?= utf8_encode($ver["ProvinciaContagios"])?> </label>
                                       </div>
                                       <?php
                                    }
                                 ?>

                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="card border-danger col-md-8 offset-md-2 mb-3">
                        <div class="card-header bg-danger text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;MOVILIDAD / CONTACTOS</b>
                        </div>
                        
                        <div class="card-body text-danger">
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha viajado al extranjero en los últimos 20 días?</label></b><br>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q4" id="SIQ4" value="SI" required>
                                    <label class="custom-control-label" for="SIQ4">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q4" id="NOQ4" value="NO" required>
                                    <label class="custom-control-label" for="NOQ4">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q4" id="Q4" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha estado en contacto con personas que han viajado al extranjero en los últimos 20 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q5" id="SIQ5" value="SI" required>
                                    <label class="custom-control-label" for="SIQ5">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q5" id="NOQ5" value="NO" required>
                                    <label class="custom-control-label" for="NOQ5">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q5" id="Q5" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha viajado usted a alguna otra provincia en los últimos 20 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q6" id="SIQ6" value="SI" required>
                                    <label class="custom-control-label" for="SIQ6">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q6" id="NOQ6" value="NO" required>
                                    <label class="custom-control-label" for="NOQ6">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q6" id="Q6" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido contacto con personas que hayan sido diagnosticados como casos positivos de COVID 19?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q7" id="SIQ7" value="SI" required>
                                    <label class="custom-control-label" for="SIQ7">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q7" id="NOQ7" value="NO" required>
                                    <label class="custom-control-label" for="NOQ7">
                                       NO
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q7" id="NOSEQ7" value="NOSE" required>
                                    <label class="custom-control-label" for="NOSEQ7">
                                       NO SÉ
                                    </label>
                                 </div>
                                 <!-- <select name="Q7" id="Q7" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    <option value="NOSE">NO SÉ</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha visitado un supermercado, mercado, terminal terrestre o utilizado transporte público en los últimos 15 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q8" id="SIQ8" value="SI" required>
                                    <label class="custom-control-label" for="SIQ8">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q8" id="NOQ8" value="NO" required>
                                    <label class="custom-control-label" for="NOQ8">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q8" id="Q8" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Participó de un evento masivo durante los últimos 20 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q9" id="SIQ9" value="SI" required>
                                    <label class="custom-control-label" for="SIQ9">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q9" id="NOQ9" value="NO" required>
                                    <label class="custom-control-label" for="NOQ9">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q9" id="Q9" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha visitado un centro de salud/hospital en los últimos 20 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q10" id="SIQ10" value="SI" required>
                                    <label class="custom-control-label" for="SIQ10">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q10" id="NOQ10" value="NO" required>
                                    <label class="custom-control-label" for="NOQ10">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q10" id="Q10" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido contacto con profesionales de la salud durante los últimos 20 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q11" id="SIQ11" value="SI" required>
                                    <label class="custom-control-label" for="SIQ11">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q11" id="NOQ11" value="NO" required>
                                    <label class="custom-control-label" for="NOQ11">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q11" id="Q11" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="card border-warning col-md-8 offset-md-2 mb-3">
                        <div class="card-header bg-warning text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;SINTOMATOLOGÍA Y CONDICIÓN DE SALUD</b>
                        </div>
                        
                        <div class="card-body text-warning">
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido fiebre en los últimos 7 días?</label></b><br>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q12" id="SIQ12" value="SI" required>
                                    <label class="custom-control-label" for="SIQ12">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q12" id="NOQ12" value="NO" required>
                                    <label class="custom-control-label" for="NOQ12">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q12" id="Q12" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido tos seca en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q13" id="SIQ13" value="SI" required>
                                    <label class="custom-control-label" for="SIQ13">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q13" id="NOQ13" value="NO" required>
                                    <label class="custom-control-label" for="NOQ13">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q13" id="Q13" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>
                           
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido dolor de garganta en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q14" id="SIQ14" value="SI" required>
                                    <label class="custom-control-label" for="SIQ14">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q14" id="NOQ14" value="NO" required>
                                    <label class="custom-control-label" for="NOQ14">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q14" id="Q14" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido malestar general en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q15" id="SIQ15" value="SI" required>
                                    <label class="custom-control-label" for="SIQ15">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q15" id="NOQ15" value="NO" required>
                                    <label class="custom-control-label" for="NOQ15">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q15" id="Q15" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido dificultad para respirar en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q16" id="SIQ16" value="SI" required>
                                    <label class="custom-control-label" for="SIQ16">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q16" id="NOQ16" value="NO" required>
                                    <label class="custom-control-label" for="NOQ16">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q16" id="Q16" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido dolor de cabeza en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q17" id="SIQ17" value="SI" required>
                                    <label class="custom-control-label" for="SIQ17">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q17" id="NOQ17" value="NO" required>
                                    <label class="custom-control-label" for="NOQ17">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q17" id="Q17" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Ha tenido diarrea en los últimos 7 días?</label></b>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q18" id="SIQ18" value="SI" required>
                                    <label class="custom-control-label" for="SIQ18">
                                       SI
                                    </label>
                                 </div>
                                 <div class="custom-control custom-radio">
                                    &nbsp;&nbsp;&nbsp;
                                    <input class="custom-control-input" type="radio" name="Q18" id="NOQ18" value="NO" required>
                                    <label class="custom-control-label" for="NOQ18">
                                       NO
                                    </label>
                                 </div>
                                 <!-- <select name="Q18" id="Q18" required class="form-control col-md-6">
                                    <option disabled selected value="">Seleccionar...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                    
                                 </select> -->
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Presenta alguna de las siguientes condiciones de salud?</label></b>
                                 <?php 
                                    if (!$con)
                                    {
                                       die("Conexion fallida: " . mysqli_connect_error());
                                    }
                                    
                                    $sql = "SELECT * FROM enfermedades";
                                    $result = mysqli_query($con, $sql);
                                 ?>

                                 <?php
                                    while ($ver = mysqli_fetch_assoc($result))
                                    {
                                       ?>
                                       <div class="custom-control custom-checkbox">
                                          &nbsp;&nbsp;&nbsp;
                                          <input type="checkbox" class="custom-control-input" name="Q19[ ]" id="<?=$ver["Enfermedad"]?>" value="<?=$ver["Enfermedad"]?>">
                                          <label class="custom-control-label" for="<?=$ver["Enfermedad"]?>"> <?= utf8_encode($ver["Enfermedad"])?> </label>
                                       </div>
                                       <?php
                                    }
                                 ?>
                                 
                                 <!-- Pruebas mostrar -->
                                 <!-- <br><div >Ids seleccionados en matriz <span id="arr"></span></div>
                                 <div >Ids seleccionados <span id="str"></span></div> -->

                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="card border-secondary col-md-6 offset-md-3 mb-3">
                        <div class="card-header bg-secondary text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;UBICACIÓN DE RESIDENCIA ACTUAL</b>
                        </div>
                        
                        <div class="card-body text-secondary">
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><label>¿Permitir saber la ubicacion de mi residencia?</label></b>
                                 <p style="text-align: justify; font-size: 0.8rem;">Debe de conceder permiso de ubicacion para saber su latitud y longitud.</p>
                                 
                                 <div class="col-md-8 offset-md-2 mb-3">
                                    <b><label>Latitud :</label></b>
                                    <input type="text" class="form-control" id="latitud" name="latitud" onkeypress="return Coordenadas(event)" maxlength="10" placeholder="" required>
                                 </div>
                                 <div class="col-md-8 offset-md-2 mb-3">
                                    <b><label>Longitud :</label></b>
                                    <input type="text" class="form-control" id="longitud" name="longitud" onkeypress="return Coordenadas(event)" maxlength="10" placeholder="" required>
                                 </div>
                                 <div class="col-md-12">
                                    <b><label>NOTA :</label></b>
                                    <p style="text-align: justify; font-size: 0.8rem;">Pulse el botón para saber sus coordenadas. <br> En caso de no saber sus coordenadas exacta, verificar en GOOGLE MAPS.</p>
                                 </div>
                                 <div class="col-md-8 offset-md-2 mb-3">
                                    <button class="btn btn-outline-secondary float-right" type="button" id="GEO" onclick="geoloc()">
                                       &nbsp;&nbsp;&nbsp;
                                       <i class="fas fa-map-marker-alt"></i>
                                       &nbsp;&nbsp;&nbsp;
                                    </button>
                                 </div>
                                 <!-- <br><br>
                                 <div class="col-md-12 mb-3" id="geo"></div> -->
                                 
                              </div>
                           </div>
                           
                        </div>
                     </div>

                     <div class="card border-primary col-md-8 offset-md-2 mb-3">
                        <div class="card-header bg-primary text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;RIESGO</b>
                        </div>
                        
                        <div class="card-body text-primary">
                           <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <b><center><label id="QC">QUEDATE EN CASA!!!</label></center></b>
                                 <!-- <p style="text-align: justify; font-size: 0.8rem;">Debe de conceder permiso de ubicacion para saber su latitud y longitud.</p> -->
                                 
                                 <div class="col-md-8 offset-md-2 mb-3">
                                    <center><img src="img/Jipijapa.png" height="250" width="200" id="logoQC"/></center>
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <p style="text-align: justify;">Según las respuestas dadas por ti, tienes una PROBABILIDAD DE RIESGO SIN RIESGO ante el COVID-19. Sigue las siguientes recomendaciones: No olvides quedarte en casa, Evitar el contacto con personas que presenten síntomas respiratorios y Fortalece el lavado de manos de manera periódica. <br><br>La mayoría de personas presentan un cuadro leve que no necesita mayor atención. Si tu respiración se altera bruscamente en las próximas horas, debes llamar al 171 para comunicar la situación.</p>
                                    <h6 style="text-align: center; font-size: 1.2rem;">Le agradecemos por el tiempo dedicado a la encuesta.</h6>
                                 </div>
                                 
                              </div>
                           </div>
                           
                        </div>
                     </div>

                     <br>
                     <button class="btn float-right col-md-3" id="Enviar" type="submit" disabled>
                        &nbsp;&nbsp;&nbsp;
                        <i class="fas fa-user-plus"></i>
                        &nbsp;&nbsp;
                        Enviar...
                        &nbsp;&nbsp;&nbsp;
                     </button>
                  </form>
               </div>
            </div>
         </div>

         <br>

      </div>

      <footer>
         <div class="row-cols-12">
            <nav class="bg-secondary">
               <center>
                  <img src="img/Jipijapa.png" id="Jipijapa">
                  <label style="color: #fff;" id="COPY">Universidad Estatal del Sur del Manabí <br> Todos los derechos reservados. <br> COPYRIGHT © 2020</label>
                  <img src="img/InovaTechS.png" id="TI">
                  
               </center>
            </nav>
         </div>
      </footer>

      <script src="plugins/jquery.min.js"></script>
      <script src="resultado.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
      <script src="plugins/validations.js"></script>
      <script src="plugins/geolocalizacion.js"></script>
      <!-- <script src="plugins/APILocalizacion.js"></script> -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf7aCg2N_k2f0tCDbXiztdt6yXXXAIaJ0"></script>

      <!-- <script type="text/javascript">
         $(document).ready(function() {
            $('[name="Q19[]"]').click(function() {
               //Variable arr tiene el valor de las cajas seleccionadas
               var arr = $('[name="Q19[]"]:checked').map(function(){
                  return this.value;
               }).get();
               var str = arr.join(', ');
               $('#arr').text(JSON.stringify(arr));
               $('#str').text(str);
            });
         });    
      </script> -->
   
      <!-- <script type="text/javascript">
         $(document).ready(function(){
            $("input[name=Q1]").click(function () { 
               //Variable Q1 tiene el valor
               var Q1 = $('input:radio[name=Q1]:checked').val();   
               alert("La edad seleccionada es: " + Q1);
               // alert("La edad seleccionada es: " + $(this).val());
            });
         });
      </script> -->

      <script type="text/javascript">
         Swal.fire({
            title: 'QUEDATE EN CASA!',
            text: 'Por el bien tuyo y el de tu familia...',
            imageUrl: 'img/Jipijapa.png',
            imageWidth: 160,
            imageHeight: 200,
            imageAlt: 'House image',
            // reverseButtons: true,
            // showCancelButton: true,
            confirmButtonColor: '#01b468',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar »»',
            //Propiedad para que no se cierre el sweetalert
            allowOutsideClick: false
         }).then((result) => {
            if (result.value) {
               Swal.fire({
                  title: 'UNIDOS SOMOS FUERTE!',
                  html: '<h6 style="text-align: justify;">LA INFORMACIÓN QUE PROPORCIONE SERÁ DE GRAN AYUDA PARA SABER EL IMPACTO DEL COVID 19 EN EL CANTÓN JIPIJAPA. AGRADECEMOS SU PARTICIPACIÓN.<\h6><p style="text-align: justify; font-size: 0.8rem;">NO OLVIDE CONTACTARSE CON LA LÍNEA 171 EN CASO DE PRESENTAR SÍNTOMAS RELACIONADOS CON EL CORONAVIRUS. <i>(La información que proporciene será confidencial)<\i>.<\p><h6>Esta usted de acuerdo.</h6>',
                  imageUrl: 'img/QuedateEnCasa.png',
                  imageWidth: 400,
                  imageHeight: 180,
                  imageAlt: 'House image',
                  reverseButtons: true,
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Sí, Acepto »»',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'No, acepto !!',
                  allowOutsideClick: false
               }).then((result) => {
                  if (result.value) {
                     // location.reload();
                  } else {
                     if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                           title: 'YO ME QUEDO EN CASA!',
                           html: '<h6 style="text-align: justify;">SE LE AGRADECE POR SU TIEMPO. QUÉDATE EN CASA TU, FAMILIA TE NECESITA.<\h6><p style="text-align: justify; font-size: 0.8rem;">NO OLVIDE CONTACTARSE CON LA LÍNEA 171 EN CASO DE PRESENTAR SÍNTOMAS RELACIONADOS CON EL CORONAVIRUS. <i>(La responsabilidad es de todos)<\i>.<\p>',
                           imageUrl: 'img/Jipijapa.png',
                           imageWidth: 160,
                           imageHeight: 200,
                           imageAlt: 'House image',
                           // showCancelButton: false,
                           showConfirmButton: false,
                           // confirmButtonColor: '#d33',
                           // confirmButtonText: 'Aceptar!',
                           allowOutsideClick: false
                        })
                     }
                  }
               })
            } 
         })
			
      </script>
      
      <!-- <script language="javascript">
			$(document).ready(function(){
				$("#canton").change(function () {
               $("#canton option:selected").each(function () {
						ParroquiaJ = $(this).val();
						$.post("lib/parroquias.php", { ParroquiaJ: ParroquiaJ }, function(data){
							$("#parroquia").html(data);
						});            
					});
				})
			});
			
		</script> -->

      <script language="javascript">
			function NoBack() {
				history.go(1)
			}
		</script>
   
	</body>
	
</html>