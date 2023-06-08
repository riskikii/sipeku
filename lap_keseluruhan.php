<head>
    <title>Surat Pemberitahuan</title>

    <style>
        body {
            print-color-adjust: exact;
            line-height: 1.4;
            margin: 1.4cm;
            color: black !important;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                size: A4;
                size: landscape;
            }

        }

        .number-section {
            font-size: 12px;
        }

        .number-section .number {
            width: 5%;
        }

        .number-section .title {
            width: 240px;
        }

        .number-section .value {
            width: auto;
        }

        td th {
            text-align: center;
        }

        .ttd {
            padding-right: 2em;
        }

        .light-blue-background {
            background-color: #a1c1ed;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="content">
        <div class="title">
            <h3 class="text-center font-weight-bold">PEMERINTAH PROVINSI SUMATERA BARAT</h3>
            <h5 class="text-center font-weight-bold">REKAPITULASI PENERIMAAN RETRIBUSI DAERAH</h5>
            <h5 class="text-center font-weight-bold">DINAS PEMUDA DAN OLAHRAGA</h5>
            <h5 class="text-center font-weight-bold">TAHUN ANGGARAN 2023</h5>
        </div>

        <table class="table table-bordered" border="1" style="color: black;" id="export-div">

            <thead>
                <tr>
                    <th rowspan="2">REKENING</th>
                    <th rowspan="2">JENIS DAN OBJEK PENERIMAAN</th>
                    <th rowspan="2">TARGET (Rp)</th>
                    <th colspan="13" class="text-center">REALISASI</th>
                    <th rowspan="2">%</th>
                    <th rowspan="2">SISA (Rp)</th>
                </tr>
                <tr>
                    <th class="text-center">Januari</th>
                    <th class="text-center">Februari</th>
                    <th class="text-center">Maret</th>
                    <th class="text-center">April</th>
                    <th class="text-center">Mei</th>
                    <th class="text-center">Juni</th>
                    <th class="text-center">Juli</th>
                    <th class="text-center">Agustus</th>
                    <th class="text-center">September</th>
                    <th class="text-center">Oktober</th>
                    <th class="text-center">Nopember</th>
                    <th class="text-center">Desember</th>
                    <th class="text-center">JUMLAH (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once 'utils/CustomDateFormatter.php';
                require_once 'controller/PenyewaanController.php';

                $formatter = new CustomDateFormatter();
                $penyewaan = new PenyewaanController();

                $getCurrentYear = date("Y");

                // Hardcode Jenis dan Objek Penerimaan
                $arrayObjekPenerimaan = array("PENDAPATAN DAERAH", "PENDAPATAN ASLI DAERAH (PAD)", "Retribusi Daerah", "Retribusi Jasa Usaha", "Retribusi Pemakaian Kekayaan Daerah", "Retribusi Penyewaan Bangunan", "Retribusi Penyewaan Tanah dan Bangunan", "GOR H AGUS SALIM PADANG", "- Retribusi Penyewaan Tanah dan Bangunan", "'Sewa Tempat Gedung Dispora Sumbar Pondok Pemuda Lubuk Selasih Solok", "- Retribusi Penyewaan Tanah dan Bangunan", "Sewa Tempat Gedung KNPI Sumbar", "Retribusi Penyewaan Tanah dan Bangunan");

                $listData = $penyewaan->laporanKeseluruhanPenyewaan($getCurrentYear);
                // print_r($listData);

                $targetGor = 1500000000;
                $retribusiGor;
                $realisasiRetribusiGor = 97110000 + 124862000 + 118305000;

                $targetLubukSelasih = 42187500;
                $retribusiLubukSelasih;
                $realisasiRetribusiLubukSelasih = 250000;

                $targetGedungKNPI = 14062500;
                $retribusiGedungKNPI;
                $realisasiRetribusiGedungKNPI = 14062500;

                $retribusiPenyewaanTanahdanBangunan = $targetGor + $targetLubukSelasih + $targetGedungKNPI;

                $sumJanuariGor = 97110000;
                $sumFebruariGor = 124862000;
                $sumMaretGor = 118305000;
                $sumAprilGor = 0;
                $sumMeiGor = 0;
                $sumJuniGor = 0;
                $sumJuliGor = 0;
                $sumAgustusGor = 0;
                $sumSeptemberGor = 0;
                $sumOktoberGor = 0;
                $sumNovemberGor = 0;
                $sumDesemberGor = 0;

                $sumJanuariLubukSelasih = 0;
                $sumFebruariLubukSelasih = 0;
                $sumMaretLubukSelasih = 250000;
                $sumAprilLubukSelasih = 0;
                $sumMeiLubukSelasih = 0;
                $sumJuniLubukSelasih = 0;
                $sumJuliLubukSelasih = 0;
                $sumAgustusLubukSelasih = 0;
                $sumSeptemberLubukSelasih = 0;
                $sumOktoberLubukSelasih = 0;
                $sumNovemberLubukSelasih = 0;
                $sumDesemberLubukSelasih = 0;

                $sumJanuariGedungKNPI = 0;
                $sumFebruariGedungKNPI = 0;
                $sumMaretGedungKNPI = 0;
                $sumAprilGedungKNPI = 0;
                $sumMeiGedungKNPI = 0;
                $sumJuniGedungKNPI = 0;
                $sumJuliGedungKNPI = 0;
                $sumAgustusGedungKNPI = 0;
                $sumSeptemberGedungKNPI = 0;
                $sumOktoberGedungKNPI = 0;
                $sumNovemberGedungKNPI = 0;
                $sumDesemberGedungKNPI = 0;

                foreach ($listData as $key => $value) {
                    switch ($value['id_retri']) {
                        case 1: // Gedung KNPI
                            switch ($value['MONTH(tanggal)']) {
                                case 1:
                                    $sumJanuariGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 2:
                                    $sumFebruariGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 3:
                                    $sumMaretGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 4:
                                    $sumAprilGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 5:
                                    $sumMeiGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 6:
                                    $sumJuniGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 7:
                                    $sumJuliGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 8:
                                    $sumAgustusGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 9:
                                    $sumSeptemberGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 10:
                                    $sumOktoberGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 11:
                                    $sumNovemberGedungKNPI += $value['SUM(total)'];
                                    break;
                                case 12:
                                    $sumDesemberGedungKNPI += $value['SUM(total)'];
                                    break;
                            }
                            break;
                        case 2: // Pondok Pemuda Lubuk Selasih
                            switch ($value['MONTH(tanggal)']) {
                                case 1:
                                    $sumJanuariLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 2:
                                    $sumFebruariLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 3:
                                    $sumMaretLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 4:
                                    $sumAprilLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 5:
                                    $sumMeiLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 6:
                                    $sumJuniLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 7:
                                    $sumJuliLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 8:
                                    $sumAgustusLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 9:
                                    $sumSeptemberLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 10:
                                    $sumOktoberLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 11:
                                    $sumNovemberLubukSelasih += $value['SUM(total)'];
                                    break;
                                case 12:
                                    $sumDesemberLubukSelasih += $value['SUM(total)'];
                                    break;
                            }
                            break;
                        case 3: // Gor H Agus Salim Padang
                            switch ($value['MONTH(tanggal)']) {
                                case 1:
                                    $sumJanuariGor += $value['SUM(total)'];
                                    break;
                                case 2:
                                    $sumFebruariGor += $value['SUM(total)'];
                                    break;
                                case 3:
                                    $sumMaretGor += $value['SUM(total)'];
                                    break;
                                case 4:
                                    $sumAprilGor += $value['SUM(total)'];
                                    break;
                                case 5:
                                    $sumMeiGor += $value['SUM(total)'];
                                    break;
                                case 6:
                                    $sumJuniGor += $value['SUM(total)'];
                                    break;
                                case 7:
                                    $sumJuliGor += $value['SUM(total)'];
                                    break;
                                case 8:
                                    $sumAgustusGor += $value['SUM(total)'];
                                    break;
                                case 9:
                                    $sumSeptemberGor += $value['SUM(total)'];
                                    break;
                                case 10:
                                    $sumOktoberGor += $value['SUM(total)'];
                                    break;
                                case 11:
                                    $sumNovemberGor += $value['SUM(total)'];
                                    break;
                                case 12:
                                    $sumDesemberGor += $value['SUM(total)'];
                                    break;
                            }
                            break;
                    }
                }

                $totalRetribusiGor = $sumJanuariGor + $sumFebruariGor + $sumMaretGor + $sumAprilGor + $sumMeiGor + $sumJuniGor + $sumJuliGor + $sumAgustusGor + $sumSeptemberGor + $sumOktoberGor + $sumNovemberGor + $sumDesemberGor;

                $totalRetribusiLubukSelasih = $sumJanuariLubukSelasih + $sumFebruariLubukSelasih + $sumMaretLubukSelasih + $sumAprilLubukSelasih + $sumMeiLubukSelasih + $sumJuniLubukSelasih + $sumJuliLubukSelasih + $sumAgustusLubukSelasih + $sumSeptemberLubukSelasih + $sumOktoberLubukSelasih + $sumNovemberLubukSelasih + $sumDesemberLubukSelasih;

                $totalRetribusiGedungKNPI = $sumJanuariGedungKNPI + $sumFebruariGedungKNPI + $sumMaretGedungKNPI + $sumAprilGedungKNPI + $sumMeiGedungKNPI + $sumJuniGedungKNPI + $sumJuliGedungKNPI + $sumAgustusGedungKNPI + $sumSeptemberGedungKNPI + $sumOktoberGedungKNPI + $sumNovemberGedungKNPI + $sumDesemberGedungKNPI;

                ?>

                <tr>
                    <td>4.</td>
                    <td>PENDAPATAN DAERAH</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td>4.1</td>
                    <td>PENDAPATAN ASLIDAERAH (PAD)</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td>4.1.02</td>
                    <td>Retribusi Daerah</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td>4.1.02.02</td>
                    <td>Retribusi Jasa Usaha</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td>4.1.02.02.01</td>
                    <td>Retribusi PemakaianKekayaan Daerah</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td>4.1.02.02.01.0003</td>
                    <td>Retribusi PenyewaanBangunan</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>Retribusi Penyewaan Tanah dan Bangunan</td>
                    <td> 1,556,250,000 </td>
                    <td> 97,110,000 </td>
                    <td> 124,862,000 </td>
                    <td> 118,555,000 </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> 340,527,000 </td>
                    <td>21.88%</td>
                    <td> 1,215,723,000 </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>GOR H AGUS SALIM PADANG</td>
                    <td> </td>
                    <td> </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> </td>
                    <td> - </td>
                </tr>
                <tr class="light-blue-background">
                    <td> </td>
                    <td>Retribusi Penyewaan Tanah dan Bangunan</td>
                    <td> <?= number_format($targetGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJanuariGor == 0) ? "-" : number_format($sumJanuariGor, 0, '.', ","); ?></td>
                    <td> <?= ($sumFebruariGor == 0) ? "-" : number_format($sumFebruariGor, 0, '.', ","); ?></td>
                    <td> <?= ($sumMaretGor == 0) ? "-" : number_format($sumMaretGor, 0, '.', ","); ?></td>
                    <td> <?= ($sumAprilGor == 0) ? "-" : number_format($sumAprilGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumMeiGor == 0) ? "-" : number_format($sumMeiGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuniGor == 0) ? "-" : number_format($sumJuniGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuliGor == 0) ? "-" : number_format($sumJuliGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumAgustusGor == 0) ? "-" : number_format($sumAgustusGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumSeptemberGor == 0) ? "-" : number_format($sumSeptemberGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumOktoberGor == 0) ? "-" : number_format($sumOktoberGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumNovemberGor == 0) ? "-" : number_format($sumNovemberGor, 0, '.', ","); ?> </td>
                    <td> <?= ($sumDesemberGor == 0) ? "-" : number_format($sumDesemberGor, 0, '.', ","); ?> </td>
                    <td> <?= number_format($totalRetribusiGor, 0, '.', ",")  ?> </td>
                    <td><?= number_format((($totalRetribusiGor / $targetGor) * 100), 2, '.', ","); ?></td>
                    <td> <?= number_format(($targetGor - $totalRetribusiGor), 0, '.', ",")   ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>Sewa Tempat Gedung Dispora Sumbar Pondok Pemuda Lubuk Selasih Solok</td>
                    <td> </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> </td>
                    <td> - </td>
                </tr>
                <tr class="light-blue-background">
                    <td> </td>
                    <td>Retribusi Penyewaan Tanah dan Bangunan</td>
                    <td> <?= number_format($targetLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJanuariLubukSelasih == 0) ? "-" : number_format($sumJanuariLubukSelasih, 0, '.', ","); ?></td>
                    <td> <?= ($sumFebruariLubukSelasih == 0) ? "-" : number_format($sumFebruariLubukSelasih, 0, '.', ","); ?></td>
                    <td> <?= ($sumMaretLubukSelasih == 0) ? "-" : number_format($sumMaretLubukSelasih, 0, '.', ","); ?></td>
                    <td> <?= ($sumAprilLubukSelasih == 0) ? "-" : number_format($sumAprilLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumMeiLubukSelasih == 0) ? "-" : number_format($sumMeiLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuniLubukSelasih == 0) ? "-" : number_format($sumJuniLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuliLubukSelasih == 0) ? "-" : number_format($sumJuliLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumAgustusLubukSelasih == 0) ? "-" : number_format($sumAgustusLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumSeptemberLubukSelasih == 0) ? "-" : number_format($sumSeptemberLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumOktoberLubukSelasih == 0) ? "-" : number_format($sumOktoberLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumNovemberLubukSelasih == 0) ? "-" : number_format($sumNovemberLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= ($sumDesemberLubukSelasih == 0) ? "-" : number_format($sumDesemberLubukSelasih, 0, '.', ","); ?> </td>
                    <td> <?= number_format($totalRetribusiLubukSelasih, 0, '.', ",")  ?> </td>
                    <td><?= number_format((($totalRetribusiLubukSelasih / $targetLubukSelasih) * 100), 2, '.', ","); ?></td>
                    <td> <?= number_format(($targetLubukSelasih - $totalRetribusiLubukSelasih), 0, '.', ",")   ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td>Sewa Tempat Gedung KNPI Sumbar</td>
                    <td> </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> - </td>
                    <td> </td>
                    <td> - </td>
                </tr>
                <tr class="light-blue-background">
                    <td> </td>
                    <td> Retribusi Penyewaan Tanah dan Bangunan</td>
                    <td> <?= number_format($targetGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJanuariGedungKNPI == 0) ? "-" : number_format($sumJanuariGedungKNPI, 0, '.', ","); ?></td>
                    <td> <?= ($sumFebruariGedungKNPI == 0) ? "-" : number_format($sumFebruariGedungKNPI, 0, '.', ","); ?></td>
                    <td> <?= ($sumMaretGedungKNPI == 0) ? "-" : number_format($sumMaretGedungKNPI, 0, '.', ","); ?></td>
                    <td> <?= ($sumAprilGedungKNPI == 0) ? "-" : number_format($sumAprilGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumMeiGedungKNPI == 0) ? "-" : number_format($sumMeiGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuniGedungKNPI == 0) ? "-" : number_format($sumJuniGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumJuliGedungKNPI == 0) ? "-" : number_format($sumJuliGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumAgustusGedungKNPI == 0) ? "-" : number_format($sumAgustusGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumSeptemberGedungKNPI == 0) ? "-" : number_format($sumSeptemberGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumOktoberGedungKNPI == 0) ? "-" : number_format($sumOktoberGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumNovemberGedungKNPI == 0) ? "-" : number_format($sumNovemberGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= ($sumDesemberGedungKNPI == 0) ? "-" : number_format($sumDesemberGedungKNPI, 0, '.', ","); ?> </td>
                    <td> <?= number_format($totalRetribusiGedungKNPI, 0, '.', ",")  ?> </td>
                    <td><?= number_format((($totalRetribusiGedungKNPI / $targetGedungKNPI) * 100), 2, '.', ","); ?></td>
                    <td> <?= number_format(($targetGedungKNPI - $totalRetribusiGedungKNPI), 0, '.', ",")   ?> </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="ttd" style="float: right;">
        <p style="padding-bottom: 5em;" class="text-center">Kepala Dinas</p>
        <p class="text-center">
            <span class="font-weight-bold" class="text-center">Drs. Maifrizon, M.Si</span> <br>
            NIP. 19680513 199512 1 005
        </p>
    </div>
    <!-- use version 0.19.3 -->
    <script lang="javascript" src="vendor/sheetjs/xlsx.full.min.js"></script>

    <script>
        var wb = XLSX.utils.table_to_book(document.getElementById("export-div"));
        /* Export to file (start a download) */
        XLSX.writeFile(wb, "Rekap Secara Keseluruhan - 2023.xlsx");
        // window.location.assign('./?url=listsewa')
    </script>
</body>