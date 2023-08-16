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
        <center>Data Customer</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>Kode ID</th>
                <th>Nama Customer</th>
                <th>Alamat</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($datacustomer as $dd) {
                ?>
                    <tr>
                    <td><?=$dd['id'];?></td>
                        <td><?=$dd['namacustomer'];?></td>
                        <td><?=$dd['alamat'];?></td>
                        <td><?=$dd['telepon'];?></td>
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