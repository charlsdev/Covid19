<?php
 
	class DbOperation
	{
		private $con;

		function __construct()
		{
			require_once dirname(__FILE__) . '/DbConnect.php';
			$db = new DbConnect();
			$this->con = $db->connect();
		}

		//Digito automatico creado
		public function codigoENC(){
			$stmt = $this->con->prepare("SELECT ID FROM encuesta ORDER BY ID DESC LIMIT 1");
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$maxcodigo = $row['ID'];

			if ($maxcodigo < 9) {
				$maxcodigo = $maxcodigo + 1;
				$CodigoGEN = 'ENC000' . $maxcodigo;
			} else {
				if ($maxcodigo < 99) {
					$maxcodigo = $maxcodigo + 1;
					$CodigoGEN = 'ENC00' . $maxcodigo;
				} else {
					if ($maxcodigo < 999) {
						$maxcodigo = $maxcodigo + 1;
						$CodigoGEN = 'ENC0' . $maxcodigo;
					} else {
						if ($maxcodigo < 9999) {
							$maxcodigo = $maxcodigo + 1;
							$CodigoGEN = 'ENC' . $maxcodigo;
						} else {
							// $CodigoGEN = "Maximo de registro alcanzado";
							$CodigoGEN = false;
						}
					}
					
				}
			}

			return $CodigoGEN;
		}
	
		//Registra nuevo usuario 
		public function insertUser($cedula, $apename, $telefono, $edad, $sexo, $nacionalidad, $estado, $canton, $parroquia){
			$stmt = $this->con->prepare("INSERT INTO user(cedula, apellidos_nombres, telefono, edad, sexo, nacionalidad, estado_civil, canton, parroquia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $cedula, $apename, $telefono, $edad, $sexo, $nacionalidad, $estado, $canton, $parroquia);

			if($stmt->execute())
				return true; 
			return false;
		}

		//Verifica que no este en la BD 
		public function exitUser($cedula){
			$stmt = $this->con->prepare("SELECT * FROM user WHERE cedula=?");
			$stmt->bind_param('s', $cedula);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nueva encuesta 
		public function insertENC($codigo, $cedula, $fecha, $telefono){
			$stmt = $this->con->prepare("INSERT INTO encuesta(Codigo, Cedula, Fecha, Telefono) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $codigo, $cedula, $fecha, $telefono);

			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//Registra nuevo resultado 
		public function resultadoENC($codigoE, $RQ1, $RQ2, $RQ3, $RQ4, $RQ5, $RQ6, $RQ7, $RQ8, $RQ9, $RQ10, $RQ11, $RQ12, $RQ13, $RQ14, $RQ15, $RQ16, $RQ17, $RQ18, $RQ19, $latitud, $longitud){

			$Q1 = 'Q01';
			$Q2 = 'Q02';
			$Q3 = 'Q03';
			$Q4 = 'Q04';
			$Q5 = 'Q05';
			$Q6 = 'Q06';
			$Q7 = 'Q07';
			$Q8 = 'Q08';
			$Q9 = 'Q09';
			$Q10 = 'Q10';
			$Q11 = 'Q11';
			$Q12 = 'Q12';
			$Q13 = 'Q13';
			$Q14 = 'Q14';
			$Q15 = 'Q15';
			$Q16 = 'Q16';
			$Q17 = 'Q17';
			$Q18 = 'Q18';
			$Q19 = 'Q19';
			$Q20 = 'LAT';
			$Q21 = 'LON';

			$stmt = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $codigoE, $Q1, $RQ1);
			$stmt->execute();

			$stmt2 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt2->bind_param("sss", $codigoE, $Q2, $RQ2);
			$stmt2->execute();

			$long = count($RQ3);
			for ( $i = 0; $i < $long; $i++ ) {
				$stmt3 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
				$stmt3->bind_param("sss", $codigoE, $Q3, $RQ3[$i]);
				$stmt3->execute();
			}

			$stm4 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm4->bind_param("sss", $codigoE, $Q4, $RQ4);
			$stm4->execute();

			$stm5 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm5->bind_param("sss", $codigoE, $Q5, $RQ5);
			$stm5->execute();

			$stm6 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm6->bind_param("sss", $codigoE, $Q6, $RQ6);
			$stm6->execute();

			$stm7 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm7->bind_param("sss", $codigoE, $Q7, $RQ7);
			$stm7->execute();

			$stm8 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm8->bind_param("sss", $codigoE, $Q8, $RQ8);
			$stm8->execute();

			$stm9 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stm9->bind_param("sss", $codigoE, $Q9, $RQ9);
			$stm9->execute();

			$stmt10 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt10->bind_param("sss", $codigoE, $Q10, $RQ10);
			$stmt10->execute();

			$stmt11 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt11->bind_param("sss", $codigoE, $Q11, $RQ11);
			$stmt11->execute();

			$stmt12 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt12->bind_param("sss", $codigoE, $Q12, $RQ12);
			$stmt12->execute();

			$stmt3 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt3->bind_param("sss", $codigoE, $Q13, $RQ13);
			$stmt3->execute();

			$stmt14 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt14->bind_param("sss", $codigoE, $Q14, $RQ14);
			$stmt14->execute();

			$stmt15 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt15->bind_param("sss", $codigoE, $Q15, $RQ15);
			$stmt15->execute();

			$stmt16 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt16->bind_param("sss", $codigoE, $Q16, $RQ16);
			$stmt16->execute();

			$stmt17 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt17->bind_param("sss", $codigoE, $Q17, $RQ17);
			$stmt17->execute();

			$stmt18 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt18->bind_param("sss", $codigoE, $Q18, $RQ18);
			$stmt18->execute();

			$long2 = count($RQ19);
			for ( $i = 0; $i < $long2; $i++ ) {
				$stmt19 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
				$stmt19->bind_param("sss", $codigoE, $Q19, $RQ19[$i]);
				$stmt19->execute();
			}
			
			$stmt20 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt20->bind_param("sss", $codigoE, $Q20, $latitud);
			$stmt20->execute();

			$stmt21 = $this->con->prepare("INSERT INTO resultado(Codigo, ID_Pregunta, Resultado) VALUES (?, ?, ?)");
			$stmt21->bind_param("sss", $codigoE, $Q21, $longitud);
			$stmt21->execute();

			// if($stmt->execute()) {
				// return true;
			// } else {
				return false;
			// } 
		}

		//Verifica que no tenga un registro de revisión en la BD 
		public function exitREV($codigo, $cedula){
			$stmt = $this->con->prepare("SELECT * FROM diagnostico WHERE codigo=? AND cedula=?");
			$stmt->bind_param('ss', $codigo, $cedula);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo diagnostico 
		public function insertDiag($codigoENC, $cedulaENC, $residenciaENC, $direccionENC, $ocupacionENC, $afiliacionENC, $fechaENC, $motivoENC, $enfermedadENC, $patologicosENC, $quirurgicosENC, $alergicosENC, $habitosENC, $estilovidaENC, $mambienteENC, $hlaboralENC, $familiaresENC, $descripcionENC, $resumenENC, $impresionENC, $tratamientoENC, $observacionENC){
			$stmt = $this->con->prepare("INSERT INTO diagnostico(diagnostico.Codigo, diagnostico.Cedula, diagnostico.Residencia, diagnostico.Direccion, diagnostico.Ocupacion, diagnostico.Afiliacion, diagnostico.Fecha, diagnostico.Motivo, diagnostico.Enfermedad, diagnostico.Ant_Patologicos, diagnostico.Ant_Quirurgicos, diagnostico.Ant_Alergicos, diagnostico.Ant_Familiares, diagnostico.Habitos, diagnostico.Estilo_Vida, diagnostico.Medio_Ambiente, diagnostico.Historial_Laboral, diagnostico.Descripcion_General, diagnostico.Resumen_Diagnostico, diagnostico.Diagnostico_Pres, diagnostico.Tratamiento, diagnostico.Observacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssssssssssssssssssss", $codigoENC, $cedulaENC, $residenciaENC, $direccionENC, $ocupacionENC, $afiliacionENC, $fechaENC, $motivoENC, $enfermedadENC, $patologicosENC, $quirurgicosENC, $alergicosENC, $habitosENC, $estilovidaENC, $mambienteENC, $hlaboralENC, $familiaresENC, $descripcionENC, $resumenENC, $impresionENC, $tratamientoENC, $observacionENC);

			if($stmt->execute())
				return true; 
			return false;
		}

	}

?>