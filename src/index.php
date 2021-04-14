<?php 
   include ("../lib/DbConnect.php");
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
		
		<link href="../img/Unesum.ico" type="image/x-icon" rel="shortcut icon" />
      <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/datatables/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="style.css" rel="stylesheet" type="text/css" />
      <link href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
      <link href="../plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />

   </head>
    
   <body OnLoad="NoBack();">
		<div class="row-cols-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<img src="../img/QuedateEnCasa.png" id="img_logo"/>
				<a id="a"><b>Encuestas - Covid 19 - Jipijapa</b></a>
			</nav>
      </div>

      <br>
      <div class="container" style="color : #000">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <h3><b>ENCUESTAS REGISTRADAS</b></h3>
               </div>
            </div>
         </div>

         <br>
         
         <div class="table-responsive">
            <table id="listEncuestas" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-info">
                  <tr>
                     <th scope="col">Código</th>
                     <th scope="col">Cédula</th>
                     <th scope="col">Apellidos y Nombres</th>
                     <th scope="col">Fecha</th>
                     <th scope="col">Teléfono</th>
                     <th scope="col">Reporte</th>
                     <th scope="col">Encuesta</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>

      <br><br>

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
      <script src="../plugins/popper.min.js"></script>
      <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="../plugins/datatables/datatables.min.js"></script>
      <script src="../plugins/datatables/DataTables/js/jquery.dataTables.min.js"></script>
      <script src="../plugins/datatables/DataTables/js/dataTables.bootstrap4.min.js"></script>
      <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
      <script src="../plugins/validations.js"></script>
      <script src="encuesta.js"></script>

      <script language="javascript">
			function NoBack() {
				history.go(1)
			}
		</script>
   
	</body>
	
</html>