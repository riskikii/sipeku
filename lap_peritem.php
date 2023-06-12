<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Per Item</h1>

    <table class="table table-bordered">
        <tr>
            <td>Uraian</td>
            <td>Januari</td>
            <td>Februari</td>
            <td>Maret</td>
            <td>April</td>
            <td>Mei</td>
            <td>Juni</td>
            <td>Juli</td>
            <td>Agustus</td>
            <td>September</td>
            <td>Oktober</td>
            <td>November</td>
            <td>Desember</td>
            <td>Jumlah</td>
        </tr>

        <?php
        require_once 'controller/PenyewaanController.php';
        $class = new PenyewaanController();

        $laporanPerItem = $class->laporanPenyewaanPerItem();
        print_r($laporanPerItem);
        $jumlah = 0;
        $pendapatanJanuari = 0;
        $pendapatanFebruari = 0;
        $pendapatanMaret = 0;
        $pendapatanApril = 0;
        $pendapatanMei = 0;
        $pendapatanJuni = 0;
        $pendapatanJuli = 0;
        $pendapatanAgustus = 0;
        $pendapatanSeptember = 0;
        $pendapatanOktober = 0;
        $pendapatanNovember = 0;
        $pendapatanDesember = 0;

        if ($laporanPerItem != null) {
            foreach ($laporanPerItem as $data) {
        ?>

                <tr>
                    <td><?php echo ($data['nama_sub_kategori_retribusi'] == null) ? $data['nama_kategori_retribusi'] : $data['nama_sub_kategori_retribusi'] ?></td>
                    <td><?php ($data['MONTH(tanggal)'] == 1) ? $pendapatanJanuari = $data["SUM('nilai')"] : $pendapatanJanuari; echo $pendapatanJanuari ?></td>
                    <td>33.032.000</td>
                    <td>32.424.000</td>
                    <td>32.208.000</td>
                    <td>45.258.000</td>
                    <td>5.000.000</td>
                    <td>30.528.000</td>
                    <td>5.000.000</td>
                    <td>5.000.000</td>
                    <td>1.250.000</td>
                    <td>2.350.000</td>
                    <td>195.000.000</td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

</body>

</html>