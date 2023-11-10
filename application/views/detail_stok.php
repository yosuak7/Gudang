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
                                <div class="container">

                                    <?php
                                    foreach ($list_data as $d) { ?>
                                        <div class="box-body">
                                            <a type="button" class="btn btn-default" style="width:10%;margin-right:26%" href="<?= base_url('beranda/laporandatabarang') ?>" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                                            <a type="text" class="bordered" style=" text-align: center;width:10%;">
                                                <h3>Detail Stok <?php echo $d->namabarang; ?></h3>
                                            </a>
                                        </div>
                                        <table>
                                            <div class="box-body">
                                                <div>
                                                    <a>Filter</a>
                                                    <input type="text" name="min" id="min" placeholder="Tanggal" value="<?php echo date('m/j/Y') ?>">
                                                    <a>s/d</a>
                                                    <input type="text" name="max" id="max" placeholder="Tanggal" value="<?php echo date('m/j/Y') ?>">
                                                </div>
                                            <?php } ?>
                                        </table>
                                        </form>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>ID Transaksi</th>
                                                    <th>Keterangan</th>
                                                    <th>Masuk</th>
                                                    <th>Keluar</th>
                                                    <th>Sisa Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php if (is_array($detailstok)) { ?>
                                                        <?php foreach ($detailstok as $dd) : ?>

                                                            <td><?= $dd['tanggal']; ?></td>
                                                            <td><?= $dd['idtransaksi']; ?></td>
                                                            <td><?= $dd['keterangan']; ?></td>
                                                            <td><?= $dd['jumlahmasuk']; ?></td>
                                                            <td><?= $dd['jumlahkeluar']; ?></td>

                                                            <?php
                                                            error_reporting(0);
                                                            //dikarnakan kode berjalan normal tetapi undefined variabel $saldo
                                                            //maka dipakai error_reporting
                                                            $masuk = $dd['jumlahmasuk'];
                                                            $keluar = $dd['jumlahkeluar'];

                                                            if ($dd['jumlahmasuk'] != 0) {
                                                                $saldo = $saldo + $masuk;
                                                            } else {
                                                                $saldo = $saldo + $masuk - $keluar;
                                                            }

                                                            $totalmasuk = $masuk +  $totalmasuk;
                                                            $totalkeluar = $keluar +  $totalkeluar;
                                                            ?>

                                                            <td><?= $saldo ?> </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } else { ?>
                                            <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                                        <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <td><?= $totalmasuk ?> </td>
                                                    <td><?= $totalkeluar ?> </td>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="js/scripts.js"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="<?php echo base_url() ?>assets/css/style.css"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="<?php echo base_url() ?>assets/sweetalert/dist/sweetalert.min.js"></script>


            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
            <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
            <script>
                $(function() {
                    $('#example1').DataTable({
                        'paging': true,
                        'lengthChange': false,
                        'searching': true,
                        'ordering': false,
                        'info': true,
                        'autoWidth': false
                    })
                });
            </script>
            <script>
                var minDate, maxDate;

                // fungsi filter di kolom mana data akan dicari 
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = minDate.val();
                        var max = maxDate.val();
                        var date = new Date(data[0]); //karena tanggal ada di kolom pertama maka di tulis 0

                        if (
                            (min === null && max === null) ||
                            (min === null && date <= max) ||
                            (min <= date && max === null) ||
                            (min <= date && date <= max)
                        ) {
                            return true;
                        }
                        return false;
                    }
                );

                $(document).ready(function() {
                    // Create date inputs
                    minDate = new DateTime($('#min'), {
                        format: 'MM/D/YYYY'
                    });
                    maxDate = new DateTime($('#max'), {
                        format: 'MM/D/YYYY'
                    });

                    // DataTables initialisation
                    var table = $('#example1').DataTable();

                    // Refilter the table
                    $('#min, #max').on('change', function() {
                        table.draw();
                    });
                });
            </script>
            </body>

            </html>
            <?php $this->load->view('v_footer'); ?>