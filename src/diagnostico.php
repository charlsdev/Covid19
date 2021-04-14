<?php
    require('../plugins/fpdf/fpdf.php');

    date_default_timezone_set('America/Guayaquil');

    $codigo = $_GET['codigo'];
    $cedula = $_GET['cedula'];
    
    $i = 0;
    
    class PDF extends FPDF {
        // Cabecera de página
        function Header() {
            // Logo
            $this->Image('../img/Jipijapa.png',10,7,18);
            // Arial bold 15
            $this->SetFont('Times','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10, utf8_decode('RESULTADO DE DIAGNÓSTICO - COVID 19') ,0,0,'C');

            $this->Ln(8);
            $this->SetFont('Times','I',10);
            $this->Cell(80);
            $this->Cell(30,5,utf8_decode('Quedate en casa, por el bien tuyo y el de tu familia.'),0,0,'C');

            $this->Ln(8);
            //B ->Negrita, BU ->Subrayado, I ->Cursiva
            $this->SetFont('Times','B',15);
            $this->Cell(80);
            $this->Cell(30,2,utf8_decode('DATOS PERSONALES'),0,0,'C');
            // Logo
            $this->Image('../img/InovaTechS.png',178,5,26);

            //Variables mias
            $this->Image('../img/JipijapaFondoMT.png',10,48,80);
            $this->Ln(9);
            $this->SetLeftMargin(25);
        }

        // Pie de página
        function Footer() {
            //Posiciones Derecha 'R', Izquierda 'L' y Centrado 'C'
            // Posición: a 1,5 cm del final
            $this->SetY(-18);
            
            $this->SetFont('Times','I',8);
            
            //Lineas en FPDF
            //Grosor de linea
            $this->setLineWidth(0.65);
            //Color de linea
            $this->SetDrawColor(1,223,116);
            //Ancho borde izquierdo, Altura->Abajo-Arriba, Ancho->1cm = 100, Altura->Abajo-Arriba
            $this->Line(10, 278, 70, 278);
            
            $this->SetDrawColor(243,17,17);
            $this->Line(75, 278, 135, 278);
            $this->SetDrawColor(1,223,116);
            $this->Line(140, 278, 200, 278);

            $this->Cell(60,4,utf8_decode("Fuente: COVID 19 - UNESUM - TI - CAVP"),0,1,'L');
            //Fecha de Impresion
            $this->Cell(60, 4,utf8_decode('Fecha de impresión: '.date('d/m/Y')),0,0,'L');
            //Hora de Impresion
            $this->Cell(60, 4,utf8_decode('Hora: '.date('h:i:s')),0,0,'C');
            // Número de página
            $this->Cell(60, 4, utf8_decode('N. Página').$this->PageNo().'/{nb}',0,0,'R');
            
        }

    }

    
    //Llamamos a la conexion
    include ("../lib/DbConnect.php");

    $db = new DbConnect();
    $con = $db->connect();

    $query = "  SELECT
                    `user`.cedula,
                    `user`.apellidos_nombres,
                    `user`.telefono,
                    `user`.edad,
                    `user`.sexo,
                    `user`.nacionalidad,
                    `user`.estado_civil,
                    cantones.Canton,
                    parroquias.Parroquia,
                    diagnostico.Codigo,
                    diagnostico.Residencia,
                    diagnostico.Direccion,
                    diagnostico.Ocupacion,
                    diagnostico.Afiliacion,
                    diagnostico.Fecha,
                    diagnostico.Motivo,
                    diagnostico.Enfermedad,
                    diagnostico.Ant_Patologicos,
                    diagnostico.Ant_Quirurgicos,
                    diagnostico.Ant_Alergicos,
                    diagnostico.Ant_Familiares,
                    diagnostico.Estilo_Vida,
                    diagnostico.Habitos,
                    diagnostico.Medio_Ambiente,
                    diagnostico.Historial_Laboral,
                    diagnostico.Descripcion_General,
                    diagnostico.Resumen_Diagnostico,
                    diagnostico.Diagnostico_Pres,
                    diagnostico.Tratamiento,
                    diagnostico.Observacion 
                FROM
                    `user`
                    INNER JOIN cantones ON `user`.canton = cantones.ID_Canton
                    INNER JOIN parroquias ON `user`.parroquia = parroquias.ID_Parroquia
                    INNER JOIN diagnostico ON diagnostico.Cedula = `user`.cedula
                WHERE
                    `user`.cedula = '$cedula'";

    $result = mysqli_query($con, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $cedulaU = $row['cedula'];
        $apellidos_nombres = $row['apellidos_nombres'];
        $telefono = $row['telefono'];
        $edad = $row['edad'];
        $sexo = $row['sexo'];
        $nacionalidad = $row['nacionalidad'];
        $estado_civil = $row['estado_civil'];
        $Canton = $row['Canton'];
        $Parroquia = $row['Parroquia'];

        $CodigoDiag = $row['Codigo'];
        $ResidenciaDiag = $row['Residencia'];
        $DireccionDiag = $row['Direccion'];
        $OcupacionDiag = $row['Ocupacion'];
        $AfiliacionDiag = $row['Afiliacion'];
        $FechaDiag = $row['Fecha'];

        $Motivo = $row['Motivo'];
        $Enfermedad = $row['Enfermedad'];
        $Ant_Patologicos = $row['Ant_Patologicos'];
        $Ant_Quirurgicos = $row['Ant_Quirurgicos'];
        $Ant_Alergicos = $row['Ant_Alergicos'];
        $Ant_Familiares = $row['Ant_Familiares'];
        $Estilo_Vida = $row['Estilo_Vida'];
        $Habitos = $row['Habitos'];
        $Medio_Ambiente = $row['Medio_Ambiente'];
        $Historial_Laboral = $row['Historial_Laboral'];
        $Descripcion_General = $row['Descripcion_General'];
        $Resumen_Diagnostico = $row['Resumen_Diagnostico'];
        $Diagnostico_Pres = $row['Diagnostico_Pres'];
        $Tratamiento = $row['Tratamiento'];
        $Observacion = $row['Observacion'];
    }

    mysqli_free_result($result);
    
    $pdf = new PDF();
    $x = $pdf->AliasNbPages(); //Numero de pag de ?
    $pdf->AddPage();
    $pdf->SetFont('Times','I',10);
    
    //Texto que se quiere mostrar
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('IDENTIFICACIÓN                           :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($cedulaU), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('DATOS PERSONALES                     :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($apellidos_nombres), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('NACIONALIDAD                              :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($nacionalidad), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('EDAD                                                 :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($edad), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('SEXO                                                  :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($sexo), 0, 1);
    
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('TELÉFONO                                       :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($telefono), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('ESTADO CIVIL                                 :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($estado_civil), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('CANTÓN PROCEDENCIA              :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($Canton), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('PARROQUIA PROCEDENCIA       :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($Parroquia), 0, 1);

    $pdf->Ln();
    $pdf->SetFont('Times','B',15);
    $pdf->Cell(50);
    $pdf->Cell(60,7,utf8_decode('DATOS DIAGNÓSTICO'),0,0,'C');
    $pdf->Ln(8);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('CÓDIGO                                            :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($CodigoDiag), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('CIUDAD RESIDENCIA                   :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($ResidenciaDiag), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('DIRECCIÓN                                     :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($DireccionDiag), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('OCUPACIÓN                                    :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($OcupacionDiag), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('AFILIACIÓN                                    :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($AfiliacionDiag), 0, 1);
    
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('FECHA DE DIAGNÓSTICO           :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($FechaDiag), 0, 0);

    $pdf->SetLeftMargin(15);
    $pdf->Ln(15);

    $pdf->SetFont('Times','B',15);
    $pdf->Cell(180,6,utf8_decode('RESULTADO DIAGNÓSTICO'), 0, 1, 'C');
    
    $pdf->SetLeftMargin(15);
    $pdf->Ln(5);
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          II. MOTIVO DE LA CONSULTA'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Motivo), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          III. ENFERMEDAD ACTUAL'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Enfermedad), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          IV. ANTECEDENTES PERSONALES'), 0, 0, 'L');
    $pdf->SetFont('Times','B',12);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(55,5,utf8_decode('           Patológicos'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Ant_Patologicos), 1, 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(4);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(55,5,utf8_decode('           Quirúrgicos'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Ant_Quirurgicos), 1, 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(4);
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(55,5,utf8_decode('           Alérgicos'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Ant_Alergicos), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          V.	ANTECEDENTES FAMILIARES'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Ant_Familiares), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          VI. ANTECEDENTES PSICOSOCIALES'), 0, 0, 'L');
    $pdf->SetFont('Times','B',12);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(8);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(55,5,utf8_decode('           Hábitos'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Habitos), 1, 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(4);
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(55,5,utf8_decode('           Estilo de Vida'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Estilo_Vida), 1, 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(4);
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(55,5,utf8_decode('           Medio Ambiente'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Medio_Ambiente), 1, 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(4);
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(55,5,utf8_decode('           Historial Laboral'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Historial_Laboral), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          VII. EXAMEN FÍSICO'), 0, 0, 'L');
    $pdf->SetFont('Times','B',12);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(8);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(65,5,utf8_decode('           Descripción General'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Descripcion_General), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          VIII. RESUMEN DE DATOS POSITIVOS O NEGATIVOS'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Resumen_Diagnostico), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          IX. IMPRESIÓN DIAGNÓSTICA'), 0, 0, 'L');
    $pdf->SetFont('Times','B',12);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(8);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(65,5,utf8_decode('           Diagnostico Presuntivo'), 1, 1, 'L', 1);
    $pdf->SetLeftMargin(15);
    $pdf->Ln(1);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Diagnostico_Pres), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          X. TRATAMIENTO'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Tratamiento), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,6,utf8_decode('          XI. OBSERVACIONES'), 0, 0, 'L');
    $pdf->SetLeftMargin(15);
    $pdf->Ln(7);
    $pdf->SetFont('Times','I',12);
    $pdf->MultiCell(180,5, utf8_decode($Observacion), 1, 1);

    $pdf->SetLeftMargin(15);
    $pdf->Ln();
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(180,5,utf8_decode('Ing. Carlos Villacreses Parrales'), 0, 1, 'L');
    $pdf->Cell(180,5,utf8_decode("Futuro ING en Tecnologías de la Información - Innova Tech'S"), 0, 1, 'L');

    $pdf->Output();
?>