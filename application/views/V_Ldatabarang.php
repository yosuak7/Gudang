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
                  <?php echo $this->session->flashdata('berhasildelete'); ?>
                  <?php echo $this->session->flashdata('berhasiltambah'); ?>
                  <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i>Data Barang</h3>
                </div>
                <a href="<?= base_url('beranda/inputbarang'); ?>" class="btn btn-info mb-3"><i class="fa fa-plus"></i> Tambah Barang</a>
                <a href="<?= base_url('laporan/laporan_databarang_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                <a href="<?= base_url('laporan/export_data_barang'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Detail</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php if (is_array($list_data)) { ?>
                        <?php foreach ($list_data as $dd) : ?>
                          <td><?= $dd->kodebarang; ?></td>
                          <td><?= $dd->namabarang; ?></td>
                          <td><?= $dd->satuan; ?></td>
                          <td><?= $dd->jumlah; ?></td>
                          <td><a type="button" href="<?= base_url('beranda/detail_stok/' . $dd->kodebarang)?> " class="btn btn-info"  id="buttondetail" style="margin:auto;height:20%"><i class="fa fa-solid fa-list" aria-hidden="true"></i></a></td>
                          <td><a type="button" data-toggle="modal" class="btn btn-info" data-target="#modalkode" data-kode="<?php echo $dd->kodebarang; ?>" data-nama="<?php echo $dd->namabarang; ?>" data-satuan="<?php echo $dd->satuan; ?>" data-jumlah="<?php echo $dd->jumlah; ?>" id="buttonupdate" style="margin:auto;height:20%"><i class="fa fa-solid fa-pen" aria-hidden="true"></i></a></td>
                          <td><a type="button" class="btn btn-danger btn-delete" href="<?= base_url('beranda/delete_barang/' . $dd->id) ?>" id="buttondelete" style="margin:auto;height:20%"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                  <?php endforeach; ?>
                <?php } else { ?>
                  <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Detail</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
          <?php $this->load->view('v_footer'); ?>
          <!-- Modal update -->
          <div class="modal fade" id="modalkode" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                </div>
                <div class="modal-body table-responsive">
                  <form action="<?= site_url('beranda/prosesupdatedatabarang') ?>" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">

                        <div class="form-group" style="margin-left:13px;display:inline;">
                          <label for="kode_barang" style="width:90%;margin-left: 12px;">Kode Barang / Barcode</label>
                          <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="kode_barang" placeholder="Kode Barang">
                          <small><span class="text-danger"><?php echo form_error('kodebarang'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display:inline;">
                          <label for="nama_Barang" style="width:90%;">Nama Barang</label>
                          <input type="text" name="namabarang" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Nama Barang">
                          <small><span class="text-danger"><?php echo form_error('namabarang'); ?></span></small>
                        </div>
                        <div class="form-group" style="margin-left:13px;display:inline;">
                          <label for="satuan" style="width:90%;">Satuan</label>
                          <input type="text" name="satuan" style="width:50%;margin-right: 50px;" class="form-control" id="satuan" placeholder="Satuan">
                          <small><span class="text-danger"><?php echo form_error('satuan'); ?></span></small>
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><i aria-hidden="true"></i> Update</button>
                      </div>
                    </div>
                </div>
              </div>
              </form>
            </div>
            <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
            <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>



            <script>
              $(document).on("click", "#buttonupdate", function() {
                var kodebarang1 = $(this).data('kode');
                var nama1 = $(this).data('nama');
                var satuan1 = $(this).data('satuan');
                var jumlah1 = $(this).data('jumlah');

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
                            type: 'warning',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                        }, function(confirm) {
                            if (confirm) {
                                window.location.href = getLink;
                                swal("Berhasil Hapus, Silahkan Refresh!");
                             
                            } else {
                                swal("Error!!");
                            }
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