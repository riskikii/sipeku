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


    public function getListofPemungut()
    {
        $stmt = $this->db->prepare("SELECT * FROM pemungut");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function getDataPenyewaan($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE id_transaksi = '$id'");
        $stmt->execute();
        return $this->fetch($stmt);
    }

    public function inputPenyewaan($idRetri, $idKategoriRetribusi, $idSubKategoriRetribusi, $tanggal, $penyetor, $referensi, $satuan, $detailVolume, $nilai)
    {
        try {
            $sqlDataPenyewaan = "INSERT INTO transaksi (id_retri, id_kategori_retribusi, id_sub_kategori_retribusi, penyetor, referensi, volume, detail_volume, nilai) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtDataPenyewaan = $this->db->prepare($sqlDataPenyewaan);
            $stmtDataPenyewaan->execute([$idRetri, $idKategoriRetribusi, $idSubKategoriRetribusi, $penyetor, $referensi, $satuan, $detailVolume, $nilai]);

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

    public function editPenyewaan($idTransaksi, $idRetri, $idKategoriRetribusi, $idSubKategoriRetribusi = 0, $tanggal, $penyetor, $referensi, $satuan, $detailVolume, $nilai)
    {

        if ($idTransaksi == null) {
            header('location:?url=faktur');
        }

        try {
            $sqlDataPegawai = "UPDATE transaksi SET id_retri = ?, id_kategori_retribusi = ?, id_sub_kategori_retribusi = ?, tanggal = ?, penyetor = ?, referensi = ?, volume = ?, detail_volume = ?, nilai = ? WHERE id_transaksi = '$idTransaksi'";
            $stmtDataPegawai = $this->db->prepare($sqlDataPegawai);
            $stmtDataPegawai->execute([$idRetri, $idKategoriRetribusi, $idSubKategoriRetribusi, $tanggal, $penyetor, $referensi, $satuan, $detailVolume, $nilai]);

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

    public function laporanPenyewaanPerItem()
    {
        try {
            $sqlLaporanPerItem = "SELECT kategori_retribusi.id_kategori_retribusi, sub_kategori_retribusi.id_sub_kategori_retribusi, SUM(nilai), MONTH(tanggal_input), kategori_retribusi.nama_kategori_retribusi, sub_kategori_retribusi.nama_sub_kategori_retribusi FROM transaksi JOIN jenis_retribusi ON transaksi.id_retri = jenis_retribusi.id_retribusi JOIN kategori_retribusi ON transaksi.id_kategori_retribusi = kategori_retribusi.id_kategori_retribusi JOIN sub_kategori_retribusi ON transaksi.id_sub_kategori_retribusi = sub_kategori_retribusi.id_sub_kategori_retribusi GROUP BY MONTH(tanggal_input) ORDER BY transaksi.id_kategori_retribusi ASC;";

            $stmtLaporanPerItem = $this->db->prepare($sqlLaporanPerItem);
            $stmtLaporanPerItem->execute();

            return $this->fetch($stmtLaporanPerItem);
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }
}
