<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['e_txt_id'])){
            $idd = mysqli_real_escape_string($conn, $_REQUEST['e_txt_id']);
            $txt_category = mysqli_real_escape_string($conn, $_REQUEST['e_txt_category']);
            $duplicate_query = "Select * from tbl_categories where cat_1 = '" . $txt_category . "'";
            $duplicate_result = mysqli_query($conn, $duplicate_query)or die("Error : " . mysqli_error($conn));
            $duplicate_count = mysqli_num_rows($duplicate_result);
            if($duplicate_count > 0){
                   echo "Exist";
            }else{
            $update_query = "Update tbl_categories set cat_1 = '" . $txt_category . "' where _id = '" . $idd . "'";
            $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
            if($update_result === true){
                echo '<thead>';
                      echo '<tr>';
                         echo '<th>' . "Category Id" . '</th>';
                         echo '<th>' . "List of Category" . '</th>';
                         echo '<th>' . "Option" . '</th>';
                      echo '<tr>';
                    echo '</thead>';
            echo '<tbody>'; 
             $select_query = "Select * from tbl_categories order by cat_1";
             $select_result = mysqli_query($conn, $select_query);
             while($select_rows = mysqli_fetch_array($select_result)){
                 echo '<tr>';
                      echo '<td>' . $select_rows['_id'] . '</td>';
                      echo '<td>' . $select_rows['cat_1'] . '</td>';
                     echo '<td>' . '<button type="button" data-toggle="modal" data-target="#edit_category" class="btn btn-primary"><i class="material-icons">mode_edit</i></button>' . "&nbsp;" . '<button type="submit" class="btn btn-danger" name="btn_remove" onclick="return confirm("Are you sure you want to remove this one ?")" value="'. $select_rows['_id'] .'"><i class="material-icons">delete</i></button>' . '</td>';
                  echo '<tr>';
             }
             echo '</tbody>';
        }
    }
            
}
?>