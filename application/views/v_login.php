<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap 
    <link href="<?php base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php base_url()?>assets/vendor/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
   
    <link href="<?php base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
     <link href="<?php base_url()?>css/login.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url().'css/bootstrap.css'?>" rel="stylesheet">
  </head>
  <body id="login">
    <div class="container">
      
      <form class="form-signin" action="<?php echo base_url().'index.php/login/auth'?>" method="post">

        <center><h2 class="form-signin-heading">Login Inventory</h2></center>
		<?php echo $this->session->flashdata('msg');?>
        <center> <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus></center>
        <center><input type="password" id="password" name="password" class="form-control" placeholder="Password" required></center>
        <center><button class="btn btn-lg btn-primary btn-block" type="submit">Login</button></center>
      </form>

    </div>
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
  </body>
</html>