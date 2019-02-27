<?php
if($_SESSION['admin_priv'] != "B_ADMIN"){
  ?>

  <!-- Menu -->
  <div class="menu">
    <ul class="list">
      <li class="header">MAIN NAVIGATION</li>

      <li <?php echo ("/mio3/sales_page.php") ? 'class="active"' : ''; ?>> </li>
      <li <?php echo ("/mio3/dashboard.php") ? 'class="active"' : ''; ?>>
        <a href="dashboard.php">
          <i class="material-icons">home</i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Reports -->
      <?php
      if($_SESSION['b_code'] == "SWHO"){
        ?>
        <li <?php if("/mio3/transfer_stocks_reports.php"){ echo 'class="active"';}
        elseif("/mio3/transfer_stocks_report_page.php"){ echo 'class="active"';}
        elseif("/mio3/swho_branch_transfer_stocks.php"){ echo 'class="active"';}
        elseif("/mio3/swho_branch_transfer_stocks_data.php"){ echo 'class="active"';}
        elseif("/mio3/goods_receive_reports.php"){ echo 'class="active"'; }
        elseif("/mio3/goods_receive_reports_page.php"){ echo 'class="active"'; }
        elseif("/mio3/sales_reports.php"){ echo 'class="active"'; }
        elseif("/mio3/sales_report_data.php"){ echo 'class="active"'; }
        elseif("/mio3/branch_inventory_reports.php"){ echo 'class="active"'; }
        elseif("/mio3/branch_sales_return_page.php"){ echo 'class="active"'; } ?>>
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">work</i>
          <span>Reports</span>
        </a>
        <ul class="ml-menu">

          <li <?php if("/mio3/transfer_stocks_reports.php"){ echo 'class="active"'; }elseif("/mio3/transfer_stocks_report_page.php"){ echo 'class="active"'; } ?>>
            <a href="transfer_stocks_reports.php">Transfer Stocks</a>
          </li>
          <li <?php if("/mio3/swho_branch_transfer_stocks.php"){ echo 'class="active"'; }elseif("/mio3/swho_branch_transfer_stocks_data.php"){ echo 'class="active"'; } ?>>
            <a href="swho_branch_transfer_stocks.php"> Branch Transfer Stocks</a>
          </li>
          <li <?php if("/mio3/goods_receive_reports.php"){ echo 'class="active"'; }elseif("/mio3/goods_receive_reports_page.php"){ echo 'class="active"'; } ?>>
            <a href="goods_receive_reports.php">Goods Receive</a>
          </li>
          <li <?php if("/mio3/branch_sales_return_page.php"){ echo 'class="active"'; } ?>>
            <a href="branch_sales_return_page.php">Sales Return</a>
          </li>
          <li <?php if("/mio3/sales_reports.php"){ echo 'class="active"'; }elseif("/mio3/sales_report_data.php"){ echo 'class="active"'; } ?>>
            <a href="sales_reports.php">Sales Report</a>
          </li>
          <li <?php if("/mio3/branch_inventory_reports.php"){ echo 'class="active"'; } ?>>
            <a href="branch_inventory_reports.php">Branch Inventory Report</a>
          </li>

        </ul>
      </li>
      <?php
    }
    ?>
    <!-- #END# of reports -->



  </ul>
</div>
<!-- #Menu -->
<?php
}else{

  ?>


  <!-- Menu -->
  <div class="menu">
    <ul class="list">
      <li class="header">MAIN NAVIGATION</li>

      <li <?php echo ("/mio3/sales_page.php") ? 'class="active"' : ''; ?>> </li>
      <li <?php echo ("/mio3/dashboard.php") ? 'class="active"' : ''; ?>>
        <a href="dashboard.php">
          <i class="material-icons">home</i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Manage Items -->
      <?php
      if($_SESSION['b_code'] == "SWHO"){
        ?>
        <li <?php if("/mio3/edit_items_table.php"){ echo 'class="active"';}elseif("/mio3/edit_items_page.php"){echo 'class="active"';}elseif("/mio3/edit_history_page.php"){echo 'class="active"';}elseif("/mio3/Create_item_page.php"){echo 'class="active"';} ?>>
          <a href="#" class="menu-toggle">
            <i class="material-icons">dashboard</i>
            <span>Manage Items</span>
          </a>
          <ul class="ml-menu">

            <li <?php echo ("/mio3/Create_item_page.php") ? 'class="active"' : ''; ?>>
              <a href="Create_item_page.php">Create Item</a>
            </li>


            <li <?php if("/mio3/edit_items_table.php"){ echo 'class="active"';}elseif("/mio3/edit_items_page.php"){echo 'class="active"';}elseif("/mio3/edit_history_page.php"){echo 'class="active"';} ?>>
              <a href="edit_items_table.php">Edit Items</a>
            </li>

          </ul>
        </li>

        <?php
      }
      ?>

      <!-- #END# of Manage Items -->
      <!-- Inventory -->
      <?php
      if($_SESSION['b_code'] == "SWHO"){
        ?>
        <li <?php if("/mio3/inventory_items.php"){echo 'class="active"';}elseif("/mio3/goods_receive_page.php"){echo 'class="active"';} ?>>
          <a href="#" class="menu-toggle">
            <i class="material-icons">done_all</i>
            <span>Inventory</span>
          </a>
          <ul class="ml-menu">
            <li <?php echo ("/mio3/inventory_items.php") ? 'class="active"' : ''; ?>>
              <a href="inventory_items.php"> Items </a>
            </li>
            <li <?php echo ("/mio3/goods_receive_page.php") ? 'class="active"' : ''; ?>>
              <a href="goods_receive_page.php">Goods Receive</a>
            </li>
          </ul>
        </li>
        <?php
      }else{
        // For Branches
        ?>
        <li <?php echo ("/mio3/branch_inventory_page.php") ? 'class="active"' : ''; ?>>
          <a href="sales_page.php"><i class="material-icons">shopping_cart</i><span>Sales</span></a>
          <a href="#" class="menu-toggle">
            <i class="material-icons">done_all</i>
            <span>Inventory</span>
          </a>

          <ul class="ml-menu">

            <li <?php echo ("/mio3/branch_inventory_page.php") ? 'class="active"' : ''; ?>>
              <a href="branch_inventory_page.php">Goods Receive</a>
            </li>
          </ul>
        </li>

        <?php
      }
      ?>
      <!-- #END# of Inventory -->
      <!-- For Approval and Receiving -->
      <?php
      if($_SESSION['b_code'] == "SWHO"){
        ?>
        <li <?php if("/mio3/approval_page.php"){echo 'class="active"';}elseif("/mio3/approval_page_data.php"){echo 'class="active"';} ?>>
          <a href="approval_page.php">
            <i class="material-icons">assignment</i>
            <span>Approval </span>
          </a>
        </li>
        <li <?php if("/mio3/swho_receiving_items.php"){echo 'class="active"';}elseif("/mio3/swho_receiving_commit.php"){echo 'class="active"';} ?>>
          <a href="swho_receiving_items.php">
            <i class="material-icons">keyboard_return</i>
            <span>Receiving </span>
          </a>
        </li>
        <?php
      }else{
        ?>
        <li <?php if("/mio3/branch_receiving_items.php"){echo 'class="active"';}elseif("/mio3/branch_receiving_commit.php"){echo 'class="active"';}elseif("/mio3/branch_receiving_page.php"){echo 'class="active"';}elseif("/mio3/branch_receiving_data.php"){echo 'class="active"';} ?>>
          <a href="#" class="menu-toggle">
            <i class="material-icons">assignment</i>
            <span>Receiving</span>
          </a>
          <ul class="ml-menu">

            <li <?php if("/mio3/branch_receiving_items.php"){echo 'class="active"';}elseif("/mio3/branch_receiving_commit.php"){echo 'class="active"';} ?>>
              <a href="branch_receiving_items.php"> From H.O </a>
            </li>
            <li <?php if("/mio3/branch_receiving_page.php"){echo 'class="active"';}elseif("/mio3/branch_receiving_data.php"){echo 'class="active"';} ?>>
              <a href="branch_receiving_page.php"> From Branches </a>
            </i>
          </ul>
        </li>

        <?php
      }
      ?>
      <!--  #END#  of for approval and receiving -->

      <!-- Lookup -->

      <?php
      if($_SESSION['b_code'] == "SWHO"){
        ?>
        <!--
        <li <?php if("/mio3/swho_transfer_items_page.php"){echo 'class="active"';}elseif("/mio3/swho_transfer_items_data.php"){echo 'class="active"';} ?>>
        <a href="swho_transfer_items_page.php">

        <i class="material-icons">find_in_page</i>
        <span>Lookup</span>
      </a>


    </li> -->
    <?php
  }else{
    ?>

    <li <?php if("/mio3/branch_transfer_history_page.php"){echo 'class="active"';}elseif("/mio3/branch_transfer_history_data.php"){echo 'class="active"';}elseif("/mio3/branch_goods_receive_history.php"){echo 'class="active"';}elseif("/mio3/branch_goods_receive_history_data.php"){echo 'class="active"';}elseif("/mio3/item_receive_branch_table.php"){echo 'class="active"';}elseif("/mio3/item_receive_branch_data.php"){echo 'class="active"';}elseif("/mio3/branch_sales_report_page.php"){echo 'class="active"';}elseif("/mio3/branch_sales_report_data.php"){echo 'class="active"';}elseif("/mio3/branch_sales_return_page.php"){echo 'class="active"';} ?>>
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">find_in_page</i>
        <span>Lookup</span>
      </a>
      <ul class="ml-menu">

        <li <?php if("/mio3/branch_transfer_history_page.php"){echo 'class="active"';}elseif("/mio3/branch_transfer_history_data.php"){echo 'class="active"';} ?>>
          <a href="branch_transfer_history_page.php">Transfer Stocks</a>
        </li>
        <li <?php if("/mio3/branch_goods_receive_history.php"){echo 'class="active"';}elseif("/mio3/branch_goods_receive_history_data.php"){echo 'class="active"';} ?>>
          <a href="branch_goods_receive_history.php">Item Received (HO)</a>
        </li>
        <li <?php if("/mio3/item_receive_branch_table.php"){echo 'class="active"';}elseif("/mio3/item_receive_branch_data.php"){echo 'class="active"';} ?>>
          <a href="item_receive_branch_table.php">Item Received (Branch)</a>
        </li>
        <li <?php if("/mio3/branch_sales_report_page.php"){echo 'class="active"';}elseif("/mio3/branch_sales_report_data.php"){echo 'class="active"';} ?>>
          <a href="branch_sales_report_page.php">Sales Report</a>
        </li>
        <li <?php if("/mio3/branch_sales_return_page.php"){echo 'class="active"';}?>>
          <a href="branch_sales_return_page.php">Sales Return</a>
        </li>

      </ul>
    </li>

    <?php
  }
  ?>
  <!-- #END# of lookup -->

  <!-- Transfer Stocks -->
  <?php
  if($_SESSION['b_code'] == "SWHO"){
    ?>
    <li <?php if("/mio3/transfer_page.php"){echo 'class="active"';}elseif("/mio3/my_transaction_page.php"){echo 'class="active"';} ?>>
      <a href="transfer_page.php">

        <i class="material-icons">repeat</i>
        <span>Transfer Stocks</span>
      </a>


    </li>

    <?php
  }else{
    ?>
    <li <?php if("/mio3/branch_transfer_page.php"){echo 'class="active"';} ?>>
      <a href="branch_transfer_page.php">

        <i class="material-icons">repeat</i>
        <span>Transfer Stocks</span>
      </a>


    </li>
    <?php
  }
  ?>
  <!-- #END# of transfer stocks -->
  <!-- Reports -->
  <?php
  if($_SESSION['b_code'] == "SWHO"){
    ?>
    <li <?php if("/mio3/transfer_stocks_reports.php"){ echo 'class="active"';}elseif("/mio3/transfer_stocks_report_page.php"){ echo 'class="active"';}elseif("/mio3/swho_branch_transfer_stocks.php"){ echo 'class="active"';}elseif("/mio3/swho_branch_transfer_stocks_data.php"){ echo 'class="active"';}elseif("/mio3/goods_receive_reports.php"){ echo 'class="active"'; }elseif("/mio3/goods_receive_reports_page.php"){ echo 'class="active"'; }elseif("/mio3/sales_reports.php"){ echo 'class="active"'; }elseif("/mio3/sales_report_data.php"){ echo 'class="active"'; }elseif("/mio3/branch_inventory_reports.php"){ echo 'class="active"'; }elseif("/mio3/branch_sales_return_page.php"){ echo 'class="active"'; } ?>>
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">work</i>
        <span>Reports</span>
      </a>
      <ul class="ml-menu">

        <li <?php if("/mio3/transfer_stocks_reports.php"){ echo 'class="active"'; }elseif("/mio3/transfer_stocks_report_page.php"){ echo 'class="active"'; } ?>>
          <a href="transfer_stocks_reports.php">Transfer Stocks</a>
        </li>
        <li <?php if("/mio3/swho_branch_transfer_stocks.php"){ echo 'class="active"'; }elseif("/mio3/swho_branch_transfer_stocks_data.php"){ echo 'class="active"'; } ?>>
          <a href="swho_branch_transfer_stocks.php"> Branch Transfer Stocks</a>
        </li>
        <li <?php if("/mio3/goods_receive_reports.php"){ echo 'class="active"'; }elseif("/mio3/goods_receive_reports_page.php"){ echo 'class="active"'; } ?>>
          <a href="goods_receive_reports.php">Goods Receive</a>
        </li>
        <li <?php if("/mio3/branch_sales_return_page.php"){ echo 'class="active"'; } ?>>
          <a href="branch_sales_return_page.php">Sales Return</a>
        </li>
        <li <?php if("/mio3/sales_reports.php"){ echo 'class="active"'; }elseif("/mio3/sales_report_data.php"){ echo 'class="active"'; } ?>>
          <a href="sales_reports.php">Sales Report</a>
        </li>
        <li <?php if("/mio3/branch_inventory_reports.php"){ echo 'class="active"'; } ?>>
          <a href="branch_inventory_reports.php">Branch Inventory Report</a>
        </li>

      </ul>
    </li>
    <?php
  }
  ?>
  <!-- #END# of reports -->

  <?php
  if($_SESSION['b_code'] == "SWHO" && $_SESSION['usertype'] == "ADMIN"){
    ?>
    <!-- Settings -->

    <li <?php  if("/mio3/inventory_adjustment_table.php"){ echo 'class="active"'; }elseif("/mio3/new_user_page.php") {echo 'class="active"';}elseif("/mio3/new_shopfront_page.php"){ echo 'class="active"'; }elseif("/mio3/inventory_adjustment_history.php"){ echo 'class="active"'; }elseif("/mio3/inventory_adjustment_page.php"){ echo 'class="active"'; }elseif("/mio3/manage_staffs_page.php"){ echo 'class="active"'; }elseif("/mio3/mio_category_page.php"){ echo 'class="active"'; }elseif("/mio3/manage_branches_page.php"){ echo 'class="active"'; }elseif("/mio3/promotional_sales.php"){ echo 'class="active"'; }elseif('/mio3/promotional_set_page.php'){ echo 'class="active"'; } ?>>
      <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">perm_data_setting</i>
        <span>Settings</span>
      </a>
      <ul class="ml-menu">

        <li <?php echo ("/mio3/new_user_page.php") ? 'class="active"' : ''; ?>><a href="new_user_page.php">New User</a></li>
        <li <?php echo ("/mio3/new_shopfront_page.php") ? 'class="active"' : ''; ?>><a href="new_shopfront_page.php">New Branch</a></li>
        <?php
        if($_SESSION['super_admin'] == "SUPER"){
          ?>

          <li <?php if("/mio3/inventory_adjustment_table.php"){ echo 'class="active"';}elseif($_SERVER['PHP_SELF']=="/mio3/inventory_adjustment_page.php"){ echo 'class="active"';}elseif("/mio3/inventory_adjustment_history.php"){echo 'class="active"'; } ?>> <a href="inventory_adjustment_table.php" >Inventory Adjustment</a> </li>
          <li <?php echo ("/mio3/manage_staffs_page.php") ? 'class="active"' : ''; ?>> <a href="manage_staffs_page.php">Manage Staffs</a> </li>
          <li <?php echo ("/mio3/mio_category_page.php") ? 'class="active"' : ''; ?>> <a href="mio_category_page.php" >Manage Categories</a> </li>
          <li <?php echo ("/mio3/manage_branches_page.php") ? 'class="active"' : ''; ?>> <a href="manage_branches_page.php" >Manage Branches</a> </li>
          <li <?php if("/mio3/promotional_sales.php"){ echo 'class="active"'; }elseif('/mio3/promotional_set_page.php'){ echo 'class="active"'; }?>> <a href="promotional_sales.php" >Promotional Sales</a> </li>
          <?php
        }
        ?>


      </ul>
    </li>
    <?php
  }else{
    ?>
    <?php
    if($_SESSION['usertype'] == "ADMIN"){
      ?>
      <li <?php echo ("/mio3/manage_staffs_page.php") ? 'class="active"' : '';?>>
        <a href="javascript:void(0);" class="menu-toggle">
          <i class="material-icons">perm_data_setting</i>
          <span>Settings</span>
        </a>
        <ul class="ml-menu">
          <li <?php echo ("/mio3/manage_staffs_page.php") ? 'class="active"' : '';?>>
            <a href="manage_staffs_page.php">Manage Staffs</a>
          </li>
        </ul>
      </li>
      <?php
    }
  }
  ?>
  <!-- #END# of Settings -->


</ul>
</div>
<!-- #Menu -->

<?php } ?>
