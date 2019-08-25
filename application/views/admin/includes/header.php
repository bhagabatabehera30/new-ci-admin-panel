<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="<?=MYAPP_NAME;?>">
  <title><?php echo $pageTitle; ?></title>
  <?php if(css_for_list_pages=='Y'){ ?>
    <!--<link rel="stylesheet" href="<?=ASSETS_ADMIN?>assets/css/blue.css">-->
    <link href="<?=ASSETS?>plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSETS?>plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>  
  <?php } ?>
  <?php if(css_for_add_edit_pages=='Y'){ ?>
   <!-- Plugins css-->
   <link href="<?=ASSETS?>plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
   <link href="<?=ASSETS?>plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
   <link href="<?=ASSETS?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
   <link href="<?=ASSETS?>plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
   <link href="<?=ASSETS?>plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
 <?php } ?>
 <!-- Tooltipster css -->
 <link rel="stylesheet" href="<?=ASSETS?>plugins/tooltipster/tooltipster.bundle.min.css">
 <link rel="stylesheet" href="<?=ASSETS?>plugins/morris/morris.css">    <!-- App css -->
 <link href="<?=ASSETS_ADMIN?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/core.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/components.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/icons.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/pages.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/menu.css" rel="stylesheet" type="text/css" />
 <link href="<?=ASSETS_ADMIN?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="<?=ASSETS?>plugins/switchery/switchery.min.css">
 <link href="<?=ASSETS_ADMIN?>css/custom.css" rel="stylesheet" type="text/css" />
 <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
      <script src="<?=ASSETS_ADMIN?>assets/js/modernizr.min.js"></script>
      <script src="<?=ASSETS_ADMIN?>assets/js/jquery.min.js"></script> 
      <style>.disable_row {background-color: #fdf1ed !important;}
      .Deactivate{background-color: rgba(255, 64, 4, 0.16) !important;color: #444343 !important;
        border-color: rgba(255, 64, 4, 0.16) !important; }
        .error{color:red;font-weight: normal;}  
      </style>
      <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
        var adminPanel = "<?php echo ADMIN_PANEL; ?>";
      </script>
    </head>


    <body class="fixed-left">

      <!-- Begin page -->
      <div id="wrapper">


