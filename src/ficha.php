<?php 
   include ("../lib/DbConnect.php");
	$db = new DbConnect();
   $con = $db->connect();

   date_default_timezone_set('America/Guayaquil');

   //Recibe las variables
   $codigo = $_GET['codigo'];
   $cedula = $_GET['cedula'];

   // echo $codigo . " " . $cedula;

   $stmt = $con->prepare(" SELECT
                              `user`.cedula,
                              `user`.apellidos_nombres,
                              `user`.telefono,
                              `user`.edad,
                              `user`.sexo,
                              `user`.estado_civil,
                              `user`.canton,
                              cantones.Canton
                           FROM
                              `user`
                           INNER JOIN cantones ON `user`.canton = cantones.ID_Canton 
                           WHERE cedula=?");
   $stmt->bind_param('s', $cedula);
   $stmt->execute();
   $result = $stmt->get_result();
   $row = $result->fetch_assoc();
   
   $apename = $row['apellidos_nombres'];
   $edad = $row['edad'];
   $sexo = $row['sexo'];
   $estado = $row['estado_civil'];
   $telefono = $row['telefono'];
   $Canton = $row['Canton'];

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		
		<title>COVID 19 - JIPIJAPA - UNESUM</title>
		
		<link href="../img/Unesum.ico" type="image/x-icon" rel="shortcut icon" />
      <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="style.css" rel="stylesheet" type="text/css" />
      <link href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
      <link href="../plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />

   </head>
    
   <!-- <body OnLoad="NoBack();"> -->
   <body>
		<div class="row-cols-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<img src="../img/QuedateEnCasa.png" id="img_logo"/>
				<a id="a" style="letter-spacing: 1px;"><b>Ficha Diagnóstico - Covid 19 - Jipijapa</b></a>
			</nav>
      </div>

      <br>
      <div class="container" style="color : #000">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <h3 style="letter-spacing: 1px;"><b>HISTORIA CLÍNICA DEL PACIENTE</b></h3>
               </div>
            </div>
         </div>

         <br>
         
         <div class="row">
               <div class="col-md-12">
                  <!-- <form id="form" class="was-validated" method="POST" action="resultado.php"> -->
                  <form id="formDiagnostico" class="was-validated">
                     <div class="card border-secondary col-md-12 mb-3">
                        <div class="card-header bg-secondary text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;I. INFORMACIÓN PERSONAL</b>
                        </div>
                        
                        <div class="card-body text-secondary">
                           <div class="form-row">
                              <div class="col-md-2 mb-3">
                                 <b><label>Código :</label></b>
                                 <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $codigo;?>" maxlength="7" disabled>
                              </div>

                              <div class="col-md-2 mb-3">
                                 <b><label>Cédula :</label></b>
                                 <input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" value="<?php echo $cedula;?>" disabled>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Apellidos y Nombres :</label></b>
                                 <input type="text" class="form-control" id="apename" name="apename" value="<?php echo $apename;?>" disabled>
                                 
                              </div>
                              
                              <div class="col-md-1 mb-3">
                                 <b><label>Edad :</label></b>
                                 <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $edad;?>" disabled>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Género :</label></b>
                                 <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $sexo;?>" disabled>
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-2 mb-3">
                                 <b><label>Estado Civil :</label></b>
                                 <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado;?>" disabled>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Procedencia :</label></b>
                                 <input type="text" class="form-control" id="procedente" name="procedente" value="<?php echo $Canton;?>" disabled>
                              </div>
                              
                              <div class="col-md-3 mb-3">
                                 <b><label>Residencia :</label></b>
                                 <input type="text" class="form-control" id="residencia" name="residencia" required>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Dirección :</label></b>
                                 <input type="text" class="form-control" id="direccion" name="direccion" required>
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="col-md-2 mb-3">
                                 <b><label>Telefono :</label></b>
                                 <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" disabled>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Ocupación :</label></b>
                                 <input type="text" class="form-control" id="ocupacion" name="ocupacion" onkeypress="return letra(event)" required>
                              </div>
                              
                              <div class="col-md-3 mb-3">
                                 <b><label>Tipo de Afiliciación :</label></b>
                                 <input type="text" class="form-control" id="afiliacion" name="afiliacion" onkeypress="return letra(event)" required>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Fecha de Consulta :</label></b>
                                 <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha = date('d/m/Y H:i:s'); ?>" disabled>
                              </div>
                           </div>
                           
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="card border-success col-md-12 mb-3">
                              <div class="card-header bg-success text-white">
                                 <b style="font-size: 20px;">&nbsp;&nbsp;II. MOTIVO DE LA CONSULTA</b>
                              </div>
                              
                              <div class="card-body text-success">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                       <!-- <b><label>Código :</label></b> -->
                                       <textarea class="form-control" id="motivo" name="motivo" required rows="5"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="card border-danger col-md-12 mb-3">
                              <div class="card-header bg-danger text-white">
                                 <b style="font-size: 20px;">&nbsp;&nbsp;III. ENFERMEDAD ACTUAL</b>
                              </div>
                              
                              <div class="card-body text-danger">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                       <!-- <b><label>Código :</label></b> -->
                                       <textarea class="form-control" id="enfermedad" name="enfermedad" required rows="5"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="card border-info col-md-12 mb-3">
                        <div class="card-header bg-info text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;IV. ANTECEDENTES PERSONALES</b>
                        </div>
                        
                        <div class="card-body text-info">
                           <div class="form-row">
                              <div class="col-md-4 mb-3">
                                 <b><label>Patológicos :</label></b>
                                 <textarea class="form-control" id="patologicos" name="patologicos" required rows="5"></textarea>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Quirúrgicos :</label></b>
                                 <textarea class="form-control" id="quirurgicos" name="quirurgicos" required rows="5"></textarea>
                              </div>

                              <div class="col-md-4 mb-3">
                                 <b><label>Alérgicos :</label></b>
                                 <textarea class="form-control" id="alergicos" name="alergicos" required rows="5"></textarea>
                              </div>
                           </div>

                           <!-- <div class="form-row">
                              <div class="col-md-12 mb-3">
                                 <p style="text-align: justify; font-size: 0.8rem;"><b><label>NOTA : </label></b> Poner SD en caso de no tener ningun dato.</p>
                              </div>
                           </div> -->

                        </div>
                     </div>

                     <div class="card border-warning col-md-12 mb-3">
                        <div class="card-header bg-warning text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;V. ANTECEDENTES PSICOSOCIALES</b>
                        </div>
                        
                        <div class="card-body text-warning">
                           <div class="form-row">
                              <div class="col-md-3 mb-3">
                                 <b><label>Hábitos :</label></b>
                                 <textarea class="form-control" id="habitos" name="habitos" required rows="8"></textarea>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Estilo de Vida :</label></b>
                                 <textarea class="form-control" id="estilovida" name="estilovida" required rows="8"></textarea>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Medio Ambiente :</label></b>
                                 <textarea class="form-control" id="mambiente" name="mambiente" required rows="8"></textarea>
                              </div>

                              <div class="col-md-3 mb-3">
                                 <b><label>Historia Laboral :</label></b>
                                 <textarea class="form-control" id="hlaboral" name="hlaboral" required rows="8"></textarea>
                              </div>
                           </div>

                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-5">
                           <div class="card border-secondary col-md-12 mb-3">
                              <div class="card-header bg-secondary text-white">
                                 <b style="font-size: 20px;">&nbsp;&nbsp;VI. ANTECEDENTES FAMILIARES</b>
                              </div>
                              
                              <div class="card-body text-secondary">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                       <!-- <b><label>Código :</label></b> -->
                                       <textarea class="form-control" id="familiares" name="familiares" required rows="7"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                        
                        <div class="col-md-7">
                           <div class="card border-danger col-md-12 mb-3">
                              <div class="card-header bg-danger text-white">
                                 <b style="font-size: 20px;">&nbsp;&nbsp;VII. EXÁMEN FISÍCO</b>
                              </div>
                              
                              <div class="card-body text-danger">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                       <b><label>Descripción General :</label></b>
                                       <textarea class="form-control" id="descripcion" name="descripcion" required rows="6"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="card border-success col-md-12 mb-3">
                              <div class="card-header bg-success text-white">
                                 <b style="font-size: 20px;">&nbsp;VIII. RESUMEN DE DATOS POSITIVOS O NEGATIVOS</b>
                              </div>
                              
                              <div class="card-body text-success">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                       <b><label>Resumen :</label></b>
                                       <textarea class="form-control" id="resumen" name="resumen" required rows="7"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                        
                        <div class="col-md-6">
                           <div class="card border-info col-md-12 mb-3">
                              <div class="card-header bg-info text-white">
                                 <b style="font-size: 20px;">&nbsp;&nbsp;IX. IMPRESIÓN DIAGNÓSTICA</b>
                              </div>
                              
                              <div class="card-body text-info">
                                 <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                       <b><label>Diagnostico Presuntivo :</label></b>
                                       <textarea class="form-control" id="impresion" name="impresion" required rows="7"></textarea>
                                    </div>

                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="card border-primary col-md-12 mb-3">
                        <div class="card-header bg-primary text-white">
                           <b style="font-size: 20px;">&nbsp;&nbsp;X. TRATAMIENTO</b>
                        </div>
                        
                        <div class="card-body text-primary">
                           <div class="form-row">
                              <div class="col-md-6 mb-3">
                                 <b><label>Descripción del tratamiento :</label></b>
                                 <textarea class="form-control" id="tratamiento" name="tratamiento" required rows="7"></textarea>
                              </div>

                              <div class="col-md-6 mb-3">
                                 <b><label>Observación :</label></b>
                                 <textarea class="form-control" id="observacion" name="observacion" required rows="7"></textarea>
                              </div>
                           </div>

                        </div>
                     </div>

                     <br>
                     <button class="btn float-right col-md-3" id="BTN"  type="submit">
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

      <br><br><br>

      <footer>
         <div class="row-cols-12">
            <nav class="bg-secondary">
               <center>
                  <img src="../img/Jipijapa.png" id="Jipijapa">
                  <label style="color: #fff;" id="COPY">Universidad Estatal del Sur del Manabí <br> Todos los derechos reservados. <br> COPYRIGHT © 2020</label>
                  <img src="../img/InovaTechS.png" id="TI">
                  
               </center>
            </nav>
         </div>
      </footer>

      <script src="../plugins/jquery.min.js"></script>
      <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
      <script src="../plugins/validations.js"></script>
      <script src="ficha.js"></script>

      <script language="javascript">
			function NoBack() {
				history.go(1)
			}
		</script>
   
	</body>
	
</html>