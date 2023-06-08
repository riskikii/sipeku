<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Header -->
    <h1 class="h3 mb-4 text-gray-800">Penyewaan</h1>

    <div class="card shadow">
        <div class="card-header">
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <a href="?url=tambah_data_penyewaan" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        Tambah Data Penyewaan
                    </a>
                    <a href="lap_keseluruhan.php" class="btn btn-info">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        Cetak Data Keseluruhan
                    </a>
                </div>
                <div class="col-sm-4">
                    <form action="?url=surat_keputusan" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="find_nip" name="find_nip" placeholder="Cari transaksi...">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" name="search_nip" class="border-0">
                                        <div class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Bukti</th>
                            <th>Jenis Retribusi</th>
                            <th>Tanggal</th>
                            <th>Penyetor</th>
                            <th>Referensi</th>
                            <th>Nilai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'utils/CustomDateFormatter.php';
                        require_once 'controller/PenyewaanController.php';

                        $formatter = new CustomDateFormatter();
                        $penyewaan = new PenyewaanController();

                        $listData = $penyewaan->getListofPenyewaan();

                        if ($penyewaan != null) {
                            $no = 1;
                            foreach ($listData as $data) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['id_transaksi'] ?></td>
                                    <td><?php echo $data['nama_retribusi'] ?></td>
                                    <td><?php echo $formatter->indonesian($data['tanggal']) ?></td>
                                    <td><?php echo $data['penyetor'] ?></td>
                                    <td><?php echo $data['referensi'] ?></td>
                                    <td>Rp.<?php echo number_format($data['nilai'], 0, '.', ","); ?></td>
                                    <td>
                                        <!-- <a href="print_surat_keterangan.php?idpenyewaan=<?php echo $data['id_transaksi']; ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                        </a> -->
                                        <a href="?url=edit_data_penyewaan&id_penyewaan=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#" onclick="confirmDelete(<?php echo $data['id_transaksi']; ?>)" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>

                            <?php
                            }
                        } else {

                            ?>
                            <tr>
                                <td colspan="8" class="text-center h5 py-3">Data tidak ditemukan.</td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php

    $isEditTrue = @$_GET['edit_data'];

    if ($isEditTrue == 'true') {
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
                    }
                })
        </script>
        ";
    }
    ?>



    <script src="js/sweetalert/sweetalert2@11.js"></script>
    <script>
        function confirmDelete(idPenyewaan) {
            Swal.fire({
                title: 'Hapus Data Penyewaan?',
                text: "Apakah Anda yakin ingin data penyewaan dengan nomor bukti " + idPenyewaan + "? Data yang telah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e03131',
                cancelButtonColor: '#868e96',
                confirmButtonText: 'Ya, Hapus Data.',
                cancelButtonText: "Batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace("hapus_data_penyewaan.php?id_penyewaan=" + idPenyewaan)
                }
            })
        }
    </script>
</body>

</html>