<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>


<div id="layoutSidenav_content">
  <main>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      <?php echo $this->session->flashdata('berhasiltambahcustomer'); ?>
        <h3>
          Input Data Customer Baru
        </h3>
        <!-- Main content -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <div class="box-header with-border">
                  <h5 class="box-title"><i class="fa fa-regular fa-users" aria-hidden="true"></i> Tambah Data Customer</h5>
                </div>
                <!-- /.box-header -->
                <div class="container">
                  <form action="<?= site_url('beranda/submitcustomer') ?>" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="nama_customer" style="width:90%;margin-left: 12px;">Nama Customer</label>
                          <input type="text" name="namacustomer" style="width:50%;margin-right: 50px;" class="form-control" id="nama_customer" placeholder="Nama Customer">
                          <small><span class="text-danger"><?php echo form_error('namacustomer', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="alamat" style="width:90%;">Alamat</label>
                          <textarea   type="text" name="alamat" style="width:50%; margin-right: 50px;" class="form-control" id="alamat" placeholder="Alamat" cols="30" rows="10"></textarea>
                          <small><span class="text-danger"><?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="telepon" style="width:90%;">Nomor Telepon</label>
                          <input type="text" name="telepon" style="width:50%;margin-right: 50px;" class="form-control" id="telepon" placeholder="Telp">
                          <small><span class="text-danger"><?php echo form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                      <!-- /.box-body -->
                      <div class="box-footer" style="width:93%;">
                        <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <button type="reset" class="btn btn-info" style="width:14%;margin-right:29%" name="btn_reset"> Reset</button>
                        <button type="submit" style="width:20%" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
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