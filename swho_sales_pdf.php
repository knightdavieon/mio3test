<?php session_start(); require_once('FPDF17/fpdf.php'); require_once("Connection.php"); ?>
<?php 
     if(isset($_GET['scode'])){
        $info_query = "Select * from tbl_sales where transaction_number = '" . stripslashes($_GET['scode']) . "'";
        $info_result = mysqli_query($conn, $info_query);
        $info_rows = mysqli_fetch_array($info_result);
            $pdf = new FPDF();
             
            $pdf->AddPage();
             $pdf->Image('Icons/swLogo.png', 67, 5, 70);
            $pdf->AddFont('Arial', 'arial.ttf', 'arial.php');
            $pdf->SetFont('Arial', 'B', '4.5');     
            $pdf->Ln();
            $pdf->Ln();
            $width = 30;
            $pdf->SetFont('Arial', 'B', '9');
          
            $pdf->Ln(20);
            $pdf->Cell(40, 5, "Branch : " . $info_rows['branch'], 1);
            $pdf->Cell(150, 10, "Staff Name : " . $info_rows['staff_name'],  1);
            $pdf->Ln(5);
            $pdf->Cell(40, 5, "Employee Code : " . $info_rows['staff_code'], 1, 0, 'RT');
            $pdf->Ln();
            $pdf->Ln();
          
            $pdf->Cell($width, 5, "Transaction Date : " . $info_rows['date_transaction'], 2);
            $pdf->Ln();
            
            $pdf->Cell(50, 5, "Barcode", 1, 0, 'C');
            $pdf->Cell(70, 5, "Description", 1, 0, 'C');
            $pdf->Cell($width, 5, "Quantity", 1, 0, 'C');
            $pdf->Cell(20, 5, "Price", 1, 0, 'C');
            $pdf->Cell(20, 5, "Total", 1, 0, 'C');
            $pdf->Ln();
            
            $query = "Select * from tbl_sales where transaction_number = '" . stripslashes($_GET['scode']) . "'";
            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_array($result)){
                $pdf->Cell(50, 5, $rows['item_barcode'], 1, 0, 'C');
                $pdf->Cell(70, 5, $rows['item_name'], 1, 0, 'C');
                $pdf->Cell(30, 5, $rows['quant'], 1, 0, 'C');
                $pdf->Cell(20, 5, $rows['price'], 1, 0, 'C');
                $pdf->Cell(20, 5, $rows['total'], 1, 0, 'C');
                $pdf->Ln();
            }
            $pdf->Ln();
            $sum_query = "Select Sum(total)as t_sales from tbl_sales where transaction_number = '" . stripslashes($_GET['scode']) . "'";
            $sum_result = mysqli_query($conn, $sum_query);
            $sum_rows = mysqli_fetch_array($sum_result);
            $pdf->Cell(20, 5, "Total : " . "P" . $sum_rows['t_sales'], 0, 0, 'C');
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(60, 5, "Prepared By : ", 0);
            $pdf->Cell(60, 5, "Received By : ", 0);
            $pdf->Cell(60, 5, "Noted By : ", 0);

            $pdf->Output();
     }
?>