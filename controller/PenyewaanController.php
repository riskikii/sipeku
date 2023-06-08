<?php

class PenyewaanController
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=sipeku_pemko_db', "root", "");
    }

    public function fetch($query)
    {
        while ($fetch = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $fetch;
        }
        return @$data;
    }

    public function getListofPenyewaan()
    {
        $stmt = $this->db->prepare("SELECT * FROM transaksi JOIN jenis_retribusi ON transaksi.id_retri = jenis_retribusi.id_retribusi ORDER BY tanggal ASC");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function getListofRetribusi()
    {
        $stmt = $this->db->prepare("SELECT * FROM jenis_retribusi");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function getDataPenyewaan($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function inputPenyewaan($idRetri, $tanggal, $penyetor, $referensi, $satuan, $nilai)
    {
        try {
            $sqlDataPenyewaan = "INSERT INTO transaksi (id_retri, tanggal, penyetor, referensi, volume, nilai) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtDataPenyewaan = $this->db->prepare($sqlDataPenyewaan);
            $stmtDataPenyewaan->execute([$idRetri, $tanggal, $penyetor, $referensi, $satuan, $nilai]);

            echo "
                <script src='js/sweetalert/sweetalert2@11.js'></script>
                <script>
                    Swal.fire({
                            title: 'Data Berhasil Ditambah!',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Kembali'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.assign('./?url=faktur')
                            }
                        })
                </script>
                ";
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }

    public function editPenyewaan($idTransaksi, $idRetri, $tanggal, $penyetor, $referensi, $satuan, $nilai)
    {

        if ($idTransaksi == null) {
            header('location:?url=faktur');
        }

        try {
            $sqlDataPegawai = "UPDATE transaksi SET id_retri = ?, tanggal = ?, penyetor = ?, referensi = ?, volume = ?, nilai = ? WHERE id_transaksi = '$idTransaksi'";
            $stmtDataPegawai = $this->db->prepare($sqlDataPegawai);
            $stmtDataPegawai->execute([$idRetri, $tanggal, $penyetor, $referensi, $satuan, $nilai]);

            if ($stmtDataPegawai) {
                echo "
                <script src='js/sweetalert/sweetalert2@11.js'></script>
                <script>
                    Swal.fire({
                            title: 'Data Berhasil Diubah!',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Kembali'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.assign('./?url=faktur&after_edit=true')
                            }
                        })
                </script>
                ";
            }
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }

    public function deleteDataPenyewaan($idTransaksi)
    {
        try {
            $sqlDataPenyewaan = "DELETE FROM transaksi WHERE id_transaksi = ?";
            $stmtDataPenyewaan = $this->db->prepare($sqlDataPenyewaan);
            $stmtDataPenyewaan->execute([$idTransaksi]);
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }

    public function laporanKeseluruhanPenyewaan($year)
    {
        try {
            // $sqlLaporanKeseluruhan = "SELECT SUM(nilai), SUM(total), MONTH(tanggal), YEAR(tanggal) FROM transaksi WHERE YEAR(tanggal) = ? GROUP BY MONTH(tanggal), YEAR(tanggal) ORDER BY MONTH(tanggal) ASC;";
            $sqlLaporanKeseluruhan = "SELECT SUM(nilai), SUM(total), MONTH(tanggal), YEAR(tanggal), id_retri FROM transaksi WHERE YEAR(tanggal) = ? GROUP BY MONTH(tanggal), YEAR(tanggal), id_retri ORDER BY MONTH(tanggal) ASC";
            $stmtLaporanKeseluruhan = $this->db->prepare($sqlLaporanKeseluruhan);
            $stmtLaporanKeseluruhan->execute([$year]);

            return $this->fetch($stmtLaporanKeseluruhan);
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }
}
