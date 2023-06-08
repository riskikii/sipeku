<head>
    <title>Faktur</title>

    <style>
        body {
            print-color-adjust: exact;
            line-height: 1;
            margin-right: 2cm;
            margin-left: 2cm;
            margin-top: 0.5cm;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                size: A4;
                size: portrait;
            }
        }

        .number-section {
            font-size: 14px;
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
        .faktur table  {
            width:100%; 
            border-collapse: collapse;
            font-size: 12px;

        }
        .faktur table, .faktur th, .faktur td {
            border: 1px solid black;
        }
        .faktur th, .faktur tr, .faktur td  {
            padding: 10px;
        }
    </style>

</head>


<?php
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}


if ($_GET['id_penyewaan'] == null) {
    header('location:?url=faktur');
}

$getId = $_GET['id_penyewaan'];

require_once 'controller/PenyewaanController.php';
require_once 'utils/CustomDateFormatter.php';

$wp = new PenyewaanController();
$formatter = new CustomDateFormatter();

$dataFaktur = $wp->getDataPenyewaan($getId)[0];
// print_r($dataSurat);
$angka=$dataFaktur['total'];

?>

<table cellscellspacing="0" style="width: 100%;">
    <tr>
        <td>
            <img src="img/lambang_sumbar.svg" alt="Lambang Sumatera Barat" width="65dp">
        </td>
        <td style="text-align: center; padding-right: 13%;">
            <span style="font-size: 16; font-weight: bold;">PENGELOLAAN GOR H AGUS SALIM PADANG<br></span>
            <span style="font-size: 20; font-weight: bold;">DINAS PEMUDA DAN OLAHRAGA<br></span>
            <span style="font-size: 16; font-weight: bold;">PROVINSI SUMATERA BARAT<br></span>
          
        </td>
    <tr>
        <td colspan=" 2">
            <span style="width:100%; background-color: black; display: block; height: 0.2em;"></span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 10; text-align: center; padding-top: 6px;">
        Jl. Rasuna Said No.74 Padang. Telp/Fax. 0751-443973 <br>
        Email : disporasumbarprov@gmail.com
    </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size: 16; text-align: center; font-weight: bold;"><br><br> FAKTUR <br><br></td>
    </tr>
</table>
<div class="faktur">
<table>
        <!-- <tr>
            <th rowspan="2">Nama</th>
            <th colspan="3">Nilai</th>
        </tr> -->
        <tr>
            <th>NO</th>
            <th>HARI/TGL <br> PEMAKAIAN</th>
            <th>FASILITAS YANG DIGUNAKAN</th>
            <th>VOL</th>
            <th>HARGA<br>RP</th>
            <th>JUMLAH<br>RP</th>
        </tr>
        <tr align="center">
            <td><b>1</b></td>
            <td><?php echo $formatter->indonesian($dataFaktur['tanggal']) ?></td>
            <td align="left"><?php echo $dataFaktur['referensi'] ?></td>
            <td><?php echo $dataFaktur['volume'] ?></td>
            <td><?php echo number_format($dataFaktur['nilai'], 0, '.', ","); ?></td>
            <td><?php echo number_format($dataFaktur['total'], 0, '.', ","); ?></td>
        </tr>
        <tr style="font-weight: bold;">
            <td colspan="5" align="center" >Jumlah</td>
            <td colspan="1" align="center"><?php echo number_format($dataFaktur['total'], 0, '.', ","); ?></td>
        </tr>
    </table>
</div>
<span style="font-size: 12; font-weight: bold;">
    <br> Terbilang : <?php echo terbilang ($angka) ?>
</span>

<table cellscellspacing="0" style="width: 100%;margin-top:50px;text-align:center;">
    <tr>
        <td style="padding-right:10%;">Yang Memungut Retribusi</td>
        <td colspan="2" style="padding-left:17%;">Padang, <?php echo $formatter->indonesian(date("Y-m-d")) ?> <br>
            <b>Bendahara Penerimaan</b>
        </td>
    </tr>
    <tr>
        <td style="padding-right:10%;padding-top:70px;"><u>Taufik Akma</u> <br> HP : 0852 7112 8026</td>
        <td colspan="2" style="padding-left:17%; padding-top:70px;"><b><u>Dissa Melina, SE</u></b> <br> Nip. 19941224 202012 2 019</td>
    </tr>
</table>


<script>
    window.print()
</script>