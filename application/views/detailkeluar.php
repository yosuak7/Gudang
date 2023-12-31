<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>

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
                                <?php echo $this->session->flashdata('keluarsalah1'); ?>
                                <?php echo $this->session->flashdata('gagal'); ?>
                                <?php echo $this->session->flashdata('Stokkurang'); ?>
                                <?php echo $this->session->flashdata('Stoksalah'); ?>
                                <?php echo $this->session->flashdata('berhasildelete'); ?>
                                <div class="box-header with-border">
                                    <?php
                                    foreach ($list_data1 as $dd) { ?>
                                        <a target="_blank" href="<?= base_url('laporan/printbarangkeluar/' . $dd->idtransaksi); ?>" class="btn btn-info mb-3"><i class="fa fa-print"></i> Print</a>
                                    <?php } ?>
                                    <h5 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Tambah Barang Keluar</h5>
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
                                            <label for="namasupplier" style="width:90%;margin-left: 12px;">Nama Customer</label>
                                            <input type="text" name="namacustomer" readonly="readonly" style="width:50%;margin-right: 100px;" class="form-control" id="namasupplier" placeholder="Nama Supplier" data-target="#modal-item" required="" value="<?= $dd->namacustomer ?>">
                                        </div>
                                        <div class="form-group" style="margin-left:13px;display:inline;">
                                            <label for="alamat" style="width:90%;">Alamat</label>
                                            <input type="text" name="alamat" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="alamat" placeholder="Alamat" value="<?= $dd->alamat ?>" required="">
                                        </div>
                                    </form>
                                    <div class="container">
                                        <div class="box-body">
                                            <a type="button" data-toggle="modal" data-target="#modal_keluar_barang" data-idtransaksi="<?php echo $dd->idtransaksi; ?>" class="btn btn-success" href="" id="buttontambah" style="margin:auto;height:auto">Tambah Barang <i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div><br>
                                    <?php } ?>
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <?php foreach ($detail as $dd) { ?>
                                                    <td><?= $dd['kodebarang']; ?></td>
                                                    <td><?= $dd['namabarang']; ?></td>
                                                    <td><?= $dd['jumlahkeluar']; ?></td>
                                                    <td><?= $dd['satuan']; ?></td>
                                                    <td><a type="button" class="btn btn-danger btn-delete" href="<?= base_url('beranda/delete_barang_keluar/' .  $dd['kodeid']) ?>" id="buttondelete" style="margin:auto;height:20%"><i class="fa fa-trash" aria-hidden="true"></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="box-footer" style="width:93%;">
                                        <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" href="<?= base_url('beranda/barangkeluar') ?>" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
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
                    $('#example4').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'ordering': false,
                        'info': true,
                        'autoWidth': false
                    })
                });

                $(document).on("click", "#buttonpilihbarangkeluar", function() {

                    var kodebarang12 = $(this).data('kodebarang');
                    var namabarang12 = $(this).data('namabarang');
                    var stok12 = $(this).data('jumlah');
                    var satuan12 = $(this).data('satuan');

                    $("#kodebarang").val(kodebarang12);
                    $("#namabarang").val(namabarang12);
                    $("#stok").val(stok12);
                    $("#satuan").val(satuan12);
                    $('#modal_pilih_keluar').modal('hide');

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
                                swal({
                                    text: 'Berhasil Dihapus',
                                    type: 'succes',
                                    showCancelButton: true
                                });
                            } else {
                                return false;
                            }
                        });
                    });
                });
            </script>
            </script>
            </body>

            </html>
            <?php $this->load->view('v_footer'); ?>