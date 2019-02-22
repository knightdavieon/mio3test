<?php require_once('Connection.php'); session_start(); //echo "<script>alert('" . $_SERVER['PHP_SELF']. "');</script>";?>
<?php
  if(isset($_SESSION['islogged_in'])){ header('Location:dashboard.php'); }
?>

<!doctype html>
<html lang="en">
       <head>
         <meta content="width=device-width, initial-scale=1.0" name="viewport">
         <title> </title>
               <!-- <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <!-- End of DataTable CDN -->
        <style type="text/css">
              .navbar-inverse{
                     background-color:black;
                     border-color:#ff6600;
                     color:#fff;
              }
              .navbar-brand{
                  color:#fff;
              }
           </style>
          </head>
          <body>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
               <div class="navbar navbar-inverse navbar-fixed-top">
                     <div class="container-fluid">
                             <div class="navbar-header">
                                   <a  href="#" class="navbar-brand" style="color:#fff;"> <img src="Icons/swLogow.png" style="height:60px;margin-top:-17px;"> </a>
                                </div>
                        </div>
                 </div>
                 <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 col-md-offset-1" style="margin-top:85px;">
                     <style type="text/css">
                            table.dataTable thead th{
                                 background-color:gray;
                                 color:#fff;
                                 opacity:0.7;
                            }
                        </style>
                    <table id="tbl_branches" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th> Branch Code </th>
                                 <th> Branch Name </th>
                              </tr>
                          </thead>
                          <tbody>
                               <?php
                                   $retrieve_query = "Select * from tbl_branches";
                                   $retrieve_result = mysqli_query($conn, $retrieve_query)or die("Error : " . mysqli_error($conn));
                                   while($retrieve_rows = mysqli_fetch_array($retrieve_result)){
                                       if($retrieve_rows['status'] != "DEACTIVE"){
                                      ?>
                                      <tr>
                                           <td><a href="login_page.php?b_code=<?php echo $retrieve_rows['branch_code'] ?>" class="btn btn-primary" style="height:30px; width:150px;padding-top:0;"><?php echo $retrieve_rows['branch_code']; ?></td>
                                           <td><?php echo $retrieve_rows['branch_name']; ?></td>
                                        </tr>
                                <?php
                                   }
                                }
                               ?>

                             </tbody>
                       </table>
                    </div>
               </form>
               <script>
                    $('#tbl_branches').DataTable({
                            responsive:true
                    });
                  </script>
          <!--  <div class="navbar navbar-default navbar-fixed-bottom">
              </div> -->
            </body>
  </html>
