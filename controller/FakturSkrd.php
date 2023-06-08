<?php

class FakturSkrd
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

    public function getFaktur($nip)
        {
            $stmt = $this->db->prepare("SELECT * FROM transaksi WHERE ");
            $stmt->execute();
            return $this->fetch($stmt);
        }
}
?>