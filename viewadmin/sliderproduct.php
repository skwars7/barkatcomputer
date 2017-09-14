<!DOCTYPE html>
<html>
<?php require_once 'sliderproductcontrol.php'; ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Slider Products</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- =============================================== -->
<?php require_once("header.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slider Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">SliderProduct</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box" style="overflow: scroll;">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Brand</th>
                  <th>Cost</th>
                  <th>Discount Percentage</th>
                  <th>Discount Amount</th>
                  <th>Selling Price</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                if(isset($prod))
                {
                  foreach ($prod as $p) { 
                ?>
                <tr>
                  <td><?php echo $p->ProductName ?></td>
                  <td><?php echo $p->Brand ?></td>
                  <td><?php echo $p->Cost ?></td>
                  <td><?php echo $p->DiscountPercentage ?></td>
                  <td><?php echo $p->DiscountAmount ?></td>
                  <td><?php echo $p->SellingPrice ?></td>
                  <td>
                  <form method="get">
                      <?php
                          if(!array_search($p->ProductID, $sarr))
                          {
                            $val=array_search($p->ProductID, $sarr);
                              ?>
                              <button type="submit" class="btn btn-success" name="btnadd" value="<?php echo $p->CategoryID ?>">Add</button>
                              <input type="hidden" name="pid" value="<?php echo $p->ProductID ?>">
                              <?php
                          }
                          else
                          {

                            ?>
                              <button type="submit" class="btn btn-primary" name="btndelete" value="<?php echo array_search($p->ProductID, $sarr) ?>">Delete</button>
                              <?php
                          }
                      ?>
                      <input type="hidden" name="prod" value="<?php echo $_REQUEST['prod'] ?>">
                      </form>
                  </td>
                </tr>
                <?php }} ?>
                </tbody>
              </table>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
