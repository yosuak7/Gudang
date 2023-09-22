<!DOCTYPE html>

<head>
    <title>Surat Jalan</title>
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
        <div style="width: 50%; text-align: left; float: left;">No. Surat Jalan :  </div>

        <div style="width: 50%; text-align: right; float: right;">Jakarta, </div><br>
        <div style="width: 50%; text-align: right; float: right;">Kepada Yth, </div>
        <div style="width: 50%; text-align: left; float: left;">Tanggal : </div><br>
        <?php
            }
            ?>
        <h3 id=judul2>Barang Keluar</h3>
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
                    <td><?= $dd['jumlah']; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <hr />
        

        <div style="width: 50%; text-align: left; float: left;">Diserahkan oleh, </div>
        <div style="width: 50%; text-align: right; float: right;">Diterima Oleh,</div><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;"><hr width="40%" align="left"/></div>
        <div style="width: 50%; text-align: right; float: right;"><hr width="40%" align="right"/></div>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>