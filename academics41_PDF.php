<?php
require('fpdf.php');
error_reporting(0);
include('config.php');

$PRN = $_GET['PRN'];

$sql = "SELECT * FROM `academic41` WHERE `PRN`='$PRN'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);

$pdf = new FPDF();

$pdf->AddPage();

$pdf->Image('images/kit-logo.png', 10, 3, 40, 20);

$pdf->Ln(15);

$pdf->SetDrawColor(0, 0, 0); 
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(190, 10, 'Academic Report 41 (' . $PRN . ')', 0, 1, 'C');
$pdf->Ln(8); 

$pdf->Cell(80, 20, 'Courses', 1, 0, 'C');
$pdf->Cell(20, 20, 'ISE-I', 1, 0, 'C');
$pdf->Cell(20, 20, 'ISE-II', 1, 0, 'C');
$pdf->Cell(20, 20, 'MSE', 1, 0, 'C');
$pdf->Cell(20, 20, 'ESE', 1, 0, 'C');
$pdf->MultiCell(30, 10, 'Make Up' . "\n" . 'Exam', 1, 'C');

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(80, 10, $row1['Course1'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE11'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE12'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE1'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE1'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE1'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course2'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE21'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE22'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE2'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE2'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE2'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course3'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE31'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE32'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE3'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE3'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE3'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course4'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE41'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE42'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE4'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE4'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE4'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course5'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE51'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE52'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE5'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE5'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE5'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course6'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE61'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE62'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE6'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE6'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE6'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course7'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE71'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE72'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE7'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE7'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE7'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course8'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE81'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE82'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE8'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE8'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE8'], 1, 1, 'C');

$pdf->Cell(80, 10, $row1['Course9'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE91'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ISE92'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['MSE9'], 1, 0, 'C');
$pdf->Cell(20, 10, $row1['ESE9'], 1, 0, 'C');
$pdf->Cell(30, 10, $row1['MAKE9'], 1, 1, 'C');

$pdf->Cell(80, 10, '', 0, 1);
$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(25, 10, 'SGPI', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, $row1['sgpi'], 1, 0, 'C');
$pdf->Cell(12, 10, '', 0, 0); 
$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(25, 10, 'CGPA', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, $row1['cgpi'], 1, 0, 'C');
$pdf->Cell(12, 10, '', 0, 0); 
$pdf->SetFont('Arial', 'B', 12); 
$pdf->Cell(25, 10, 'Grade', 1, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, $row1['grade'], 1, 1, 'C');


$pdf->Output('Academics41(' . $PRN . ').pdf', 'D');
?>