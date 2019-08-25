<!DOCTYPE html>
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="<?=MYAPP_NAME;?>">

  <!-- App favicon -->
  <link rel="shortcut icon" href="<?=ASSETS_ADMIN;?>assets/images/favicon.ico">
  <!-- App title -->
  <title><?=MYAPP_NAME;?></title>

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

      <?php //echo password_hash('employee', PASSWORD_DEFAULT);?>

      <!-- HOME -->
      <section>
        <div class="container-alt">
          <div class="row">
            <div class="col-sm-12">

              <div class="wrapper-page">

                <div class="m-t-40 account-pages">
                  <div class="text-center account-logo-box">
                    <h2 class="text-uppercase">
                      <a href="index.html" class="text-success">
                        <span><img src="assets/admin/img/logo.png" alt="" height="36"></span>
                      </a>
                    </h2>
                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                  </div>
                  <div class="account-content">
                    <div class="row">
                      <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                      </div>
                    </div>
                    <?php //$this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                      ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $error; ?>                    
                      </div>
                    <?php }
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                      ?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>                    
                      </div>
                    <?php } ?>
                    <form class="form-horizontal" action="<?=BASE_URL;?>loginMe" method="post">
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                      value="<?=$this->security->get_csrf_hash();?>" />
                      <div class="form-group ">
                        <div class="col-xs-12">
                          <input class="form-control" type="email" name="email" required="" placeholder="Username">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-xs-12">
                          <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                      </div>

                      <div class="form-group ">
                        <div class="col-xs-12">
                          <div class="checkbox checkbox-success">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">
                              Remember me
                            </label>
                          </div>

                        </div>
                      </div>

                      <div class="form-group text-center m-t-30">
                        <div class="col-sm-12">
                          <a href="<?=BASE_URL;?>forgotPassword" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                      </div>

                      <div class="form-group account-btn text-center m-t-10">
                        <div class="col-xs-12">
                          <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                        </div>
                      </div>

                    </form>

                    <div class="clearfix"></div>

                  </div>
                </div>
                <!-- end card-box-->


                <!-- <div class="row m-t-50">
                  <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="#" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                  </div>
                </div> -->

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
