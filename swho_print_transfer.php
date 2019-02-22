<?php require_once("Connection.php"); ?>
  <!-- <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
       <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        
     <!-- End of DataTable CDN -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 
?>
 <img src="Icons/swLogo.png" style="width:280px;margin-left:29%;">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

<?php 
      $query = "Select * from tbl_transfer_history where transaction_number = '" . stripslashes($_GET['r_id']) . "'";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_fetch_array($result);
?>
<table border="2" style="width:100%;" >
 <tr>
       <td style="width:250px;"> Transaction Number :  <?php echo $rows['transaction_number']; ?></td>
       <td rowspan="10"> Transfered By : <?php echo $rows['person_transfered']; ?> </td>
    </tr>
    <tr>
          <td> Employee Code : <?php echo $rows['employee_code']; ?> </td>
     </tr>
    
</table>
<style type="text/css">
       .dataTables_filter{
           display:none;
       }
       .dataTables_paginate{
           display:none;
       }
    
    
    </style>
<div style="margin-top:10px;">
     <label> Transfer To : <?php echo $rows['branch']; ?> </label><br/>
     <label> Transaction Date : <?php echo $rows['date_received']; ?> </label>
  </div>
<table border="2" style="width:100%;margin-top:1px;">
      <thead>
            <tr>
                  <th> TS Number </th>
                  <th> Barcode </th>
                  <th> Description </th>
                  <th> Category </th>
                  <th> Sub Cat </th>
                  <th> Quantity </th>
                  <th> Price </th>
                  <th> Remarks </th>
                  <th> Barcode </th>
                  <th> TS Type </th>
             </tr>
         </thead>
         <tbody>
              <?php 
                 $trans_query = "Select * from tbl_transfer_history where transaction_number = '" . stripslashes($_GET['r_id']) . "'";
                 $trans_result = mysqli_query($conn, $trans_query);
                 while($trans_rows = mysqli_fetch_array($trans_result)){
                    ?>
                    <tr>
                        <td><?php echo $trans_rows['transaction_number']; ?></td>
                        <td><?php echo $trans_rows['item_barcode']; ?></td>
                        <td><?php echo $trans_rows['item_name']; ?></td>
                        <td><?php echo $trans_rows['cat']; ?></td>
                        <td><?php echo $trans_rows['sub_category']; ?></td>
                        <td><?php echo $trans_rows['item_quant']; ?></td>
                        <td><?php echo $trans_rows['item_price']; ?></td>
                        <td><?php echo $trans_rows['remarks']; ?></td>
                        <td><?php echo $trans_rows['item_barcode']; ?></td>
                        <td><?php echo $trans_rows['ts_type']; ?></td>
                      </tr>
                <?php
                 }
              ?>
           </tbody>
   </table>

</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:50px;">
       <label> Prepared By : </label>
       <hr style="border:1px solid #000;width:150px;margin-left:-3px;">
   </div>
   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:50px;">
       <label> Received By : </label>
       <hr style="border:1px solid #000;width:150px;margin-left:-3px;">
   </div>
   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-top:50px;">
       <label> Checked By : </label>
       <hr style="border:1px solid #000;width:150px;margin-left:-3px;">
   </div>
  

<script type="text/javascript">
  if(window.print()){
       history.back();
  }
 
$(document).ready(function(){
            $('#r_items').DataTable({
                "bLengthChange":false,
                 responsive:true
               
            });
          
        });

   </script>

