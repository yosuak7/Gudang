<?php $this->load->view('user/v_header'); ?>
<?php $this->load->view('user/Sidebar'); ?>
<!-- Modal User -->
<div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
      </div>
      <div class="modal-body table-responsive">
        <form action="<?= site_url('user/proses_tambah_user') ?>" role="form" method="post">
          <div class="box-body">
            <div class="form-group">

              <div class="box-body">
                <div class="form-group" style="display:block;">
                  <label for="username" style="width:87%;margin-left: 12px;">Username</label>
                  <input type="text" required name="username" style="width: 70%;margin-right: 67px;margin-left: 0px;" class="form-control" id="username" placeholder="Username">
                  <small><span class="text-danger"><?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                </div>
                <div class="form-group" style="display:block;">
                  <label for="email" style="width:73%;">Email</label>
                  <input type="email" required name="email" style="width:70%;margin-right: 67px;" class="form-control" id="email" placeholder="Email">
                  <small><span class="text-danger"><?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                </div>
                <div class="form-group" style="display:block;">
                  <label for="password" style="width:73%;">Password</label>
                  <input type="password" required name="password" style="width:70%;margin-right: 67px;" class="form-control" id="password" placeholder="Password">
                  <small><span class="text-danger"><?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                </div>
                <div class="form-group" style="display:block;">
                  <label for="confirm_password" style="width:73%;">Confirm Password</label>
                  <input type="password" required name="confirm_password" style="width:70%;margin-right: 67px;" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  <small><span class="text-danger"><?php echo form_error('confirm_password', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                </div>
                <div class="form-group" style="display:block;">
                  <label for="role" style="width:73%;">Role</label>
                  <select class="form-control" name="role" style="width:30%;margin-right: 18px;" required>
                    <option required value="0" selected=""></option>
                    <option required value="0">User Biasa</option>
                    <option required value="1">User Admin</option>
                  </select>
                </div>
                <!-- /.box-body -->
                <?php if (isset($token_generate)) { ?>
                  <input type="hidden" name="token" class="form-control" value="<?= $token_generate ?>">
                <?php } else {
                  redirect(base_url('user/users'));
                } ?>

                <!-- /.box-body -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i aria-hidden="true"></i> Masukkan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <script>
        var password = document.getElementById("password"),
          confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
          if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Tidak Sama");
          } else {
            confirm_password.setCustomValidity('');
          }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
      </script>