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
            <?php echo $this->session->flashdata('pesan');?>
            <?php echo $this->session->flashdata('pesangagal');?>
            <?php echo $this->session->flashdata('berhasildelete');?>
              <h3 class="box-title"><i class="fa fa-table" aria-hidden="true"></i>Data Barang Masuk</h3>
            </div>
            <a href="<?= base_url('laporan/laporan_masuk_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
            <a href="<?= base_url('laporan/export_excel_masuk'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            <div class="col-sm-6">
              <div id="example1_filter" class="dataTables_filter">
              <label></label>
            </div>
          </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Lokasi</th>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Delete</th>
                 
                  
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php if(is_array(@$list_data)){ ?>
                  <?php foreach(@$list_data as $dd): ?>
                    <td><?=$dd->idtransaksi?></td>
                    <td><?=$dd->tanggal?></td>
                    <td><?=$dd->lokasi?></td>
                    <td><?=$dd->namasupplier?></td>
                    <td><?=$dd->alamat?></td>
                    <td><?=$dd->telepon?></td>
                    <td><?=$dd->kodebarang?></td>
                    <td><?=$dd->namabarang?></td>
                    <td><?=$dd->satuan?></td>
                    <td><?=$dd->jumlah?></td>
                    <td><a type="button" class="btn btn-danger btn-delete"  href="<?php echo site_url('beranda/delete_barang_masuk/'.$dd->idtransaksi)?>" name="btn_delete" style="margin:auto;height:20%"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
              <?php endforeach;?>
              <?php }else { ?>
                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
              <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Transaksi</th>
                  <th>Tanggal</th>
                  <th>Lokasi</th>
                  <th>Nama Supplier</th>
                  <th>Alamat</th>
                  <th>telepon</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
            <!-- Modal update -->
<div class="modal fade" id="modalkode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Update Barang Masuk</h5>
        </div>
      <div class="modal-body table-responsive">
        <form action="<?=site_url('beranda/proses_update_barang_masuk')?>" role="form" method="post">
              <div class="box-body">
              <div class="form-group">
              <div class="form-group" style="margin-left:13px;display;">
                  <label for="kode_barang" style="width:90%;margin-left: 12px;">ID Transaksi</label>
                  <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="idtransaksi">
                  <small><span class="text-danger"><?php echo form_error('kodebarang');?></span></small>
                </div>
                <div class="form-group" style="margin-left:13px;display;">
                  <label for="kode_barang" style="width:90%;margin-left: 12px;">Tanggal</label>
                  <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="tanggal">
                  <small><span class="text-danger"><?php echo form_error('kodebarang');?></span></small>
                </div>
                <div class="form-group" style="margin-left:13px;display;">
                  <label for="kode_barang" style="width:90%;margin-left: 12px;">Lokasi</label>
                  <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="lokasi">
                  <small><span class="text-danger"><?php echo form_error('kodebarang');?></span></small>
                </div>
         
                <div class="form-group" style="margin-left:13px;display;">
                  <label for="kode_barang" style="width:90%;margin-left: 12px;">Kode Barang / Barcode</label>
                  <input type="text" name="kodebarang" readonly="readonly" style="width:50%;margin-right: 50px;" class="form-control" id="kode_barang" placeholder="Kode Barang" >
                  <small><span class="text-danger"><?php echo form_error('kodebarang');?></span></small>
                </div>
                <div class="form-group" style="margin-left:13px;display;">
                  <label for="nama_Barang" style="width:90%;">Nama Barang</label>
                  <input type="text" name="namabarang" style="width:50%;margin-right: 50px;" class="form-control" id="nama_Barang" placeholder="Nama Barang" >
                  <small><span class="text-danger"><?php echo form_error('namabarang');?></span></small>
              </div>
              <div class="form-group" style="margin-left:13px;display;">
                  <label for="satuan" style="width:90%;">Satuan</label>
                  <input type="text" name="satuan" style="width:50%;margin-right: 50px;" class="form-control" id="satuan" placeholder="Satuan" >
                  <small><span class="text-danger"><?php echo form_error('satuan');?></span></small>
              </div>
              </div>
              <div class="form-group" style="margin-left:13px;display;">
                  <label for="jumlah" style="width:90%;">Stok Awal</label>
                  <input type="text" name="jumlah" style="width:50%;margin-right: 50px;" class="form-control" id="jumlah" placeholder="Stok Awal" >
                  <small><span class="text-danger"><?php echo form_error('jumlah');?></span></small>
              </div>
           
              <!-- /.box-body -->
              <div class="modal-footer">
                <button type="submit"  class="btn btn-success"><i aria-hidden="true"></i> Update</button>
              </div>
              </div>
            </div>
          </div>
        </form>
        </div>
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
        <script src="<?php echo base_url()?>assets/sweetalert/dist/sweetalert.min.js"></script>
  
        <script>
          $(document).on("click", "#buttonupdate", function(){
            var idtransaksi1 = $(this).data('idtransaksi');
            var tanggal1 = $(this).data('tanggal');
            var lokasi1 = $(this).data('lokasi');
            var kodebarang1 = $(this).data('kode');
            var nama1 = $(this).data('nama');
            var satuan1 = $(this).data('satuan');
            var jumlah1 = $(this).data('jumlah');

            $(".modal-body #idtransaksi").val(idtransaksi1);
            $(".modal-body #tanggal").val(tanggal1);
            $(".modal-body #lokasi").val(lokasi1);
            $(".modal-body #kode_barang").val(kodebarang1);
            $(".modal-body #nama_barang").val(nama1);
            $(".modal-body #satuan").val(satuan1);
            $(".modal-body #jumlah").val(jumlah1);

          });
        $(function () {
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
jQuery(document).ready(function($){
      $('.btn-delete').on('click',function(){
          var getLink = $(this).attr('href');
          swal({
                  title: 'Hapus Data',
                  text: 'Yakin Ingin Menghapus Data ?',
                  html: true,
                  confirmButtonColor: '#d9534f',
                  showCancelButton: true,
                  },function(){
                  window.location.href = getLink
              });
          return false;
      });
  });</script>
    </body>
</html>
<?php $this->load->view('v_footer'); ?>

