<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>

<div id="layoutSidenav_content">
  <!-- Main content -->
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <div class="container">
        <!-- general form elements -->
        <div class="box box-primary" style="width:94%;">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Update Users Data</h3>
          </div>
          <div class="container">
          <form class="form-horizontal" action ="<?= base_url('beranda/proses_update_users')?>" method="post">

              <div class="box-body">
              
                <?php foreach ($list_data as $d) { ?>
                  <input type="hidden" name="id" value="<?= $d->id ?>">
                  <div class="form-group" style="display:block;">
                    <label for="username" style="width:87%;margin-left: 0px;">Username</label>
                    <input type="text" name="username" style="width: 30%;margin-right: 67px;margin-left: 0px;" required="" class="form-control" id="username" value="<?= $d->username ?>">
                  </div>
                  <div class="form-group" style="display:block;">
                    <label for="email" style="width:73%;">Email</label>
                    <input type="email" name="email" style="width:30%;margin-right: 67px;" class="form-control" id="email" required="" value="<?= $d->email ?>">
                  </div>
                  <div class="form-group" style="display:block;">
                    <label for="role" style="width:73%;">Role</label>
                    <select class="form-control" name="role" style="width:11%;margin-right: 18px;">
                      <?php if ($d->role == 1) { ?>
                        <option value="1" selected="">User Admin</option>
                        <option value="0">User Biasa</option>
                      <?php } else { ?>
                        <option value="1">User Admin</option>
                        <option value="0" selected="">User Biasa</option>
                      <?php } ?>
                    </select>
                  </div>
                <?php } ?>
                <!-- /.box-body -->
                <?php if (isset($token_generate)) { ?>
                  <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
                <?php } else {
                  redirect(base_url('Beranda/update_user'));
                } ?>

                <div class="form-group" style="width:93%;">
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
</section>
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