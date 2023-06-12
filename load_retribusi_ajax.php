
<?php

$connect = new PDO('mysql:host=localhost;dbname=sipeku_pemko_db', "root", "");

if (isset($_POST["type"])) {
    if ($_POST["type"] == "load_jenis_retribusi") {
        $query = "
  SELECT * FROM jenis_retribusi 
  ORDER BY nama_retribusi ASC
  ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
                'id'  => $row["id_retribusi"],
                'name'  => $row["nama_retribusi"]
            );
        }
        echo json_encode($output);
    } else if ($_POST["type"] == "load_kategori_retribusi") {
        $query = "
  SELECT * FROM kategori_retribusi 
  WHERE id_jenis_retribusi = '" . $_POST["category_id"] . "' 
  ORDER BY nama_kategori_retribusi ASC
  ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
                'id'  => $row["id_kategori_retribusi"],
                'name'  => $row["nama_kategori_retribusi"],
                'price' =>  $row["tarif_kategori_retribusi"]
            );
        }
        echo json_encode($output);
    } else {
        $query = "
        SELECT * FROM sub_kategori_retribusi 
        WHERE id_kategori_retribusi = '" . $_POST["category_id"] . "' 
        ORDER BY nama_sub_kategori_retribusi ASC
  ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        foreach ($data as $row) {
            $output[] = array(
                'id'  => $row["id_sub_kategori_retribusi"],
                'name'  => $row["nama_sub_kategori_retribusi"],
                'price' =>  $row["tarif_sub_kategori_retribusi"]
            );
        }
        echo json_encode($output);
    }
}

?>