<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>

<div id="layoutSidenav_content">
  <!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="container">
        <!-- Profile Image -->
        <div class="box box-primary" style="width:94%;">
          <div class="box-header">

            <?php if (isset($pesan_error)) { ?>
              <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong><br> <?php echo $pesan; ?>
              </div>
            <?php } ?>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->

        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-12">
        <div class="container">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Profile</h3>
          </div>
          <div class="tab-pane active" id="settings">
            <form class="form-horizontal" action="<?= base_url('beranda/proses_new_password') ?>" method="post">

              <?php if ($this->session->flashdata('msg_berhasil')) { ?>
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success</strong><br> <?php echo $this->session->flashdata('msg_berhasil'); ?>
                </div>
              <?php } ?>

              <?php if (validation_errors()) { ?>
                <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                </div>
              <?php } ?>

              <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>

                <div class="col-sm-10">
                  <input type="text" name="username" class="form-control" id="username" disabled="" value="<?= $this->session->userdata('name') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="email" value="<?= $this->session->userdata('email') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="new_password" class="col-sm-2 control-label">New Password</label>

                <div class="col-sm-10">
                  <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                </div>
              </div>
              <div class="form-group">
                <label for="confirm_new_password" class="col-sm-2 control-label">Confirm New Password</label>

                <div class="col-sm-10">
                  <input type="password" name="confirm_new_password" class="form-control" id="confirm_new_password" placeholder="Confirm New Password">
                </div>
              </div>
              <?php if (isset($token_generate)) { ?>
                <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
              <?php } else {
                redirect(site_url('beranda/profile'));
              } ?>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success">&nbsp;Submit</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
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