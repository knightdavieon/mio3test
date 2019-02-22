<?php require_once("Connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
     <head>
           <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
        </head>
        <body>
                  <label> Employee Code </label>
                  <input type="text" id="ecode">
                  <label> Name </label>
                  <input type="text" id="name">
                  <label> Inventory Code </label>
                  <input type="text" id="inventory_code">
                  <label> Item Name</label>
                  <input type="text" id="item_name">
                  <label> Item Sold </label>
                  <input type="text" id="item_sold">

                  <button type="button" id="btn_submit"> Submit </button>
                       <table id="table1" border="1">
                                <thead>
                                      <tr>
                                          <th> Employee Code </th>
                                          <th> Full Name </th>
                                          <th> Inventory Code </th>
                                          <th> Item Name </th>
                                          <th> Item Sold </th>
                                       </tr>
                                   </thead>
                          </table>
              <script type="text/javascript">
                     $(document).ready(function(){
                            $('#table1').DataTable(function(){
                                   responsive:true
                            });
                            $('#btn_submit').click(function(){
                                
                                   var employee_code = $('#ecode').val();
                                   var name = $('#name').val();
                                   var inventory_code = $('#inventory_code').val();
                                   var item_name = $('#item_name').val();
                                   var item_sold = $('#item_sold').val();
                                   $.ajax({
                                       type:"POST",
                                       url:"realtime_query.php",
                                       data:{ecode:employee_code, name:name, inventory_code:inventory_code, item_name:item_name, item_sold:item_sold},
                                       success:function(result){
                                            document.getElementById("table1").innerHTML = result;
                                       }
                                   });
                              
                              
                            });
                     });
                 </script>
           </body>
  </html>