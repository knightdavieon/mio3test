<?php require_once("Connection.php"); ?>
<?php
if(isset($_POST['data'])){
  $arrayList = $_POST['data'];
  ?>
  <table class="table table-bordered table-striped" id="selected_table">
    <thead>
      <tr>
        <th> Transaction Number </th>
        <th> Item Barcode </th>
        <th> Item Name </th>
        <th> Quantity </th>
        <th> Price </th>
        <th> Staff Name </th>
        <th> Staff Code </th>
        <th> TS Type </th>
        <th> Branch </th>
        <th> Transfer Status </th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($arrayList as $frows){

        $query = "Select * From tbl_branch_goods_receive_history where transaction_number IN ('" . $frows . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        while($rows = mysqli_fetch_array($result)){
          ?>
          <tr>
            <td><?php echo $rows['transaction_number']; ?></td>
            <td><?php echo $rows['item_barcode']; ?></td>
            <td><?php echo $rows['item_name']; ?></td>
            <td><?php echo $rows['item_quant']; ?></td>
            <td><?php echo $rows['item_price']; ?></td>
            <td><?php echo $rows['person_transfered']; ?></td>
            <td><?php echo $rows['employee_code']; ?></td>
            <td><?php echo $rows['ts_type']; ?></td>
            <td><?php echo $rows['branch']; ?></td>
            <td><?php echo $rows['transfer_status']; ?></td>
          </tr>
          <?php
        }
      }
      ?>
    </tbody>
  </table>
  <script>
  $(document).ready(function(){
    document.onkeydown=function(evt){
      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if(keyCode == 13)
      {
        //your function call here
        document.test.submit();
      }
    }
    $('#selected_table').DataTable({
      /*  dom: 'Bfrtip',
      buttons: [
      'print','pdf', 'csv'
    ],*/
    responsive:true
  });

  });

  </script>
  <?php
}
?>
