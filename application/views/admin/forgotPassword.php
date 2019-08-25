<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="<?=MYAPP_NAME;?>">

  <!-- App favicon -->
  <link rel="shortcut icon" href="<?=ASSETS_ADMIN;?>assets/images/favicon.ico">
  <!-- App title -->
  <title><?=MYAPP_NAME;?>Forgot Password</title> 

  <!-- App css -->
  <link href="<?=ASSETS_ADMIN;?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/menu.css" rel="stylesheet" type="text/css" />
  <link href="<?=ASSETS_ADMIN;?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

      <script src="<?=ASSETS_ADMIN;?>assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

      <!-- HOME -->
      <section>
        <div class="container-alt">
          <div class="row">
            <div class="col-sm-12">

              <div class="wrapper-page">

                <div class="m-t-40 account-pages">
                  <div class="text-center account-logo-box">
                    <h2 class="text-uppercase">
                      <a href="#" class="text-success">
                        <span><img src="assets/admin/img/logo.png" alt="" height="36"></span>
                      </a>
                    </h2>
                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                  </div>
                  <div class="account-content">
                   <p class="login-box-msg">Forgot Password</p>

                   <?php $this->load->helper('form'); ?>
                   <div class="row">
                    <div class="col-md-12">
                      <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                  </div>
                  <?php
                  $this->load->helper('form');
                  $error = $this->session->flashdata('error');
                  $send = $this->session->flashdata('send');
                  $notsend = $this->session->flashdata('notsend');
                  $unable = $this->session->flashdata('unable');
                  $invalid = $this->session->flashdata('invalid');
                  if($error)
                  {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $this->session->flashdata('error'); ?>                    
                    </div>
                  <?php }

                  if($send)
                  {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $send; ?>                    
                    </div>
                  <?php }

                  if($notsend)
                  {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $notsend; ?>                    
                    </div>
                  <?php }

                  if($unable)
                  {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $unable; ?>                    
                    </div>
                  <?php }

                  if($invalid)
                  {
                    ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $invalid; ?>                    
                    </div>
                  <?php } ?>

                  <form class="form-horizontal" action="<?=BASE_URL;?>resetPasswordUser" method="post">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                    value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="email" name="login_email" required="" placeholder="Email">
                      </div>
                    </div>


                    <div class="form-group text-left m-t-30">
                      <div class="col-sm-6">
                        <a href="<?=BASE_URL;?>loginMe" class="text-muted"><i class="fa fa-lock m-r-5"></i> Login</a>
                      </div>
                      <div class="col-sm-6">
                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Submit</button>
                      </div>
                    </div>
                    



                  </form>

                  <div class="clearfix"></div>

                </div>
              </div>
              <!-- end card-box-->

            </div>
            <!-- end wrapper -->

          </div>
        </div>
      </div>
    </section>
    <!-- END HOME -->

    <script>
      var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.min.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/bootstrap.min.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/detect.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/fastclick.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.blockUI.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/waves.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.core.js"></script>
    <script src="<?=ASSETS_ADMIN;?>assets/js/jquery.app.js"></script>

  </body>

  </html>
