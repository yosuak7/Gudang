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
                                    <?php echo $this->session->flashdata('berhasildelete'); ?>
                                    <?php echo $this->session->flashdata('pesangagal'); ?>
                                    <?php echo $this->session->flashdata('pesan'); ?>

                                    <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i>Data Customer</h3>
                                </div>
                                <a href="<?= base_url('laporan/laporan_customer_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                                <a href="<?= base_url('laporan/export_data_customer'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>Kode id</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if (is_array($list_data)) { ?>
                                                <?php foreach ($list_data as $dd) : ?>
                                                    <td><?= $dd->id; ?></td>
                                                    <td><?= $dd->namacustomer; ?></td>
                                                    <td><?= $dd->alamat; ?></td>
                                                    <td><?= $dd->telepon; ?></td>
                                                    <td><a type="button" data-toggle="modal" class="btn btn-info" data-target="#modalkode" data-id="<?php echo $dd->id; ?>" data-namacustomer="<?php echo $dd->namacustomer; ?>" data-alamat="<?php echo $dd->alamat; ?>" data-telepon="<?php echo $dd->telepon; ?>" id="buttonupdate" style="margin:auto;height:20%"><i class="fa fa-solid fa-pen" aria-hidden="true"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                                <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Kode id</th>
                                            <th>Nama Customer</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Update</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('user/v_footer'); ?>
                    <!-- Modal update -->
                    <div class="modal fade" id="modalkode" tabindex="-1" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
                                </div>
                                <div class="modal-body table-responsive">
                                    <form action="<?= site_url('user/prosesupdatedatacustomer') ?>" role="form" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <div class="form-group" style="margin-left:13px;display;">
                                                    <label for="id" style="width:90%;margin-left: 12px;">ID customer</label>
                                                    <input type="text" name="id" readonly="readonly" style="width:75%;margin-right: 50px;" class="form-control" id="id" placeholder="ID">
                                                </div>
                                                <div class="form-group" style="margin-left:13px;display;">
                                                    <label for="nama_customer" style="width:90%;margin-left: 12px;">Nama Customer</label>
                                                    <input type="text" name="namacustomer" style="width:75%;margin-right: 50px;" class="form-control" id="nama_customer" placeholder="Nama Customer">
                                                </div>
                                                <div class="form-group" style="margin-left:13px;display;">
                                                    <label for="alamat" style="width:90%;">Alamat</label>
                                                    <textarea type="text" name="alamat" style="width:75%;margin-right: 50px;" class="form-control" id="alamat" placeholder="alamat" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="form-group" style="margin-left:13px;display;">
                                                    <label for="telepon" style="width:90%;">Telepon</label>
                                                    <input type="text" name="telepon" style="width:50%;margin-right: 50px;" class="form-control" id="telepon" placeholder="telepon">
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
                                    var id1 = $(this).data('id');
                                    var namacustomer1 = $(this).data('namacustomer');
                                    var alamat1 = $(this).data('alamat');
                                    var telepon1 = $(this).data('telepon');

                                    $(".modal-body #id").val(id1);
                                    $(".modal-body #nama_customer").val(namacustomer1);
                                    $(".modal-body #alamat").val(alamat1);
                                    $(".modal-body #telepon").val(telepon1);

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