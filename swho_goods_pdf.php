<?php session_start(); require_once('FPDF17/fpdf.php'); require_once("Connection.php"); ?>
<?php 
     if(isset($_GET['dcode'])){
        $info_query = "Select * from tbl_goods_receive_history where docket_number  = '" . stripslashes($_GET['dcode']) . "'";
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
            $pdf->Cell(40, 5, "GOODS RECEIVE", 0);
            $pdf->Ln();
            $pdf->Cell(40, 5, "Transaction Number : " . $info_rows['docket_number'], 1);
            $pdf->Cell(150, 10, "Staff Name : " . $info_rows['person_received'],  1);
            $pdf->Ln(5);
            $pdf->Cell(40, 5, "Employee Code : " . $info_rows['employee_code'], 1, 0, 'RT');
            $pdf->Ln();
            $pdf->Ln();
          
            $pdf->Cell($width, 5, "Received Date : " . $info_rows['date_received'], 2);
            $pdf->Ln();
            
            $pdf->Cell(40, 5, "Barcode", 1, 0, 'C');
            $pdf->Cell(60, 5, "Description", 1, 0, 'C');
            $pdf->Cell(20, 5, "Category", 1, 0, 'C');
            $pdf->Cell(20, 5, "Sub Cat", 1, 0, 'C');
            $pdf->Cell($width, 5, "Quantity", 1, 0, 'C');
            $pdf->Cell(20, 5, "Price", 1, 0, 'C');
            $pdf->Ln();
            
            $query = "Select * from tbl_goods_receive_history where docket_number = '" . stripslashes($_GET['dcode']) . "'";
            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_array($result)){
                $pdf->Cell(40, 5, $rows['item_barcode'], 1, 0, 'C');
                $pdf->Cell(60, 5, $rows['item_name'], 1, 0, 'C');
                $pdf->Cell(20, 5, $rows['cat'], 1, 0, 'C');
                $pdf->Cell(20, 5, $rows['sub_category'], 1, 0, 'C');
                $pdf->Cell(30, 5, $rows['item_quantity'], 1, 0, 'C');
                $pdf->Cell(20, 5, $rows['item_price'], 1, 0, 'C');
                $pdf->Ln();
            }
            $pdf->Ln();
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