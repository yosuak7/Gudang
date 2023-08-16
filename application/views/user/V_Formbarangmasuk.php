<?php $this->load->view('user/v_header'); ?>
<?php $this->load->view('user/Sidebar'); ?>

<div id="layoutSidenav_content">
  <main>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
          Input Data Barang Masuk
        </h3>
        <!-- Main content -->
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <?php echo $this->session->flashdata('berhasilmasuk'); ?>
                <div class="box-header with-border">
                  <h5 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Data Barang Masuk</h5>
                </div>
                <!-- nomor transaksi otomatis -->
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'dbinventory');
                $data = "";
                $result = mysqli_query($conn, "SELECT MAX(idtransaksi) AS max_code FROM barangmasuk");
                $data = mysqli_fetch_array($result);
                $code = $data['max_code'];
                $urutan = (int)substr($code, 2, 5);
                $urutan++;
                $angka = "17";
                $kd_kat = $angka . sprintf("%05s", $urutan);
                ?>
                <!-- /.box-header -->
                <div class="container">
                  <form action="<?= site_url('user/submitbarangmasuk') ?>" role="form" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <?php

                        foreach ($list_data as $d) { ?>
                          <label for="idtransaksi" style="margin-left:220px;display:inline;">ID Transaksi</label>
                          <input type="text" name="idtransaksi" style="margin-left:37px;width:20%;display:inline;" class="form-control" readonly="readonly" value="<?= $kd_kat ?>">
                      </div>

                    </div>
                    <div class="form-group">
                      <label for="tanggal" style="margin-left:220px;display:inline;">Tanggal</label>
                      <input type="time" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control form_datetime" placeholder="Klik Disini">
                      <small><span class="text-danger"><?php echo form_error('tanggal'); ?></span></small>
                    </div>
                    <div class="form-group" style="margin-bottom:40px;">
                      <label for="nama_barang" style="margin-left:220px;display:inline;">Lokasi</label>
                      <select class="form-control" name="lokasi" style="margin-left:75px;width:20%;display:inline;">
                        <small><span class="text-danger"><?php echo form_error('lokasi'); ?></span></small>
                        <option value="">-- Pilih --</option>
                        <option value="Gudang">Gudang</option>]
                      </select>
                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="namasupplier" style="width:90%;margin-left: 12px;">Nama Supplier</label>
                      <input type="text" name="namasupplier" readonly="readonly" style="width:50%;margin-right: 100px;" class="form-control" id="namasupplier" placeholder="Nama Supplier" data-target="#modal-item" value="">
                      <button type="button" data-toggle="modal" class="btn btn-info btn-flat" data-target="#modalsearch" id="buttonpilih" style="height:4%">
                        Pilih Supplier
                        <i class="fa fa-solid fa-search" aria-hidden="true"></i>
                      </button>
                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="alamat" style="width:90%;">Alamat</label>
                      <input type="text" name="alamat" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="alamat" placeholder="Alamat" value="">

                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="telepon" style="width:90%;">Telepon</label>
                      <input type="text" name="telepon" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="telepon" placeholder="Telepon" value="">

                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="kode_barang" style="width:90%;margin-left: 12px;">Kode Barang / Barcode</label>
                      <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="kode_barang" placeholder="Kode Barang" data-target="#modal-item" value="<?= $d->kodebarang ?>">
                      <small><span class="text-danger"><?php echo form_error('kodebarang'); ?></span></small>
                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="nama_Barang" style="width:90%;">Nama Barang</label>
                      <input type="text" name="namabarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Nama Barang" value="<?= $d->namabarang ?>">
                      <small><span class="text-danger"><?php echo form_error('namabarang'); ?></span></small>
                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="nama_Barang" style="width:90%;">Satuan</label>
                      <input type="text" name="satuan" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="satuan" placeholder="Satuan" value="<?= $d->satuan ?>">
                      <small><span class="text-danger"><?php echo form_error('satuan'); ?></span></small>
                    </div>
                    <div class="form-group" style="margin-left:13px;display;">
                      <label for="nama_Barang" style="width:90%;">Jumlah</label>
                      <input type="text" name="jumlah" style="width:50%;margin-right: 50px;" class="form-control" id="jumlah" placeholder="Jumlah">
                      <small><span class="text-danger"><?php echo form_error('jumlah'); ?></span>Stok Tersedia: <?= $d->jumlah ?></small>
                    </div>
                  <?php } ?>
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
      </section>
      <!-- Modal update -->
      <div class="modal fade" id="modalsearch" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Pilih Supplier</h5>
            </div>
            <div class="modal-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>Kode id</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php if (is_array($list_data1)) { ?>
                      <?php foreach ($list_data1 as $dd) : ?>
                        <td><?= $dd->id; ?></td>
                        <td><?= $dd->namasupplier; ?></td>
                        <td><?= $dd->alamat; ?></td>
                        <td><?= $dd->telepon; ?></td>
                        <td><a type="button" class="btn btn-info" data-namasupplier="<?php echo $dd->namasupplier; ?>" data-alamat="<?php echo $dd->alamat; ?>" data-telepon="<?php echo $dd->telepon; ?>" id="buttonpilih" style="margin:auto;height:20%"><i class="" aria-hidden="true"></i>Pilih</a></td>
                  </tr>
                <?php endforeach; ?>
              <?php } else { ?>
                <td colspan="7" align="center"><strong>Data Kosong</strong></td>
              <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Kode id</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        </form>
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
      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
      <script>
        $(document).on("click", "#buttonpilih", function() {

          var namasupplier1 = $(this).data('namasupplier');
          var alamat1 = $(this).data('alamat');
          var telepon1 = $(this).data('telepon');

          $("#namasupplier").val(namasupplier1);
          $("#alamat").val(alamat1);
          $("#telepon").val(telepon1);
          $('#modalsearch').modal('hide');

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
      <?php $this->load->view('v_footer'); ?>