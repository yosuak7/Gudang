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
                                <?php echo $this->session->flashdata('berhasilmasuk'); ?>
                                <?php echo $this->session->flashdata('masuksalah1'); ?>
                                <?php echo $this->session->flashdata('gagal'); ?>
                                <?php echo $this->session->flashdata('berhasildelete'); ?>
                                <div class="box-header with-border">
                                    <?php
                                    foreach ($list_data1 as $dd) { ?>
                                        <a target= "_blank" href="<?= base_url('laporan/printbarangmasuk/' . $dd->idtransaksi); ?>" class="btn btn-info mb-3"><i class="fa fa-print"></i> Print</a>
                                    <?php } ?>
                                    <h5 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Masuk</h5>
                                </div>
                                <!-- /.box-header -->
                                <div class="container">
                                    <form>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <?php
                                                foreach ($list_data1 as $dd) { ?>
                                                    <label for="idtransaksi" style="margin-left:220px;display:inline;">ID Transaksi</label>
                                                    <input type="text" name="idtransaksi" style="margin-left:37px;width:20%;display:inline;" class="form-control" required="" readonly="readonly" value="<?= $dd->idtransaksi ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal" style="margin-left:220px;display:inline;">Tanggal</label>
                                            <input type="text" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control form_datetime" required="" readonly="readonly" placeholder="Klik Disini" value="<?= $dd->tanggal ?>">
                                            <small><span class="text-danger"><?php echo form_error('tanggal'); ?></span></small>
                                        </div>
                                        <div class="form-group" style="margin-left:13px;display:inline;">
                                            <label for="namasupplier" style="width:90%;margin-left: 12px;">Nama Supplier</label>
                                            <input type="text" name="namasupplier" readonly="readonly" style="width:50%;margin-right: 100px;" class="form-control" id="namasupplier" placeholder="Nama Supplier" data-target="#modal-item" required="" value="<?= $dd->namasupplier ?>">
                                        </div>
                                        <div class="form-group" style="margin-left:13px;display:inline;">
                                            <label for="alamat" style="width:90%;">Alamat</label>
                                            <input type="text" name="alamat" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="alamat" placeholder="Alamat" value="<?= $dd->alamat ?>" required="">
                                        </div>

                                    </form>
                                    <div class="container">
                                        <div class="box-body">
                                            <a type="button" data-toggle="modal" data-target="#modal_masuk_barang" data-idtransaksi="<?php echo $dd->idtransaksi; ?>" class="btn btn-success" href="" id="buttontambah" style="margin:auto;height:auto">Tambah Barang <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div><br>
                                    <?php } ?>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <?php foreach ($detail as $dd) { ?>
                                                    <td><?= $dd['kodebarang']; ?></td>
                                                    <td><?= $dd['namabarang']; ?></td>
                                                    <td><?= $dd['jumlahmasuk']; ?></td>
                                                    <td><?= $dd['satuan']; ?></td>
                                                   
                                            </tr>



                                        <?php } ?>


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="box-footer" style="width:93%;">
                                        <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" href="<?= base_url('user/barangmasuk') ?>" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                                    </div>
                                    </div>
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
            <script src="<?php echo base_url() ?>assets/css/style.css"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>

            <script>
                $(function() {
                    $('#example1').DataTable();
                    $('#example2').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'ordering': false,
                        'info': true,
                        'autoWidth': false
                    })
                });

                $(document).on("click", "#buttonpilihbarangmasuk", function() {

                    var kodebarang1 = $(this).data('kodebarang');
                    var namabarang1 = $(this).data('namabarang'); 
                    var satuan1 = $(this).data('satuan');
                    var stok1 = $(this).data('jumlah');

                    $("#kodebarang").val(kodebarang1);
                    $("#namabarang").val(namabarang1);
                    $("#stok").val(stok1);
                    $("#satuan").val(satuan1);
                    $('#modal_pilih_masuk').modal('hide');

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
            </script>
            </script>
            </body>

            </html>
            <?php $this->load->view('user/v_footer'); ?>