<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title>Gentallela Alela! | </title>
 
<style type="text/css">@import url("<?php echo base_url() . 'css/animate.min.css'; ?>");</style>
 
  <!-- Custom styling plus plugins -->
<style type="text/css">@import url("<?php echo base_url() . 'css/custom.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'css/icheck/flat/green.css'; ?>");</style>
 
 
<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>
 
     <link href="<?php base_url()?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php base_url()?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php base_url()?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php base_url()?>build/css/custom.min.css" rel="stylesheet">
 
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->
 
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
 
</head>
 
 
<body class="nav-md">
 
  <div class="container body">
 
 
    <div class="main_container">
 
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
 
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
          </div>
          <div class="clearfix"></div>
 
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
                <?php echo img(array('src'=>'images/img.jpg','class'=>'img-circle profile_img')) ;?>
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
 
          <br />
 
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><?php echo anchor("dashboard","<i class='fa fa-home'></i> Dashboard");?></li>
                <li><?php echo anchor("produk","<i class='fa fa-tags'></i> Produk");?></li>
                <li><?php echo anchor("supplier","<i class='fa fa-building'></i> Supplier");?></li>
                <li><?php echo anchor("pembelian","<i class='fa fa-briefcase'></i> Pembelian");?></li>
                <li><?php echo anchor("penjualan","<i class='fa fa-shopping-cart'></i> Penjualan");?></li>
              </ul>
            </div>
 
          </div>
          <!-- /sidebar menu -->
 
          <!-- /menu footer buttons -->
            <!-- Hapus code yang ada disini -->
          <!-- /menu footer buttons -->
        </div>
      </div>
 
      <!-- top navigation -->
      <div class="top_nav">
 
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
 
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">John Doe
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
 
      </div>
      <!-- /top navigation -->
 
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
              <?php if(isset($title)){echo $title ;} ;?> <!-- Untuk judul halaman, variable didapat dari controller -->
              </h3>
            </div>
          </div>
          <div class="clearfix"></div>
       
          <div class="row">
 
            <div class="col-md-12 col-sm-12 col-xs-12" style="min-height:530px">
              <?php if(isset($content)){$this->load->view($content);};?> <!-- Untuk content halaman, variable didapat dari controller -->
            </div>
          </div>
        </div>
 
        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
 
      </div>
      <!-- /page content -->
    </div>
 
  </div>
 
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  <script src=""></script>
 
  <!-- bootstrap progress js -->
<script type='text/javascript' src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
 
  <!-- icheck -->
<script type='text/javascript' src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>
 
<script type='text/javascript' src="<?php echo base_url(); ?>js/custom.js"></script>  
 
  <!-- pace -->
<script type='text/javascript' src="<?php echo base_url(); ?>js/pace/pace.min.js"></script>  
 
    <script src="<?php base_url()?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php base_url()?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php base_url()?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php base_url()?>vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php base_url()?>build/js/custom.min.js"></script>

</body>
 
</html>