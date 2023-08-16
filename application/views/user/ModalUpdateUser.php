<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>
<!-- Modal User -->
<div class="modal fade" id="modalupdateuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
      </div>
      <div class="modal-body table-responsive">
        <form action="<?= site_url('beranda/proses_update_users') ?>" role="form" method="post">
          <div class="box-body">
            <div class="form-group">

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
                  redirect(base_url('beranda/users'));
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