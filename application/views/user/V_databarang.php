<?php $this->load->view('user/v_header'); ?>
<?php $this->load->view('user/Sidebar'); ?>


<div id="layoutSidenav_content">
  <main>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
          Input Data Barang Baru
        </h3>
        <!-- Main content -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <?php echo $this->session->flashdata('berhasiltambah'); ?>
                <?php echo $this->session->flashdata('gagaltambah'); ?>
                <div class="box-header with-border">
                  <h5 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Barang</h5>
                </div>
                <!-- /.box-header -->
                <div class="container">
                  <form action="<?= site_url('user/submitbarangbaru') ?>" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="kode_barang" style="width:90%;margin-left: 12px;">Kode Barang / Barcode</label>
                          <input type="text" name="kodebarang" style="width:50%;margin-right: 50px;" class="form-control" id="kode_barang" placeholder="Kode Barang">
                          <small><span class="text-danger"><?php echo form_error('kodebarang', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="nama_Barang" style="width:90%;">Nama Barang</label>
                          <input type="text" name="namabarang" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Nama Barang">
                          <small><span class="text-danger"><?php echo form_error('namabarang', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display;">
                          <label for="nama_Barang" style="width:90%;">Satuan</label>
                          <input type="text" name="satuan" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Satuan">
                          <small><span class="text-danger"><?php echo form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
                        </div>
                      </div>
                      <div class="form-group" style="margin-left:13px;display;">
                        <label for="nama_Barang" style="width:90%;">Stok Awal</label>
                        <input type="text" name="jumlah" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Stok Awal">
                        <small><span class="text-danger"><?php echo form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?></span></small>
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
            <?php $this->load->view('user/v_footer'); ?>