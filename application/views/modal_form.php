<!-- Modal barang masuk -->
<div class="modal fade" tabindex="-1" id="modal_masuk_barang" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <?php
                foreach ($list_data1 as $B) { ?>
                    <a type="button" data-toggle="modal" data-idtransaksi="<?php echo $B->idtransaksi; ?>" data-target="#modal_pilih_masuk" class="btn btn-success" href="" id="buttontambah" style="margin:auto;height:5%">Pilih Barang <i class="fa fa-plus" aria-hidden="true"></i></a>

            </div>
            <!-- nomor id otomatis -->
            <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'dbgudang');
                    $data = "";
                    $result = mysqli_query($conn, "SELECT max(kodeid) as max_code FROM transaksi");
                    $data = mysqli_fetch_array($result);
                    $code = $data['max_code'];
                    $urutan = (int)substr($code, 2, 8);
                    $urutan++;
                    $angka = "15";
                    $kd = $angka . sprintf("%08s", $urutan);
            ?>
            <form action="<?= base_url('Beranda/submitbarangmasuk'); ?>" method="post">

                <div class="modal-body">
                    <div class="d-flex flex-column text-center">
                        <div>
                            <input type="hidden" class="form-control" name="kodeid" id="kodeid" placeholder="kodeid" required data-readonly readonly value="<?= $kd ?>">
                        </div>
                        <div>
                            <input type="hidden" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal" required data-readonly readonly value="<?php echo $B->tanggal; ?>">
                        </div>
                        <div>
                            <input type="hidden" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan" required data-readonly readonly value="<?php echo $B->namasupplier; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="idtransaksi" id="idtransaksi" placeholder="idtransaksi" required data-readonly readonly value="<?php echo $B->idtransaksi; ?>">
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kodebarang" id="kodebarang" placeholder="kodebarang" required data-readonly readonly>
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="namabarang" id="namabarang" placeholder="namabarang" required data-readonly readonly>
                        </div> <br>
                        <div>
                            <input type="hidden" class="form-control" required name="stok" id="stok" readonly placeholder="Stok Tersedia">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="jumlahmasuk" id="jumlahmasuk" placeholder="Jumlah" required>
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" required data-readonly readonly>
                        </div> <br>
                    </div>
                </div>
            <?php } ?>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button><button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

</form>

</div>

</div>

</div>

<script>
    var jumlah = document.getElementById("jumlah");

    function validateJumlah() {
        if (jumlah.value < 1) {
            jumlah.setCustomValidity("Jumlah Belum Di isi");
        } else {
            jumlah.setCustomValidity('');
        }
    }
    jumlah.onchange = validateJumlah;
</script>