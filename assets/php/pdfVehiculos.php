<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $query = "SELECT * FROM icar_vehiculos";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, utf8_decode('Vehículos del concesionario'), 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',9);
    $celda=array(14,50,15,18,23,23,15,20,14);
    $pdf->SetFillColor(240, 131, 225);
    $pdf->Cell($celda[0],10,'MATR',1,0,'C',true);
    $pdf->Cell($celda[1],10,'DESCR',1,0,'C',true);
    $pdf->Cell($celda[2],10,'MARCA',1,0,'C',true);
    $pdf->Cell($celda[3],10,'MODELO',1,0,'C',true);
    $pdf->Cell($celda[4],10,'TIPO',1,0,'C',true);
    $pdf->Cell($celda[5],10,utf8_decode('AÑO'),1,0,'C',true);
    $pdf->Cell($celda[6],10,'CLASIF',1,0,'C',true);
    $pdf->Cell($celda[7],10,'CEDULA',1,0,'C',true);
    $pdf->Cell($celda[8],10,'IMG',1,0,'C',true);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetFillColor(236, 231, 122); 
    while($f=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($celda[0],10,$f[0],1,0,'C',true);
        $pdf->Cell($celda[1],10,utf8_decode($f[1]),1,0,'C',true);
        $pdf->Cell($celda[2],10,utf8_decode($f[2]),1,0,'C',true);
        $pdf->Cell($celda[3],10,utf8_decode($f[3]),1,0,'C',true);
        $pdf->Cell($celda[4],10,utf8_decode($f[4]),1,0,'C',true);
        $pdf->Cell($celda[5],10,$f[5],1,0,'C',true);
        $pdf->Cell($celda[6],10,utf8_decode($f[6]),1,0,'C',true);
        $pdf->Cell($celda[7],10,$f[7],1,0,'C',true);
        $pdf->Cell($celda[8],10,$pdf->Image(trim($f[8], 'assets/php/'), $pdf->GetX(), $pdf->GetY(), 14),1,0,'C',false);
    }
    $pdf->Output("I", "vehiculos.pdf");
?>