<?php session_start(); require_once("Connection.php"); ?>
<?php 
require_once('FPDF17/fpdf.php'); ?>
<?php 

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('Arial', 'arial.ttf', 'arial.php');
$pdf->SetFont('Arial', 'B', '4.5');
$pdf->Ln();
$pdf->Ln();
$width = 15;
$pdf->SetFont('Arial', 'B', '4.5');
$pdf->Cell($width, 5, "Docket Number", 1);
$pdf->Cell($width, 5, "Employee Code", 1);
$pdf->Cell(20, 5, "Staff Name", 1);
$pdf->Cell(20, 5, "Customer Name", 1);
$pdf->Cell($width, 5, "Invoice Number", 1);
$pdf->Cell($width, 5, "Barcode", 1);
$pdf->Cell(20, 5, "Item Name", 1);
$pdf->Cell(10, 5, "Stocks", 1);
$pdf->Cell(10, 5, "Sell", 1);
$pdf->Cell($width, 5, "Item Quantity", 1);
$pdf->Cell($width, 5, "Item Total", 1);
$pdf->Cell($width, 5, "Transaction Date", 1);
$pdf->Ln();
$pdf_query = "Select * from tbl_sales where branch = '" . $_SESSION['b_code'] . "'";
$pdf_result = mysqli_query($conn, $pdf_query)or die("Error : " . mysqli_error($conn));
$pdf_array = array();
while($pdf_rows = mysqli_fetch_array($pdf_result)){
 $pdf_array[] = $pdf_rows;
}
foreach($pdf_array as $pdf_frows){
     $pdf_frows = array_map("utf8_decode", $pdf_frows);
     $pdf->Cell($width, 4, $pdf_frows['s_number'], 1, 0, 'RT');
     $pdf->Cell($width, 4, $pdf_frows['employee_code'], 1, 0, 'C');
     $pdf->Cell(20, 4, $pdf_frows['staff_name'], 1, 0, 'C');
     $pdf->Cell(20, 4, $pdf_frows['customer_name'], 1, 0, 'C');
     $pdf->Cell($width, 4, $pdf_frows['invoice_number'], 1, 0, 'C');
     $pdf->Cell($width, 4, $pdf_frows['barcode'], 1, 0, 'C');
     $pdf->Cell(20, 4, $pdf_frows['item_name'], 1, 0, 'C');
     $pdf->Cell(10, 4, $pdf_frows['stocks'], 1, 0, 'C');
     $pdf->Cell(10, 4, $pdf_frows['sell'], 1, 0, 'C');
     $pdf->Cell($width, 4, $pdf_frows['item_quantity'], 1, 0, 'C');
     $pdf->Cell($width, 4, $pdf_frows['item_total'], 1, 0, 'C');
     $pdf->Cell($width, 4, $pdf_frows['transaction_date'], 1, 0, 'C');
   

     $pdf->Ln();
}
$pdf->Output();

?>