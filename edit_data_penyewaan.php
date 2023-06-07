<body>
    <?php

    spl_autoload_register(function ($class) {
        require_once 'controller/' . $class . '.php';
    });

    $wp = new PenyewaanController();

    $getIdPenyewaan = $_GET['id_penyewaan'];
    if ($getIdPenyewaan == null) {

        header('location:./?url=penyewaan');
    }

    $class = $wp->getDataPenyewaan($getIdPenyewaan)[0];

    // print_r($class);

    if (isset($_POST['submit'])) {

        $wp = new PenyewaanController();

        $idTransaksi = $_POST['id_transaksi'];
        $idRetri = $_POST['jenis_retribusi'];
        $tanggal = $_POST['tanggal_penyewaan'];
        $penyetor = $_POST['penyetor'];
        $referensi = $_POST['referensi'];
        $nilai = $_POST['nilai'];

        $wp->editPenyewaan(
            $idTransaksi,
            $idRetri,
            $tanggal,
            $penyetor,
            $referensi,
            $nilai
        );
    }

    ?>


    <br>


    <?php
    require_once 'controller/PenyewaanController.php';

    $retribusi = new PenyewaanController();

    $listRestribusi = $retribusi->getListofRetribusi();
    ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Edit Data Penyewaan</h3>
                <form method="POST" action="?url=edit_data_penyewaan">
                    <div class="form-group">
                        <label for="inputAddress2">Jenis Retribusi</label>
                        <select name="jenis_retribusi" class="form-control" required>

                            <option selected disabled value="">-- Pilih Jenis Retribusi --</option>
                            <?php

                            foreach ($listRestribusi as $data) {
                            ?>
                                <option value="<?php echo $data['id_retribusi'] ?>"><?php echo $data['nama_retribusi'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <input type="hidden" name="id_transaksi" value="<?php echo $class['id_transaksi'] ?>">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Tanggal Penyewaan</label>
                            <input required type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan" value="<?php echo $class['tanggal'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Nama Penyetor</label>
                            <input required type="text" class="form-control" id="penyetor" name="penyetor" value="<?php echo $class['penyetor'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Nilai</label>
                            <input required type="text" class="form-control" id="nilai" name="nilai" value="<?php echo $class['nilai'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Referensi</label>
                            <input required type="text" class="form-control" id="referensi" name="referensi" value="<?php echo $class['referensi'] ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="submit">Perbaharui</button>
                    <a type="button" class="btn btn-danger" href="?url=penyewaan">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <br>
</body>