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

    public function inputPenyewaan($idRetri, $tanggal, $penyetor, $referensi, $nilai)
    {
        try {
            $sqlDataPenyewaan = "INSERT INTO transaksi (id_retri, tanggal, penyetor, referensi, nilai) VALUES (?, ?, ?, ?, ?)";
            $stmtDataPenyewaan = $this->db->prepare($sqlDataPenyewaan);
            $stmtDataPenyewaan->execute([$idRetri, $tanggal, $penyetor, $referensi, $nilai]);

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
                                window.location.assign('./?url=penyewaan')
                            }
                        })
                </script>
                ";
        } catch (\Throwable $th) {
            echo "Error! " . $th;
        }
    }

    public function editPenyewaan($idTransaksi, $idRetri, $tanggal, $penyetor, $referensi, $nilai)
    {

        if ($idTransaksi == null) {
            header('location:?url=penyewaan');
        }

        try {
            $sqlDataPegawai = "UPDATE transaksi SET id_retri = ?, tanggal = ?, penyetor = ?, referensi = ?, nilai = ? WHERE id_transaksi = '$idTransaksi'";
            $stmtDataPegawai = $this->db->prepare($sqlDataPegawai);
            $stmtDataPegawai->execute([$idRetri, $tanggal, $penyetor, $referensi, $nilai]);
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
                                window.location.assign('./?url=penyewaan')
                            }
                        })
                </script>
                ";
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
}
