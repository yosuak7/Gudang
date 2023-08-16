<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>
<?php
header("content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("expires: 0");
?>
    <h3>
        <center>Laporan Data Barang</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($databarang as $dd) {
                ?>
                    <tr>
                    <td><?=$dd['id'];?></td>
                        <td><?=$dd['kodebarang'];?></td>
                        <td><?=$dd['namabarang'];?></td>
                        <td><?=$dd['satuan'];?></td>
                        <td><?=$dd['jumlah'];?></td>
                    </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>