<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div>

</div>
<div class="register-box">
<div>
        <!--section class="content-header">
        <h1>
         REGISTRATION
        </h1>
      </section>
    <!-- /.box-header -->
<style type="text/css">
      .datafield
      {
        color:#607d8b;
       
        font-weight: 1000;
        text-transform: uppercase;
        font-size: 20px;

      }
      .datalabel
      {
        color:#245f6b;
        font-style: normal;
        font-weight: 800;
       font-family:Lucida Console;
        font-size: 20px;
        padding-right: 10px;
      }
      .noprint { display: none;}
    .print {display: block;}
    </style>
     <script type="text/javascript">
             // u
                </script>
     <div class="box">
        <div class="box-header with-border">
          <h2>Student</h2>
          </div>
    <div class="box-body">
      <h3 class="box-title"> College Information</h3>
        <div class="callout col-lg-12" style="border-left: 5px solid <?php if($row['Status']==1) echo "#3fb558"; else echo "#e91e31";?>;"> 
            
            <div class="col-lg-12">

             <div class="col-lg-6">
                <label class="datalabel">GR_NO:</label>
                <label class="datafield form-group" style="color: #e43e32; font-size: 25px; font-family: 'Montserrat', sans-serif;" ><?php echo $row['GR_No']; ?></label>
              </div>

              <div class="col-lg-6">
                  <img class="img-thumbnail" src="dist/img/user/<?php echo $row['Profile_Image_Path']; ?>" style="width: 150px;height: 150px;float: right;" />
              </div>
          </div>
          <div class="row" style="margin-top: 22px;">
          </div>
          <div class="row" style="margin-top: 22px;">
          <div class="col-lg-12">
            <div class="col-lg-6">
                <label class="datalabel">Date of Admission</label>
                <label class="datafield" style="font-family: 'Montserrat', sans-serif;"><?php echo date_format(date_create($row['Created_DateTime']),"d-M-Y"); ?> </label>
              </div>

              <div class="col-lg-6">
                  <label class="datalabel">Batch Year</label>
                <label class="datafield" style="font-family: 'Montserrat', sans-serif;"> <?php echo $row['Year_OF_Joining']." - ".$row['Year_OF_Completing'] ; ?></label>
              </div>
          </div>
          </div>
          </div>

        </div>  
        <h3 class="box-title"> Personal information</h3>
        <div class="callout col-lg-12" style="border-left: 5px solid #3F51B5;">

          <!--Name-->
            <div class="form-group"> 
              <div class="col-lg-6">
                    <label class="datalabel">NAME:</label>
                  </div>
                  <div class="col-lg-6">
                      <label class="datafield form-group"><?php echo $row['First_Name']." ".$row['Middle_Name'] ." ".$row['Last_Name']; ?></label>
                    </div>
                    

              </div>
              <div class="col-lg-12">
              <div class="row" style="margin-top: 18px;">
            <!--DOB-->
            <div class="col-lg-6">
                 
                    <label class="datalabel">DATE OF BIRTH:</label>
                    
                     
                     <label class="datafield form-group"><?php echo date_format(date_create($row['Date_Of_Birth']),"F d,Y"); ?></label>
                    
                
              </div>
            <!--Gender-->  
              <div class="col-lg-6 pull-right">
                
                  <label class="datalabel">GENDER:</label>
                  <label class="datafield form-group"><?php echo $row['Gender']; ?></label>
                </div>
              
              </div>
              </div>

              <div class="col-lg-12">
              <div class="row" style="margin-top: 18px;">
              <!--Religion-->
                <div class="col-lg-6">
                  <div class="form-group">
                        <label class="datalabel">RELIGION:</label>
                     <label class="datafield form-group"><?php echo $row['Religion']; ?></label>
                  </div>
                </div>
      
              <!--Caste-->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="datalabel">CASTE:</label>
                       <label class="datafield form-group"><?php echo $row['Caste']; ?></label>
                    </div>
                 </div>
                 </div>
                 </div>
          </div>


            <h3 class="box-title"> Communication information</h3>
        
        <div class="callout col-lg-12" style="border-left: 5px solid #3F51B5;">
                 
                 <div class="row" style="margin-top: 18px;">
                 <div class="col-lg-6">
                    <label class="datalabel">MOBILE NO:</label>
                    <label class="datafield ">
                    <!-- <a href='tel:<?php echo $row["Mobile_No"]; ?>'><?php echo $row['Mobile_No']; ?></a> -->
                    <?php echo $row['Mobile_No']; ?>
                    </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="datalabel">Parent Mobile No:</label>
                      <label class="datafield">
                      <!-- <a href='tel:<?php echo $row["Parent_Dad_Mob_No"]; ?>'><?php echo $row['Parent_Dad_Mob_No']; ?></a> -->
                      <?php echo $row["Parent_Dad_Mob_No"]; ?></label>
                    </div>
                </div>
                
                <div class="row" style="margin-top: 18px;">

                    <div class="col-lg-6">
                          <label class="datalabel">EMAIL:</label>
                        <label class="datafield" style="text-transform: lowercase;">
                       <?php echo $row['Email_ID']; ?></label>
                    </div>

                      <div class="col-lg-6">
                           
                          <label class="datalabel">ADDRESS:</label>
                          <label class="datafield form-group"><address><?php echo $row['Address']; ?></address></label>
                      </div>
                </div>
           </div>
           <div class="box-footer">
           <div class="col-lg-12">
           <div class="col-lg-9">
           </div>
           <div class="col-lg-3">
              <button type="button" class="btn btn-block btn-primary" onclick="modalprint()">Print</button>
              </div>
             
              </div>

    
           </div>
</div>
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="../../index.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
