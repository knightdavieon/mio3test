<?php include('simple_html_dom.php'); require_once("Connection.php"); ?>
<?php 
      if(isset($_GET['r_id'])){

            ob_end_clean();
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=transaction_format.csv'); 
            $output = fopen('php://output', 'w+');
            $info_query = "Select * from tbl_transfer_history where transaction_number = '" . stripslashes($_GET['r_id']) . "'";
            $info_result = mysqli_query($conn, $info_query);
            $info_rows = mysqli_fetch_array($info_result);
            $info_array =  array(
                "Code"=>"Staff Code : ". $info_rows['person_transfered'],
                "Name"=>"Staff Name : ". $info_rows['employee_code'],
                "");
          
            fputcsv($output, $info_array);
           
            exit();
   }
?>
