<?php require_once("Connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>
        <body>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
              <button type="button" id="btn_view" style="cursor:pointer;"> Check </button>
                      <table border="1" cellpadding="0" cellspacing="0">
                            <thead>
                                  <tr>
                                       <th> <input type="checkbox" id="main_check"></th>
                                       <th> Transaction Number  </th>
                                       <th> Staff Code  </th>
                                       <th> Branch Code  </th>
                                   </tr>
                               </thead>
                               <tbody>
                                    <?php 
                                       $query = "Select * from tbl_branch_transfer_series";
                                       $result = mysqli_query($conn, $query);
                                       while($rows = mysqli_fetch_array($result)){
                                        ?>
                                           <tr>
                                               <td><input type="checkbox" name="id[]" class="checkbox" id="<?php echo $rows['transaction_number']; ?>"></td>
                                               <td><?php echo $rows['transaction_number']; ?></td>
                                               <td><?php echo $rows['staff_code']; ?></td>
                                               <td><?php echo $rows['branch_code']; ?></td>
                                             </tr>
                                        <?php
                                       }
                                    ?>
                                  </tbody>
                        </table>

                        <div id="data_div"> </div>
                    <script type="text/javascript">
                            $(document).ready(function(){
                                $('#main_check').click(function(){
                                     if(this.checked){
                                         $('.checkbox').each(function(){
                                               this.checked = true;
                                         });
                                     }else{
                                        $('.checkbox').each(function(){
                                               this.checked = false;
                                         });
                                     }
                                });
                                $('#btn_view').click(function(){
                                     var arrayList = new Array();
                                     if($('input:checkbox:checked').length > 0){
                                         $('input:checkbox:checked').each(function(){
                                             arrayList.push($(this).attr("id"));
                                             $.ajax({
                                                 type      :     "POST",
                                                 url       :     "sample_mviewing_query.php",
                                                 data      :     {'data':arrayList},
                                                 success   :     function(result){
                                                                   document.getElementById("data_div").innerHTML = result;
                                                 },
                                                 error     :     function(errorResult){
                                                                    alert(errorResult);
                                                 }
                                             })
                                         });
                                     }else{
                                          alert("No item selected");
                                     }
                                });
                            });
                     </script>
                 </form>
          </body>
 </html>