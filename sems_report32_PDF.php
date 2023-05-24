<?php
require('fpdf.php');
error_reporting(0);
$selectedPRN = $_GET['sprn'];
include('config.php');
if (!isset($_SESSION['loginid'])) {
  header('location:tlogin.php');
}
$getData = mysqli_query($conn, "select * from `semrepo32` where `PRN`='$selectedPRN'");
$row = mysqli_fetch_assoc($getData);
$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('images/kit-logo.png', 10, 3, 40, 20);

$pdf->Ln(15);
$pdf->SetDrawColor(0, 0, 0); // set the color to black
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, 'Generated Report (Third Year - Second Semester)', 0, 1, 'C');
$pdf->Cell(0, 10, 'PRN: ' . $selectedPRN, 0, 1, 'C');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(15, 10, 'Sr.No', 1, 0, 'C');
$pdf->Cell(80, 10, 'Details', 1, 0, 'C');
$pdf->Cell(100, 10, 'Remarks', 1, 1, 'C');

$pdf->SetFont('Arial', '', 11);

$pdf->Cell(15, 10, '1', 1, 0, 'C');
$pdf->Cell(80, 10, 'ISE I/II MSE/ ESE', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Review'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '2', 1, 0, 'C');
$pdf->Cell(80, 10, 'Students attendance and his/her regularity', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Attendance'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '3', 1, 0, 'C');
$pdf->Cell(80, 10, 'Semester Result of the Earlier Semester', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Result'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '4', 1, 0, 'C');
$pdf->Cell(80, 10, 'Participation in various activities', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Carricular'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '5', 1, 0, 'C');
$pdf->Cell(80, 10, 'Communication and Professional Skills', 1, 0, 'C');
$pdf->Cell(100, 10, $row['CandP_Skills'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '6', 1, 0, 'C');
$pdf->Cell(80, 10, 'General Behaviour and Discipline', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Behaviour'], 1, 0, 'C');
$pdf->Ln();

$pdf->Cell(15, 10, '5', 1, 0, 'C');
$pdf->Cell(80, 10, 'Any Other Specify', 1, 0, 'C');
$pdf->Cell(100, 10, $row['Other'], 1, 0, 'C');
$pdf->Ln();

$pdf->Output();
?>