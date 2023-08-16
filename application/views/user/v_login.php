<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    >
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url("assets/fonts/icomoon/style.css")?>">

    <link rel="stylesheet" href="<?= base_url("assets/css/owl.carousel.min.css")?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css")?>">

    <title>Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
			<div class="invalid-feedback">
			</div>
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="<?= base_url("assets/images/inventory.png")?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <?php echo $this->session->flashdata('pesangagal');?>
              <?php echo $this->session->flashdata('msg');?>
              <h3><strong>Login</strong></h3>

              <p class="mb-4"><strong>Silahkan Masukkan Username & Password</strong></p>
            </div>
            <form class="user" action="<?= site_url('Login/proses_login'); ?>" method="post">
              <div class="form-group first">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <small><p class='text-danger'><?php echo form_error('username');?></p></small>
              </div>
              <div class="form-group last mb-4">
                <input type="password" class="form-control" name="password" placeholder="password">
                <small><span class='text-danger'><?php echo form_error('password');?></span></small>
              </div>
              <input type="submit" name='login' value="Log In" class="btn text-white btn-block btn-primary">
              </form>
        </div>
      </div>
    </div>
  </div>

  
    <script src="<?= base_url("assets/js/jquery-3.3.1.min.js")?>"></script>
    <script src="<?= base_url("assets/js/popper.min.js")?>"></script>
    <script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
    <script src="<?= base_url("assets/js/main.js")?>"></script>
   
  </body>
</html>
