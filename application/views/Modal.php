 <!-- Modal barang masuk supplier -->
 <div class="modal fade" id="modal_supplier_masuk" tabindex="-1" aria-labelledby="exampleModalLabel">
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

 <!-- Modal daftar Barang masuk supplier -->
 <div class="modal fade" id="modal_supplier_masuk" tabindex="-1" aria-labelledby="exampleModalLabel">
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
                 <?php foreach ($list_data1 as $d) : ?>
                   <td><?= $d->id; ?></td>
                   <td><?= $d->namasupplier; ?></td>
                   <td><?= $d->alamat; ?></td>
                   <td><?= $d->telepon; ?></td>
                   <td><a type="button" class="btn btn-info" data-namasupplier="<?php echo $d->namasupplier; ?>" data-alamat="<?php echo $d->alamat; ?>" data-telepon="<?php echo $d->telepon; ?>" id="buttonpilih" style="margin:auto;height:20%"><i class="" aria-hidden="true"></i>Pilih</a></td>
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

 <!-- Modal Pilih Barang masuk -->
 <div class="modal fade" id="modal_pilih_masuk" tabindex="-1" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
       </div>
       <div class="modal-body table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>
             <tr>
               <th>Kode Barang</th>
               <th>Nama Barang</th>
               <th>Jumlah</th>
               <th>Satuan</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <?php if (is_array($list_data2)) { ?>
                 <?php foreach ($list_data2 as $dd) : ?>
                   <td><?= $dd->kodebarang; ?></td>
                   <td><?= $dd->namabarang; ?></td>
                   <td><?= $dd->jumlah; ?></td>
                   <td><?= $dd->satuan; ?></td>
                   <td><a type="button" class="btn btn-info" data-kodebarang="<?php echo $dd->kodebarang; ?>" data-namabarang="<?php echo $dd->namabarang; ?>" data-satuan="<?php echo $dd->satuan; ?>" id="buttonpilihbarangmasuk" style="margin:auto;height:20%"><i class="" aria-hidden="true"></i>Pilih</a></td>
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
               <th>Jumlah</th>
               <th>Satuan</th>
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

 <!-- Modal daftar Barang keluar customer -->
 <div class="modal fade" id="modal_customer_keluar" tabindex="-1" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Pilih Customer</h5>
       </div>
       <div class="modal-body table-responsive">
         <table id="example2" class="table table-bordered table-striped">
           <thead>
             <tr>
               <th>Kode id</th>
               <th>Nama Customer</th>
               <th>Alamat</th>
               <th>No. Telepon</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <?php if (is_array($list_data)) { ?>
                 <?php foreach ($list_data as $d) : ?>
                   <td><?= $d->id; ?></td>
                   <td><?= $d->namacustomer; ?></td>
                   <td><?= $d->alamat; ?></td>
                   <td><?= $d->telepon; ?></td>
                   <td><a type="button" class="btn btn-info" data-namacustomer="<?php echo $d->namacustomer; ?>" data-alamat="<?php echo $d->alamat; ?>" data-telepon="<?php echo $d->telepon; ?>" id="buttonpilih" style="margin:auto;height:20%"><i class="" aria-hidden="true"></i>Pilih</a></td>
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
 
 <!-- Modal Pilih Barang keluar -->
 <div class="modal fade" id="modal_pilih_keluar" tabindex="-1" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
       </div>
       <div class="modal-body table-responsive">
         <table id="example4" class="table table-bordered table-striped">
           <thead>
             <tr>
               <th>Kode Barang</th>
               <th>Nama Barang</th>
               <th>Jumlah</th>
               <th>Satuan</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <?php if (is_array($list_data2)) { ?>
                 <?php foreach ($list_data2 as $dd) : ?>
                   <td><?= $dd->kodebarang; ?></td>
                   <td><?= $dd->namabarang; ?></td>
                   <td><?= $dd->jumlah; ?></td>
                   <td><?= $dd->satuan; ?></td>
                   <td><a type="button" class="btn btn-info" data-kodebarang="<?php echo $dd->kodebarang; ?>" data-namabarang="<?php echo $dd->namabarang; ?>" data-satuan="<?php echo $dd->satuan; ?>" data-jumlah="<?php echo $dd->jumlah; ?>" id="buttonpilihbarangkeluar" style="margin:auto;height:20%"><i class="" aria-hidden="true"></i>Pilih</a></td>
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
               <th>Jumlah</th>
               <th>Satuan</th>
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
 
