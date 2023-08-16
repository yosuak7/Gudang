<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
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
                <th>Nomor Telepon</th>
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