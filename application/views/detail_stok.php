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


                                        <table id="example3" class="table table-bordered table-striped">
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

                                                    <?php foreach ($detailstok as $dd) { ?>

                                                        <td><?= $dd['tanggal']; ?></td>
                                                        <td><?= $dd['idtransaksi']; ?></td>
                                                        <td><?= $dd['keterangan']; ?></td>
                                                        <td><?= $dd['jumlahmasuk']; ?></td>
                                                        <td><?= $dd['jumlahkeluar']; ?></td>
                                                       
                                                        <?php
                                                        
                                                        $masuk = $dd['jumlahmasuk'];
                                                        $keluar = $dd['jumlahkeluar'];
                                                                                                        
                                                        if ($dd['jumlahmasuk'] == 0) {
                                                            $saldo = $saldo + $dd['jumlahmasuk'] - $dd['jumlahkeluar'];
                                                        } else {
                                                            $saldo = $dd['jumlahmasuk'];
                                                        }
                                                       
                                                        ?>
                                                        <td><?= $saldo ?> </td>
                                                </tr>

                                        <?php } 
                                    
                                }
                                        ?>
                                            </tbody>
                                        </table>
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
            </script>
            </script>
            </body>

            </html>
            <?php $this->load->view('v_footer'); ?>