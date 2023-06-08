<body>
    <?php

    if (isset($_POST['submit'])) {

        spl_autoload_register(function ($class) {
            require_once 'controller/' . $class . '.php';
        });

        $wp = new PenyewaanController();

        $idRetri = $_POST['jenis_retribusi'];
        $tanggal = $_POST['tanggal_penyewaan'];
        $penyetor = $_POST['penyetor'];
        $referensi = $_POST['referensi'];
        $nilai = $_POST['nilai'];
        $satuan = $_POST['volume'];

        $wp->inputPenyewaan(
            $idRetri,
            $tanggal,
            $penyetor,
            $referensi,
            $satuan,
            $nilai
        );

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
                <h3 class="mb-3">Tambah Data Penyewaan</h3>
                <form method="POST" action="?url=tambah_data_penyewaan">
                    <div class="form-group">
                        <label for="inputAddress2">Jenis Retribusi</label>
                        <select name="jenis_retribusi" class="form-control">
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
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Penyewaan</label>
                            <input required type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nama Penyetor</label>
                            <input required type="text" class="form-control" id="penyetor" name="penyetor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Satuan</label>
                            <input required type="text" class="form-control" id="volume" name="volume">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nilai</label>
                            <input required type="text" class="form-control" id="nilai" name="nilai">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Referensi</label>
                            <input required type="text" class="form-control" id="referensi" name="referensi">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="submit">Tambahkan</button>
                    <a type="button" class="btn btn-danger" href="?url=faktur">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <br>
</body>