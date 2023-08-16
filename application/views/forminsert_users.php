<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>
        
            
            <div id="layoutSidenav_content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="container">
            <!-- general form elements -->
          <div class="box box-primary" style="width:94%;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Tambah Users Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">
            <form action="<?=base_url('beranda/proses_tambah_user')?>" role="form" method="post">

              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
               </div>
              <?php } ?>

              <?php if(validation_errors()){ ?>
              <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
             </div>
            <?php } ?>

              <div class="box-body">
                <div class="form-group" style="display:block;">
                  <label for="username" style="width:87%;margin-left: 0px;">Username</label>
                  <input type="text" name="username" style="width: 30%;margin-right: 67px;margin-left: 0px;" class="form-control" id="username" placeholder="Username">
                  <small><span class="text-danger"><?php echo form_error('username', '<small class="text-danger pl-3">', '</small>');?></span></small>
                </div>
                <div class="form-group" style="display:block;">
                  <label for="email" style="width:73%;">Email</label>
                  <input type="text" name="email" style="width:30%;margin-right: 67px;" class="form-control" id="email" placeholder="Email">
                  <small><span class="text-danger"><?php echo form_error('email', '<small class="text-danger pl-3">', '</small>');?></span></small>
              </div>
                <div class="form-group" style="display:block;">
                  <label for="password" style="width:73%;">Password</label>
                  <input type="password" name="password" style="width:30%;margin-right: 67px;" class="form-control" id="password" placeholder="Password">
                  <small><span class="text-danger"><?php echo form_error('password', '<small class="text-danger pl-3">', '</small>');?></span></small>
              </div>
                <div class="form-group" style="display:block;">
                  <label for="confirm_password" style="width:73%;">Confirm Password</label>
                  <input type="password" name="confirm_password" style="width:30%;margin-right: 67px;" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  <small><span class="text-danger"><?php echo form_error('confirm_password', '<small class="text-danger pl-3">', '</small>');?></span></small>
              </div>
              <div class="form-group" style="display:block;">
                <label for="role" style="width:73%;">Role</label>
                <select class="form-control" name="role" style="width:11%;margin-right: 18px;">
                  <option value="0" selected=""></option>
                  <option value="0">User Biasa</option>
                  <option value="1">User Admin</option>
                </select>
            </div>
              <!-- /.box-body -->
              <?php if(isset($token_generate)){ ?>
                <input type="hidden" name="token"  class="form-control" value="<?= $token_generate?>">
              <?php }else {
                redirect(base_url('beranda/form_user'));
              }?>

              <div class="box-footer" style="width:93%;">
                <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                <button type="submit" style="width:20%" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
              </div>
            </form>
          </div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->

          <!-- /.box -->


          <!-- /.box -->

          <!-- Input addon -->

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!-- <div class="col-md-6">
          <!-- Horizontal Form -->

          <!-- /.box -->
          <!-- general form elements disabled -->

          <!-- /.box -->

        </div>
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
  
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
<?php $this->load->view('v_footer'); ?>

