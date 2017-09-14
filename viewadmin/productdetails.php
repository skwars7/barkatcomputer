<!DOCTYPE html>
<html>
<?php
require_once 'productdetailscontrol.php';
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Products Details</title>
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
  <script type="text/javascript">
    function getvalue(val1,val2)
    {
        calc=(val2/100)*val1;
        document.getElementById("disamt").value=calc;
        document.getElementById("sellpr").value=val1-calc;
    }
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- =============================================== -->
<?php require_once 'header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product's Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product details</li>
      </ol>
    </section>
<!-- style="height:1000px;overflow:scroll;" -->
    <!-- Main content -->
    <section class="content clearfix" >
      <!-- Default box -->
      <div class="col-md-12 ">
        <div class="box box-info">
        <div class="box-header with-border">
             <h3 class="box-title">Click On Image to change it</h3>
        </div>
      <div class="box-body">
        <center>
        <?php
          $cnt=1;
          if(isset($img)) {
            foreach ($img as $i) {
        ?>
            <div class="col-md-3">
              <form method="post" enctype="multipart/form-data">                
                  <a href="#" onclick="$('#imgpic<?php echo $i->ProductImageID ?>').trigger('click');">
                    <img class="img-responsive" src="../src/images/products/<?php echo $i->ImageURL;?>" width="200px" alt="Image Not Found" >
                  </a>
                  <input type="hidden" name="imgid" value="<?php echo $i->ProductImageID ?>">
                  <input type="file" id="imgpic<?php echo $i->ProductImageID ?>" name="img<?php echo $i->ProductImageID ?>" onchange="this.form.submit()" style="display: none">
                  <br> 
              </form>
            </div>
        <?php $cnt++; }} if($cnt<=4){?>
            <div class="col-md-3">
              <form method="post" enctype="multipart/form-data">                
                  <a href="#" onclick="$('#addimg').trigger('click');">
                    <img class="img-responsive" src="../src/images/add.svg" width="200px" alt="Image Not Found" >
                  </a>
                  <input type="file" id="addimg" name="imgadd" onchange="this.form.submit()" style="display: none">
                  <br> 
              </form>
            </div>
            <?php } ?>
        </center>
      </div>
      </div>
      </div>
      <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="Text" name="prodname" class="form-control" id="inputEmail3" placeholder="Product Name" value="<?php echo $uproduct[0]->ProductName ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Brand</label>
                  <div class="col-sm-10">
                    <input type="Text" name="brand" class="form-control" id="inputPassword3" placeholder="Brand" value="<?php echo $uproduct[0]->Brand ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Cost</label>
                  <div class="col-sm-10">
                    <input type="Text" name="cost" onchange="getvalue(this.value,document.getElementById('disper').value)" class="form-control" id="cost" placeholder="Cost" value="<?php echo $uproduct[0]->Cost ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Discount Percent</label>
                  <div class="col-sm-10">
                    <input type="Text" name="disper" onchange="getvalue(document.getElementById('cost').value,this.value)" class="form-control" name="disper" id="disper" placeholder="Discount Percentage" value="<?php echo $uproduct[0]->DiscountPercentage ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Discount Amount</label>
                  <div class="col-sm-10">
                    <input type="Text" name="disamt" class="form-control" id="disamt" placeholder="Discount Amount" value="<?php echo $uproduct[0]->DiscountAmount ?>" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Selling Price</label>
                  <div class="col-sm-10">
                    <input type="Text" class="form-control" placeholder="Selling Price" name="sellpr" id="sellpr" value="<?php echo $uproduct[0]->SellingPrice ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                      <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option value="0" <?php if($uproduct[0]->ProductStatus==0) echo "Selected" ?>>Active</option>
                        <option value="1"<?php if($uproduct[0]->ProductStatus==1) echo "Selected" ?>>Blocked</option>
                      </select>
                  </div>
                </div>
              </div>
                <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="updprod" class="btn btn-info pull-right">Update Product</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Description</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <?php 
                  if(isset($desc))
                  {
                    foreach ($desc as $d) {
                ?>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $d->Attribute ?></label>
                  <div class="col-sm-10">
                    <input type="text" name="<?php echo $d->Attribute ?>" class="form-control" value="<?php echo $d->Value ?>" placeholder="">
                  </div>
                </div>
                <?php }} else echo "not found." ?>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="upddesc" class="btn btn-info pull-right">Update Description</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
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
