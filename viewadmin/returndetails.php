<!DOCTYPE html>
<html>
<?php
require_once 'returndetailscontrol.php';
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Return Details</title>
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
       Return Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Returndetails</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-danger">
      <form method="post">
        <div class="box-header with-border">
          <h3 class="box-title">Return Status</h3>
        </div>
        <div class="box-body">
          <div class="col-sm-6">
            <label class="pull-left">Return Status
                <select name="chgstatus">
                    <option value="0" <?php if($status[0]->ReturnStatus==0) echo "Selected" ?>>Not Requested</option>
                    <option value="1" <?php if($status[0]->ReturnStatus==1) echo "Selected" ?>>Requested Return</option>
                    <option value="2" <?php if($status[0]->ReturnStatus==2) echo "Selected" ?>>Return Confirmed/Processing</option>
                    <option value="3" <?php if($status[0]->ReturnStatus==3) echo "Selected" ?>>Returned</option>
                </select>
            </label>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-primary pull-right" name="btnstatus" type="submit">Submit</button>
        </div>
        </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Return Detail</h3>
        </div>
        <div class="box-body">
          <div class="col-sm-6">
              <div class="col-sm-12">
                  ReturnID:<label><?php echo $status[0]->ReturnID ?></label>
              </div>
              <div class="col-sm-12">
                  Date&Time:<label><?php echo $status[0]->CreateDateTime ?></label>
              </div>
          </div>
          <div class="col-sm-6">
            <div class="col-sm-12">
                  UserID:<label><?php echo $usr[0]->UserID ?></label>
            </div>
            <div class="col-sm-12">
                 Name:<label><?php echo $usr[0]->FirstName." ".$usr[0]->LastName ?></label>
            </div>
          </div>
        </div>
      </div>


      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Order Detail</h3>
        </div>
        <div class="box-body">
          <div class="col-sm-6">
              <div class="col-sm-12">
                  OrderID:<label><?php echo $order[0]->OrderID ?></label>
              </div>
              <div class="col-sm-12">
                  Date&Time:<label><?php echo $order[0]->CreateDateTime ?></label>
              </div>
          </div>
          <div class="col-sm-6">
            <div class="col-sm-12">
                  UserID:<label><?php echo $order[0]->UserID ?></label>
            </div>
            <div class="col-sm-12">
                 Name:<label><?php echo $usr[0]->FirstName." ".$usr[0]->LastName ?></label>
            </div>
          </div>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Shipping Detail</h3>
        </div>
        <div class="box-body">
          <div class="col-sm-6">
              <div class="col-sm-12">
                  ShippingID:<label><?php echo $ship[0]->ShippingID ?></label>
              </div>
              <div class="col-sm-12">
                  Receiving Date:<label><?php echo $ship[0]->ReceiverDate ?></label>
              </div>
              <div class="col-sm-12">
                  State:<label><?php echo $city[0]->StateName ?></label>
              </div>
              <div class="col-sm-12">
                  City:<label><?php echo $city[0]->CityName ?></label>
              </div>
          </div>
          <div class="col-sm-6">
            <div class="col-sm-12">
                  Receiver Name:<label><?php echo $ship[0]->ReceiverName ?></label>
            </div>
            <div class="col-sm-12">
                 Receiver Address:<label><?php echo $ship[0]->ReceiverAddress ?></label>
            </div>
            <div class="col-sm-12">
                 Phone No:<label><?php echo $ship[0]->ContactNo ?></label>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Products Detail</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                  <th>Product-ID</th>
                  <th>Image</th>
                  <th>ProductName</th>
                  <th>Cost</th>
                  <th>Discount Percentage</th>
                  <th>Sell Amount</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
                <?php $sum=0; foreach ($prod as $p) {  
                    $icond['ProductID']=$p->ProductID;
                    $img=$modal->display("tblproductimage",0,$icond,$connection);
                  ?>
                <tr>
                  <td><?php echo $p->ProductID ?></td>
                  <td><img src="../src/images/products/<?php echo $img[0]->ImageURL ?>" width="50px" height="50px"></td>
                  <td><?php echo $p->ProductName ?></td>
                  <td><?php echo $p->Cost ?></td>
                  <td><?php echo $p->DiscountPercentage ?></td>
                  <td><?php echo $p->SellingPrice; ?></td>
                  <td><?php echo $p->Quantity; ?></td>
                  <td><?php echo $p->SellingPrice*$p->Quantity; $sum=$sum+$p->SellingPrice*$p->Quantity; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                  <th><font size="4px">Grand Total</font></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><font size="5px" class="label-success" style="padding:4px; border-radius: 15%" ><?php echo $sum; ?></font></th>
            </tfoot>
          </table>
        </div>
      </div>
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
</body>
</html>