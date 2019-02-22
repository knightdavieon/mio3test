<?php require_once('Connection.php'); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php 
session_start();
$d = date('d');
$m = date('m');
$y = date('Y');
$date = $m . "/" . $d . "/" . $y;
?>
<html>
<head> 
<title> PRINT PREVIEW </title>
 <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/styles.css" rel="stylesheet">
  <link rel="shortcut icon" href="Icons/Logo.png" type="png" sizes="70x70">
</head>
<body style="background:#fff;">
   <div class="container">
      <div class="col-md-10"> 
         <img src="Icons/swLogo.png"  style="height:60px;width:300px;margin-left:28%;">
      </div>    
      </div>
 <hr>
   <div style="margin-top:60px;margin-left:5%;">
    <div class="container">
    <div class="col-md-12">
        <div class="row">
             <div class="col-md-12">
                   <?php 
                      $info_query = "Select * from tbl_branches where branch_code = '" . $_SESSION['b_code'] . "'";
                      $info_result = mysqli_query($conn, $info_query);
                      $info_rows = mysqli_fetch_array($info_result);

                   ?>
                      <label>Branch Code : </label><?php echo $info_rows['branch_code'] ?><br/>
                      <label> Branch Name : </label> <?php echo $info_rows['branch_name']; ?><br/>
                      <div style="margin-top:-19px;position:absolute;margin-left:75%;"><label>Print Date : </label> <?php echo $date; ?> </div>
                
                
                 
    <style type="text/css">  
        .table-bordered th{
        	height:30px;
        }
        .table-bordered td{
        	height:25px;
        }
    </style>       
             <table border="0" cellpadding="0" cellspacing="5" class="table-bordered" style="width:92%;">
             <thead>
             	<tr>
             	  <th> Sales ID </th>
             	  <th> Branch Name </th>
             	  <th> Total Sales  </th>
                  <th> Date Of Transaction </th>
             	 
             	</tr>
             </thead>
               <tbody>

                  <?php 
                     $sales_query = "Select * from tbl_sales_breakdown where branch_name = '" . $_SESSION['b_code'] . "'";
                     $sales_result = mysqli_query($conn, $sales_query);
                     while($frows = mysqli_fetch_array($sales_result)){
                  ?>
              
                     <tr>
                        <td><label style="font-size: 11px;"><?php echo $frows['s_id']; ?></label></td>
                        <td><label style="font-size: 11px;"><?php echo $frows['branch_name']; ?></label></td>
                        <td><label style="font-size:11px;"><?php echo $frows['total_sales']; ?></label></td>
                        <td><label style="font-size:11px;"><?php echo $frows['date_of_sales']; ?></label></td>
                      
                       </tr>
            <?php } ?>
               </tbody>
       </table>         
           
               </div>
         </div>
      </div>
  </div>
 
  <div class="container-fluid">
      <?php 
    
         $query = "Select * from tbl_sales_breakdown where branch_name = '" . $_SESSION['b_code'] . "'";
         $result = mysqli_query($conn, $query);
         $count = mysqli_num_rows($result);
      ?>
       <label style="margin-left:75%;margin-top:10px;"> Total of <?php echo $count;?> items</label>
  
  <div style="margin-top:20px;margin-left:235px;">
     <label> MIO-MIO © 2018 </label>

  </div>
 </div>
 <!--
    <div class="container-fluid" style="margin-top:80px;"> 
    <label> Transfer to: </label> <hr style="position:absolute;margin-top:-10px;margin-left:80px;border:1 solid #000; width:300px;height:2px;background-color:#000; "> <br/><br/>
    
      <label> Prepared by: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php// echo $rows[0]; ?></label> <hr style="position:absolute;margin-top:-5px;margin-left:80px;width:200px;height:2px;background-color:#000; "><br/><br/>
      <label> Noted by : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php// echo $rows[1]; ?></label><hr style="position:absolute;margin-top:-5px;margin-left:80px;width:200px;height:2px;background-color:#000; ">
   <?php
      // }
    ?>
      <br/><br>
     <label> Audited by : </label><hr style="position:absolute;margin-top:-10px;margin-left:80px;width:200px;height:2px;background-color:#000; ">
   </div>
   
   <div style="margin-left:75%;margin-top:-40px;"> <label>Received by: </label>  <hr style="position:absolute;margin-top:-10px;margin-left:80px;width:200px;height:2px;background-color:#000; ">  </div>-->
   <script type="text/javascript"> 
      window.print();
    </script>
</body>
</html>