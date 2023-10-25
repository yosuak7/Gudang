<!DOCTYPE html>

<head>
    <title>Bukti Terima Barang Masuk</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: left;
        }

        #judul2 {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>Inventory</h3>
        <?php
            foreach ($list_data1 as $dd) {
            ?>
        <div style="width: 50%; text-align: left; float: left;">No. Nota : <?php echo $dd->idtransaksi; ?> </div>

        <div style="width: 50%; text-align: right; float: right;">Jakarta, </div><br>
        <div style="width: 50%; text-align: right; float: right;">Dari, <?php echo $dd->namasupplier; ?>  </div>
        <div style="width: 50%; text-align: left; float: left;">Tanggal : <?php echo $dd->tanggal; ?> </div><br>
        <div style="width: 50%; text-align: right; float: right;"> <?php echo $dd->alamat; ?> </div><br>
        <?php
            }
            ?>
        <h3 id=judul2>Bukti Terima Barang Masuk</h3>
        <hr />
        <table rules="none" border="1" class="table-data">

            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
            </tr>
            <?php
            foreach ($detail as $dd) {
            ?>
                <tr>
                    <td><?= $dd['kodebarang']; ?></td>
                    <td><?= $dd['namabarang']; ?></td>
                    <td><?= $dd['jumlahmasuk']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <hr />
        

        <div style="width: 50%; text-align: left; float: left;">Dibuat oleh, </div>
        <div style="width: 50%; text-align: right; float: right;">Diterima Oleh,</div><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;"><hr width="40%" align="left"/></div>
        <div style="width: 50%; text-align: right; float: right;"><hr width="40%" align="right"/></div>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>