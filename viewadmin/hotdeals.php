<!DOCTYPE html>
<html>
<?php require_once 'hotdealscontrol.php'; ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hot Deals</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">
      function setvalue(value,status)
      {
        var abc;
        if(window.XMLHttpRequest)
        {
          abc=new XMLHttpRequest();
        }
        else
        {
          abc=new ActiveXObject("Microsoft.XMLHTTP");
        }
        abc.open("GET","hotdealscontrol.php?val="+value+"&state="+status,true);
        abc.send();
        //alert(status);  
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
            //document.getElementById("demo").innerHTML = abc.responseText;
          }
    }
  }
    </script>
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
        Hot Deals
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hot deals</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title" id="demo"></h3>
        </div>
        <div class="box-body" style="overflow: scroll;">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Brand</th>
                  <th>Cost</th>
                  <th>Discount Percentage</th>
                  <th>Discount Amount</th>
                  <th>Selling Price</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($prod as $p) { 
                      $icond['ProductID']=$p->ProductID;
                      $img=$modal->display("tblproductimage",0,$icond,$connection,0,0,0,0,"1");
                  ?>
                <tr>
                  <td>
                    <input type="checkbox" onchange="setvalue(this.value,<?php if(array_search($p->ProductID, $inarray)) echo '1'; else echo '2'; ?>);location.href='hotdeals.php';" class="minimal" name="putin" value="<?php echo $p->ProductID; ?>" <?php if(array_search($p->ProductID, $inarray))
                          echo "checked"; ?>>
                    <?php
                    if(isset($inarray))
                    {
                      if(array_search($p->ProductID, $inarray))
                        echo "<label>Inline</label>";
                      else
                        echo "<label style='visibility:hidden'>p</label>";
                    }
                    ?>
                  </td>
                  <td><img src="../src/images/products/<?php if(isset($img)) echo $img[0]->ImageURL ?>" width="100px" height="100px" alt="IMAGE" ></td>
                  <td><?php echo $p->ProductName ?></td>
                  <td><?php echo $p->Brand ?></td>
                  <td><?php echo $p->Cost ?></td>
                  <td><?php echo $p->DiscountPercentage ?></td>
                  <td><?php echo $p->DiscountAmount ?></td>
                  <td><?php echo $p->SellingPrice ?></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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