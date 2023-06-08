<?php

class Laporan
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
}
?>