<?php $this->load->view('v_header'); ?>
<?php $this->load->view('Sidebar'); ?>

        
            <div id="layoutSidenav_content">
                   <!-- Main content -->
      <div class="row">
        <div class="col-md-12">
        <div class="container">
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <?php echo $this->session->flashdata('userberhasil'); ?>
            <?php echo $this->session->flashdata('gagaltambah'); ?>
            <?php echo $this->session->flashdata('usergagal'); ?>
            <?php echo $this->session->flashdata('pesangagaluser'); ?>
            <?php echo $this->session->flashdata('msg_berhasil'); ?>
            <?php echo $this->session->flashdata('gagalinputuser'); ?>
            <?php echo $this->session->flashdata('deleteuser'); ?>




              <a data-toggle="modal" class="btn btn-info" data-target="#modaluser" style="margin-bottom:10px;" type="button" class="btn btn-primary" name="tambah_data"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Last Login</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php if(is_array($list_users)){ ?>
                  <?php foreach($list_users as $dd): ?>
                    <td><?=$dd->id?></td>
                    <td><?=$dd->username?></td>
                    <td><?=$dd->email?></td>
                    <?php if($dd->role == 1){ ?>
                    <td>User Admin</td>
                    <?php }else{?>
                    <td>User Biasa</td>
                    <?php }?>
                    <td><?=$dd->last_login?></td>
                    <td><a type="button"  class="btn btn-info"   href="<?=base_url('beranda/update_user/'.$dd->id)?>" name="btn_update" style="margin:auto;"><i class="fa fa-pen" aria-hidden="true"></i></a></td>
                    <td><a type="button" class="btn btn-danger btn-delete"  href="<?=base_url('beranda/proses_delete_user/'.$dd->id)?>" name="btn_delete" style="margin:auto;"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
              <?php endforeach;?>
              <?php }else { ?>
                    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
              <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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

