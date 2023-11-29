<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $query = "SELECT * FROM icar_registros";
    $rs = mysqli_query($con, $query) or die("Error con la base de datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',24);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, utf8_decode('Vehículos del concesionario'), 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',14);
    $celda=array(15,35,30,65,45);
    $pdf->SetFillColor(240, 131, 225);
    $pdf->Cell($celda[0],10,'ID',1,0,'C',true);
    $pdf->Cell($celda[1],10,utf8_decode('MATRÍCULA'),1,0,'C',true);
    $pdf->Cell($celda[2],10,utf8_decode('MECÁNICO'),1,0,'C',true);
    $pdf->Cell($celda[3],10,'REPUESTOS',1,0,'C',true);
    $pdf->Cell($celda[4],10,'ESTADO',1,0,'C',true);
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(236, 231, 122); 
    while($f=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($celda[0],10,$f[0],1,0,'C',true);
        $pdf->Cell($celda[1],10,$f[1],1,0,'C',true);
        $pdf->Cell($celda[2],10,$f[2],1,0,'C',true);
        $pdf->Cell($celda[3],10,utf8_decode($f[3]),1,0,'C',true);
        $pdf->Cell($celda[4],10,utf8_decode($f[4]),1,0,'C',true);
    }
    $pdf->Output("I", "registros.pdf");
?>