<body>
    <div class="card shadow">
        <div class="card-header">
            <h1 class="h3 mb-4 text-gray-800">MANUAL SIPD PENERIMAAN</h1>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th colspan="5">Sampai Dengan Bulan ini</th>  
                        <th colspan="1">Rp 150151</th>                     
                    </tr>
                    <tr>
                        <th colspan="5">Bulan Lalu</th>    
                        <th colspan="1">Rp. 231231</th>                   
                    </tr>
                    <tr>
                        <th colspan="5">Bulan Ini</th>      
                        <th colspan="1">Rp. 213122</th>                 
                    </tr>
                    <tr align="center">
                        <th>No Bukti</th>
                        <th>Tanggal Penyetor</th>
                        <th>Penyetor</th>
                        <th>Nilai</th>
                        <th>Referensi</th>
                        <th>Total</th>
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
                                foreach ($listData as $data) {
                            ?>
                    <tr>
                      <td><center><?php echo $data['id_transaksi'] ?></center></td>
                      <td><?php echo $formatter->indonesian($data['tanggal_setor']) ?></td>
                      <td><?php echo $data['penyetor'] ?></td>
                      <td>Rp.<?php echo number_format($data['nilai'], 0, '.', ","); ?></td>
                      <td><?php echo $data['referensi'] ?></td>                      
                      <td>Rp.<?php echo number_format($data['total'], 0, '.', ","); ?></td>
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
