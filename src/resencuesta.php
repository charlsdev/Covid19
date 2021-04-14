<?php
    require('../plugins/fpdf/fpdf.php');

    date_default_timezone_set('America/Guayaquil');

    $codigo = $_GET['codigo'];
    $cedula = $_GET['cedula'];
    
    $i = 0;
    
    class PDF extends FPDF
    {
        function myCell($w, $h, $x, $t)
        {
            $height = $h/3;
            $first = $height + 2;
            $second = $height + $height + $height + 3;
            $len = strlen($t);
            if ($len > 95) {
                $txt = str_split($t, 92);
                $this->SetX($x);
                $this->Cell($w, $first, $txt[0], '', '', '');
                $this->SetX($x);
                $this->Cell($w, $second, $txt[1], '', '', '');
                $this->SetX($x);
                $this->Cell($w, $h, '', 'LTRB', 0, 'L', 0);
            } else {
                $this->SetX($x);
                $this->Cell($w, $h, $t, 'LTRB', 0, 'L', 0);
            }
        }

        function myCell2($w2, $h, $x2, $t2)
        {
            $height = $h/3;
            $first = $height + 2;
            $second = $height + $height + $height + 3;
            $len = strlen($t2);
            if ($len > 22) {
                $txt2 = str_split($t2, 22);
                $this->SetX($x2);
                $this->Cell($w2, $first, $txt2[0], '', '', '');
                $this->SetX($x2);
                $this->Cell($w2, $second, $txt2[1], '', '', '');
                $this->SetX($x2);
                $this->Cell($w2, $h, '', 'LTRB', 0, 'C', 0);
            } else {
                $this->SetX($x2);
                $this->Cell($w2, $h, $t2, 'LTRB', 0, 'C', 0);
            }
        }

        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('../img/Jipijapa.png',10,11,18);
            // Arial bold 15
            $this->SetFont('Times','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10, utf8_decode('RESULTADO DE ENCUESTA - COVID 19') ,0,0,'C');

            $this->Ln(10);
            $this->SetFont('Times','I',10);
            $this->Cell(80);
            $this->Cell(30,5,utf8_decode('Quedate en casa, por el bien tuyo y el de tu familia.'),0,0,'C');

            $this->Ln(10);
            //B ->Negrita, BU ->Subrayado, I ->Cursiva
            $this->SetFont('Times','B',15);
            $this->Cell(80);
            $this->Cell(30,2,utf8_decode('DATOS PERSONALES'),0,0,'C');
            // Logo
            $this->Image('../img/InovaTechS.png',178,9,26);

        }

        // Pie de página
        function Footer()
        {
            //Posiciones Derecha 'R', Izquierda 'L' y Centrado 'C'
            // Posición: a 1,5 cm del final
            $this->SetY(-20);
            // Times New Roman 8
            $this->SetFont('Times','I',8);
            
            // $this->Ln(2);
            
            //Lineas en FPDF
            //Grosor de linea
            $this->setLineWidth(0.65);
            //Color de linea
            $this->SetDrawColor(1,223,116);
            //Ancho borde izquierdo, Altura->Abajo-Arriba, Ancho->1cm = 100, Altura->Abajo-Arriba
            $this -> Line(10, 275, 70, 275);
            
            $this->SetDrawColor(243,17,17);
            $this -> Line(75, 275, 135, 275);
            $this->SetDrawColor(1,223,116);
            $this -> Line(140, 275, 200, 275);

            $this->SetLeftMargin(12);
            //Fuente
            // $this->Cell(0,9,utf8_decode("Fuente: Innova Tech'S - CAVP15"),0,1,'L');
            $this->Cell(0,9,utf8_decode("Fuente: COVID 19 - UNESUM - TI - CAVP"),0,1,'L');
            //Fecha de Impresion
            $this->Cell(0, 0,utf8_decode('Fecha de impresión: '.date('d/m/Y')),0,1,'L');
            //Hora de Impresion
            $this->Cell(0, 0,utf8_decode('Hora: '.date('h:i:s')),0,1,'C');
            // Número de página
            $this->Cell(0, 0, utf8_decode('N. Página').$this->PageNo().'/{nb}',0,0,'R');
            
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
                    parroquias.Parroquia 
                FROM
                    `user`
                    INNER JOIN cantones ON `user`.canton = cantones.ID_Canton
                    INNER JOIN parroquias ON `user`.parroquia = parroquias.ID_Parroquia
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
    }

    mysqli_free_result($result);
    
    $pdf = new PDF();
    $pdf->AliasNbPages(); //Numero de pag de ?
    $pdf->AddPage();
    $pdf->Image('../img/JipijapaFondoMT.png',10,48,80);
    $pdf->SetFont('Times','I',10);
    
    //Margen de lado izquierdo
    $pdf->SetLeftMargin(25);

    //Salto de linea
    $pdf->Ln(10);
    
    //Texto que se quiere mostrar
    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('IDENTIFICACIÓN                           :'), 0, 0);
    $pdf->SetFont('Times','I',9);
    $pdf->Cell(50,5, utf8_decode($cedulaU), 0, 1);

    $pdf->SetFont('Times','BI',10);
    $pdf->Cell(60,5, utf8_decode('DATOS PERSONALES                       :'), 0, 0);
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
    $pdf->Cell(50,5, utf8_decode($Parroquia), 0, 0);

    $pdf->SetLeftMargin(10);
    $pdf->Ln(15);

    $query1 = "  SELECT
                    encuesta.Codigo,
                    encuesta.Cedula,
                    encuesta.Fecha,
                    encuesta.Telefono,
                    preguntas.Pregunta,
                    resultado.Resultado 
                FROM
                    encuesta
                    INNER JOIN resultado ON encuesta.Codigo = resultado.Codigo
                    INNER JOIN preguntas ON resultado.ID_Pregunta = preguntas.ID_Pregunta 
                WHERE
                    encuesta.Codigo = '$codigo' 
                    AND encuesta.Cedula = '$cedula'";

    $result1 = mysqli_query($con, $query1);

    //Ancho de celda
    $w = 145;
    $h = 7;
    $w2 = 38;

    //Ancho, Altura, Celda a extraer, Border->SI(1)/NO(0), Salto de linea->SI(1)/NO(0), Alineacion del texto, Relleno->SI(1)/NO(0)
    //Color de celda -> $pdf->SetFillColor(0, 0, 255);
    //Color de texto -> $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Times','B',15);
    $pdf->Cell(81);
    $pdf->Cell(30,2,utf8_decode('RESULTADO ENCUESTA'), 0, 0, 'C');
    $pdf->SetLeftMargin(10);
    $pdf->Ln(7);

    //Titulo del cuadro
    $pdf->SetFont('Times','B',10);
    $pdf->SetFillColor(205, 205, 205);
    $pdf->Cell(8, 7, '#', 1, 0, 'C', 1);
    $pdf->Cell(145, 7, 'Pregunta', 1, 0, 'C', 1);
    $pdf->Cell(38, 7, 'Respuesta', 1, 0, 'C', 1);

    $pdf->SetFont('Times','I',10);

    while ($row = mysqli_fetch_assoc($result1)) {       
        $pdf->Ln();
        ++$i;
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8, 7, $i, 1, 0, 'C', 0);
        $pdf->SetFont('Times','I',10);
        $x = $pdf->GetX();
        // $pdf->Cell(140, 7, utf8_decode($row['Pregunta']), '1', 0, 'L', 0);
        $pdf->myCell($w, $h, $x, utf8_decode($row['Pregunta']), 1, 0, 'L', 0);
        $x2 = $pdf->GetX();
        // $pdf->Cell(38, 7, utf8_decode($row['Resultado']), 1, 0, 'C', 0);
        $pdf->myCell2($w2, $h, $x2, utf8_decode($row['Resultado']), 1, 0, 'C', 0);

        if ($i == 23) {
            $pdf->AddPage();

            $pdf->SetLeftMargin(10);
            $pdf->Ln(10);
            $pdf->SetFont('Times','B',10);
            $pdf->SetFillColor(205, 205, 205);
            $pdf->Cell(8, 7, '#', 1, 0, 'C', 1);
            $pdf->Cell(145, 7, 'Pregunta', 1, 0, 'C', 1);
            $pdf->Cell(38, 7, 'Respuesta', 1, 0, 'C', 1);

            $pdf->SetFont('Times','I',10);

            $pdf->Image('../img/JipijapaFondoMT.png',10,48,80);

            // $pdf->SetLeftMargin(10);
            // $pdf->Ln(10);
        }
        
        // $pdf->Cell(40, 7, $row['E_mail'], 1, 1, 'C', 0;
    }

    $pdf->Output();
?>