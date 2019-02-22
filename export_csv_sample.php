<?php include("simple_html_dom.php"); require_once("Connection.php"); ?>
<?php 
        if(isset($_POST['btn_submit'])){
          ob_end_clean();
            $query = "Select * from tbl_sales";
            $result = mysqli_query($conn, $query);
            $table = '<table border="1" cellpadding="1" cellspacing="2">
                 <thead>
                     <tr>
                         <th> Staff Code  </th>
                         <th> Staff Name  </th>
                       </tr>
                   </thead>
                   <tbody>';
            while($rows = mysqli_fetch_array($result)){
               $table = '
                    
                        <tr>
                           <td style="width:500px;"> '. $rows['staff_code'] .' </td>
                           <td> '. $rows['staff_name'] .' </td>
                          </tr>
                     
               ';
                  $html = str_get_html($table); 
            
            $output = fopen('php://output', 'w');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=transaction_format.csv'); 
            foreach($html->find('tr') as $element){
                 $td = array();
                 foreach($element->find('th') as $rows){
                     $td[] = $rows->plaintext;
                 }
                 fputcsv($output, $td);
                 $td = array();
                 foreach($element->find('td') as $rows){
                     $td[] = $rows->plaintext;
                 }
                 fputcsv($output, $td);
            }
         }
         $table =' </tbody>
         </table>';
            
            exit(); 
        
        }
            
?>
<!DOCTYPE html>
<html lang="en">
     <head>
           <title> </title>
        </head>
        <body>
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                     <button type="submit" name="btn_submit"> Download </button>
                 </form>
          </body>

  </html>