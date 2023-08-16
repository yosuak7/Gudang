<!-- Modal barang keluar -->
<div class="modal fade" tabindex="-1" id="modal_keluar_barang" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">
                <?php
                foreach ($list_data1 as $B) { ?>
                    <a type="button" data-toggle="modal" data-idtransaksi="<?php echo $B->idtransaksi; ?>" data-target="#modal_pilih_keluar" class="btn btn-success" href="" id="buttontambah1" style="margin:auto;height:5%">Pilih Barang <i class="fa fa-plus" aria-hidden="true"></i></a>

            </div>

            <form action="<?= base_url('Beranda/submitbarangkeluar'); ?>" method="post">

                <div class="modal-body">
                    <div class="d-flex flex-column text-center">
                        <div class="form-group">
                            <input type="text" class="form-control" name="idtransaksi" id="idtransaksi" placeholder="ID Transaksi" readonly value="<?php echo $B->idtransaksi; ?>">
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="kodebarang" id="kodebarang" readonly placeholder="Kode Barang">
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="namabarang" id="namabarang" readonly placeholder="Nama Barang">
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="stok" id="stok" readonly placeholder="Stok Tersedia">

                        </div> <br>
                        <div class="form-group">
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                        </div> <br>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="satuan" id="satuan" placeholder="Satuan">
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
<script>
    var stok = document.getElementById("stok"),
        jumlah = document.getElementById("jumlah");

    function validateJumlah() {
        if (jumlah.value > stok.value) {
            jumlah.setCustomValidity("Stok Tidak Mencukupi");
        } else {
            jumlah.setCustomValidity('');
        }
    }
    jumlah.onchange = validateJumlah;
</script>