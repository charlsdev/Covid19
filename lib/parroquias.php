<?php 
	include ("DbConnect.php");
	$db = new DbConnect();
   $con = $db->connect();
	
	$ID = $_POST['ParroquiaJ'];
	
	$sql = " SELECT
               cantones.ID_Canton,
               parroquias.ID_Parroquia,
               parroquias.Parroquia 
            FROM
               cantones
               INNER JOIN parroquias ON cantones.ID_Canton = parroquias.ID_Canton 
            WHERE
               cantones.ID_Canton = '" . $ID . "'";

	$result = mysqli_query($con, $sql);

	
	$cadena = '<option disabled selected value="" >Seleccionar...</option>';

	while ($ver = mysqli_fetch_assoc($result)) {
		$cadena = $cadena . '<option value='. $ver["ID_Parroquia"]. '>'
								. utf8_encode($ver["Parroquia"]) .
							'</option>';
	}
	
	echo  $cadena.'</select>';
	
?>