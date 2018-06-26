<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title> Inventory PT XxX </title>

<style type="text/css">@import url("<?php echo base_url() . 'vendors/bootstrap/dist/css/bootstrap.min.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'vendors/font-awesome/css/font-awesome.min.css'; ?>");</style>
<style type="text/css">@import url("<?php echo base_url() . 'css/animate.min.css'; ?>");</style> 
<style type="text/css">@import url("<?php echo base_url() . 'css/custom.css'; ?>");</style>
<script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.min.js"></script>
 
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
 
          <div class="navbar nav_title" style="border: 0;">
            <a href="dashboard" class="site_title"><i class="fa fa-database"></i> <span>PT XxX</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile">
            <div class="profile_pic">
                <?php echo img(array('src'=>'images/user.png','class'=>'img-circle profile_img')) ;?>
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $this->session->userdata('ses_nama');?></h2>
            </div>
          </div>
          <br />
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
        </div>
      </div>
 
      <div class="top_nav">
 
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
 
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>images/user.png" alt=""><?php echo $this->session->userdata('ses_nama');?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>                  
                  <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-sign-out pull-right"></i>Log Out</a>
                  </li>
                  
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">

            <div class="title_left">
              <h3>
              <?php if(isset($title)){echo $title ;} ;?> 
              </h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class='fa fa-tags'></i>
                          </div>
                          <div class="count">179</div>

                          <h3><?php echo anchor("produk","Produk");?></h3>
                          <p>Cek produk yang tersedia.</p>

                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class='fa fa-building'></i>
                          </div>
                          <div class="count">179</div>

                          <h3><?php echo anchor("supplier","<i></i> Supplier");?></h3>
                          <p>Daftar penyedia barang.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class='fa fa-briefcase'></i>
                          </div>
                          <div class="count">179</div>

                          <h3><?php echo anchor("pembelian","<i></i> Pembelian");?></h3>
                          <p>Daftar pembelian perusahaan.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class='fa fa-shopping-cart'></i>
                          </div>
                          <div class="count">179</div>

                          <h3><?php echo anchor("penjualan","<i></i> Penjualan");?></h3>
                          <p>Barang yang sedang dijual.</p>
                        </div>
                      </div>
                    </div>
          <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12" style="min-height:530px">
              <?php if(isset($content)){$this->load->view($content);};?> 
            </div>
            
          </div>
        </div>

      </div>
    </div>
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Log Out?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" di bawah jika Anda siap mengakhiri sesi Anda saat ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url().'index.php/login/logout'?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

<script type='text/javascript' src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/custom.js"></script>  

</body>
 
</html>