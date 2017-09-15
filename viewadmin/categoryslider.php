<!DOCTYPE html>
<html>
<?php
  require_once 'categoryslidercontrol.php';
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Category Sider</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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
<?php require_once 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Slider
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category Slider</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-body">
          <form role="form" method="post">
              <div class="form-group col-sm-6">
                  <select class="form-control select2" name="category" style="width: 100%;" required="">
                    <option value="0">Select Category</option>
                    <?php foreach ($cat as $sc) {
                        if(!array_search($sc->CategoryID, $inarray)) {
                    ?>
                    <option value="<?php echo $sc->CategoryID ?>"><?php echo $sc->CategoryName ?></option>
                  <?php }} s?>
                  </select>
                </div>
              <div class="form-group col-sm-2">
                <button type="submit" name="setcategory" class="form-control btn-primary">Submit</button>
              </div>
          </form>
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>CategorySliderID</th>
                  <th>ProductID</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  if(isset($tblsilder))
                  {
                    foreach ($tblsilder as $lc) {
                        $catecond['CategoryID']=$lc->CategoryID;
                        $cate=$modal->display("tblcategory",0,$catecond,$connection);
                ?>
                <tr>
                  <td><?php echo $cate[0]->CategoryID; ?></td>
                  <td><?php echo $cate[0]->CategoryName; ?></td>
                  <td><span id="status<?php echo $lc->CategoryID; ?>"><?php if($lc->CategorySliderStatus==0) echo "Enable"; else echo "Disable"; ?></span></td>
                  <td class="pull-right">
                  <form method="post">
                      <button type="submit" class=" btn btn-danger" name="btnblock" style="<?php if($lc->CategorySliderStatus==1) echo 'display:none'; ?>" value="<?php echo $lc->CategorySliderID ?>">Block</button>
                      <button type="submit" class=" btn btn-primary" name="btnactive" style="<?php if($lc->CategorySliderStatus==0) echo 'display:none'; ?>" value="<?php echo $lc->CategorySliderID ?>">Acitve</button>
                  </form>
                  </td>
                </tr>
                <?php
                  }
                  } 
                ?>
                </tbody>
            </table>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2015-2017 <a href="http://hacktofni.com">Hacktofni</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
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
