<body>
    <div class="card shadow">
        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800">SKRD dan Faktur</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                        <th>No</th>                        
                        <th>Fasilitas</th>
                        <th>Tgl Pemakaian</th>
                        <th>Vol</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot  align="center">
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Tgl Pemakaian</th>
                        <th>Vol</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </tfoot>
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
                      <td><center><?php echo $no++ ?></center></td>
                      <td><?php echo $data['referensi'] ?></td>
                      <td><?php echo $formatter->indonesian($data['tanggal']) ?></td>
                      <td><?php echo $data['volume'] ?></td>
                      <td>Rp.<?php echo number_format($data['nilai'], 0, '.', ","); ?></td>
                      <td>Rp.<?php echo number_format($data['total'], 0, '.', ","); ?></td>
                      <td> 
                        <?php if ( $data['status'] == "lunas"){
                            echo "<p style='color:white;background-color: green;text-align:center; border-radius:10px; padding:10px 10px 10px 10px'>Lunas</p>";
                        } 
                        else if ( $data['status'] == "belum bayar"){
                            echo "<p style='color:white;background-color: #FFC300;text-align:center; border-radius:10px;padding:10px 10px 10px 10px; color:white'>Belum Bayar</p>";
                        }
                        ?>
                    </td>


                                    <td><center>
                                        <a href="print_faktur.php?id_penyewaan=<?php echo $data['id_transaksi']; ?>" target="_blank" class="btn btn-primary btn-icon-split" >
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                        </a>
                                        <a href="?url=edit_data_penyewaan&id_penyewaan=<?php echo $data['id_transaksi']; ?>" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#" onclick="confirmDelete(<?php echo $data['id_transaksi']; ?>)" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a></center>
                                    </td>
                    </tr><?php
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
</body>

<?php

if (@$_GET['edit_data'] == 'true') {
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
            })
    </script>
    ";
}

?>

<script src="js/sweetalert/sweetalert2@11.js"></script>
<script>
    function confirmDelete(nip) {
        Swal.fire({
            title: 'Hapus Surat?',
            text: "Apakah Anda yakin ingin menghapus surat dengan NIP " + nip + "? Data yang telah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e03131',
            cancelButtonColor: '#868e96',
            confirmButtonText: 'Ya, Hapus Data.',
            cancelButtonText: "Batalkan"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace("hapus_data.php?nip=" + nip)
            }
        })
    }
</script>
