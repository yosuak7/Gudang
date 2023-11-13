<?php $this->load->view('user/v_header'); ?>
<?php $this->load->view('user/Sidebar'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!-- Main content -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <?php echo $this->session->flashdata('berhasilkeluar'); ?>
                <?php echo $this->session->flashdata('Stokkurang'); ?>
                <?php echo $this->session->flashdata('gagal'); ?>
                <div class="box-header with-border">
                  <h3>
                    Input Data Keluar
                  </h3>
                  <h5 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Customer Barang Keluar</h5>
                </div>
                <!-- nomor transaksi otomatis -->
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'dbgudang');
                $data = "";
                $result = mysqli_query($conn, "SELECT max(idtransaksi) as max_code FROM datakeluar");
                $data = mysqli_fetch_array($result);
                $code = $data['max_code'];
                $urutan = (int)substr($code, 3, 5);
                $urutan++;
                $huruf = "OUT";
                $kd = $huruf . sprintf("%05s", $urutan);
                ?>

                <!-- /.box-header -->
                <div class="container">
                  <form action="<?= site_url('user/submitdatakeluar') ?>" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="idtransaksi" style="margin-left:220px;display:inline;">ID Transaksi</label>
                        <input type="text" name="idtransaksi" style="margin-left:37px;width:20%;display:inline;" class="form-control" readonly="readonly" value="<?= $kd ?>">
                      </div>
                      <div class="form-group">
                        <label for="tanggal" style="margin-left:220px;display:inline;">Tanggal</label>
                        <input type="time" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control form_datetime" placeholder="Klik Disini">
                        <small><span class="text-danger"><?php echo form_error('tanggal'); ?></span></small>
                      </div>
                      <div class="form-group" style="margin-left:13px;display:inline;">
                        <label for="namacustomer" style="width:90%;margin-left: 12px;">Nama Customer</label>
                        <input type="text" name="namacustomer" readonly="readonly" style="width:50%;margin-right: 100px;" class="form-control" id="namacustomer" placeholder="Nama Customer" data-target="#modal-item" value="">
                        <button type="button" data-toggle="modal" class="btn btn-info btn-flat" data-target="#modal_customer_keluar" id="buttonpilih" style="height:auto">
                          Pilih Customer
                          <i class="fa fa-solid fa-search" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="form-group" style="margin-left:13px;display:inline;">
                        <label for="alamat" style="width:90%;">Alamat</label>
                        <input type="text" name="alamat" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="alamat" placeholder="Alamat" value="">

                      </div>
                      <div class="form-group" style="margin-left:13px;display:inline;">
                        <label for="telepon" style="width:90%;">Telepon</label>
                        <input type="text" name="telepon" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="telepon" placeholder="Telepon" value="">
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer" style="width:93%;">
                        <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" href="<?= base_url('user/barangkeluar') ?>" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <button type="reset" class="btn btn-info" style="width:14%;margin-right:29%" name="btn_reset"> Reset</button>
                        <button type="submit" style="width:20%" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
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
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script>
        $(document).on("click", "#buttonpilih", function() {

          var namacustomer1 = $(this).data('namacustomer');
          var alamat1 = $(this).data('alamat');
          var telepon1 = $(this).data('telepon');

          $("#namacustomer").val(namacustomer1);
          $("#alamat").val(alamat1);
          $("#telepon").val(telepon1);
          $('#modal_customer_keluar').modal('hide');

        });
        jQuery(document).ready(function($) {
          $('.btn-delete').on('click', function() {
            var getLink = $(this).attr('href');
            swal({
              title: 'Hapus Data',
              text: 'Yakin Ingin Menghapus Data ?',
              html: true,
              confirmButtonColor: '#d9534f',
              showCancelButton: true,
            }, function() {
              window.location.href = getLink
            });
            return false;
          });
        });
        $(function() {
          $('#example1').DataTable();
          $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
          })
        });
      </script>
      <script>
        flatpickr("input[type=time]", {});
      </script>
      </script>
      </body>

      </html>
      <?php $this->load->view('user/v_footer'); ?>