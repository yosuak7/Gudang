<?php $this->load->view('user/v_header'); ?>
<?php $this->load->view('user/Sidebar'); ?>

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
                                <?php echo $this->session->flashdata('gagal'); ?>
                                    <?php echo $this->session->flashdata('pesan'); ?>
                                    <?php echo $this->session->flashdata('Stokkosong'); ?>
                                    <?php echo $this->session->flashdata('berhasildelete'); ?>
                                    <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i>Tambah Keluar</h3>
                                </div>
                                <a href="<?= base_url('user/datakeluar'); ?>" class="btn btn-info mb-3"><i class="fa fa-plus"></i> Tambah Customer</a>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Customer</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if (is_array($list_data)) { ?>
                                                <?php foreach ($list_data as $dd) : ?>
                                                    <td><?= $dd->idtransaksi; ?></td>
                                                    <td><?= $dd->tanggal; ?></td>
                                                    <td><?= $dd->namacustomer; ?></td>
                                                    <td><a type="button" class="btn btn-success" href="<?= base_url('user/detail_keluar/' . $dd->idtransaksi) ?>"  id="buttondetail" style="margin:auto;height:20%">Lihat</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                                <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Nama Customer</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('user/v_footer'); ?>
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