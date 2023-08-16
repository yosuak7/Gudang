<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>


<div id="layoutSidenav_content">
  <main>
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="container">
            <!-- general form elements -->
            <div class="box box-primary" style="width:94%;">
              <div class="box-header with-border">
              </div>

              <!-- /.box -->
              <div class="container">
                <div class="box-body">
                  <?php echo $this->session->flashdata('pesan'); ?>
                  <?php echo $this->session->flashdata('pesangagal'); ?>
                  <?php echo $this->session->flashdata('berhasildelete'); ?>
                  <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i>Data Barang Keluar</h3>
                </div>
                <a href="<?= base_url('laporan/laporan_keluar_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                <a href="<?= base_url('laporan/export_excel_keluar'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
                <div class="col-sm-6">
                  <div id="example1_filter" class="dataTables_filter">
                    <label>dsada</label>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                      <th>Customer</th>
                      <th>Alamat</th>
                      <th>telepon</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tr>
                    <?php if (is_array(@$list_data)) { ?>
                      <?php foreach (@$list_data as $dd) : ?>
                        <td><?= $dd->idtransaksi ?></td>
                        <td><?= $dd->tanggal ?></td>
                        <td><?= $dd->lokasi ?></td>
                        <td><?= $dd->namacustomer ?></td>
                        <td><?= $dd->alamat ?></td>
                        <td><?= $dd->telepon ?></td>
                        <td><?= $dd->kodebarang ?></td>
                        <td><?= $dd->namabarang ?></td>
                        <td><?= $dd->satuan ?></td>
                        <td><?= $dd->jumlah ?></td>
                        <td><a type="button" class="btn btn-danger btn-delete" href="<?= site_url('beranda/delete_barang_keluar/' . $dd->idtransaksi) ?>" id="buttondelete" style="margin:auto;height:20%"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php $no = ""; ?>
                <?php endforeach; ?>
              <?php } else { ?>
                <td colspan="7" align="center"><strong>Data Kosong</strong></td>
              <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Lokasi</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
                </table>
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
              <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>

              <script>
                $(document).on("click", "#buttonupdate", function() {
                  var idtransaksi1 = $(this).data('transaksi');
                  var tanggal1 = $(this).data('tanggal');
                  var lokasi1 = $(this).data('lokasi');
                  var kodebarang1 = $(this).data('kode');
                  var nama1 = $(this).data('nama');
                  var satuan1 = $(this).data('satuan');
                  var jumlah1 = $(this).data('jumlah');

                  $(".modal-body #id_transaksi").val(idtransaksi1);
                  $(".modal-body #tanggal").val(tanggal1);
                  $(".modal-body #lokasi").val(lokasi1);
                  $(".modal-body #kode_barang").val(kodebarang1);
                  $(".modal-body #nama_barang").val(nama1);
                  $(".modal-body #satuan").val(satuan1);
                  $(".modal-body #jumlah").val(jumlah1);

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
              </body>

              </html>
              <?php $this->load->view('v_footer'); ?>