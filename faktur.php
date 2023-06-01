<body>
    <div class="card shadow">
        <div class="card-header">
        <h1 class="h3 mb-4 text-gray-800">SKRD dan Faktur</h1>
            <br>
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <form action="?url=surat_keputusan" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="find_nip" name="find_nip" placeholder="Cari pegawai berdasarkan NIP...">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Pemakaian</th>

                            <th>Fasilitas yang digunakan</th>
                            <th>Vol</th>
                            <th>Harga</th>
                            <th>jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    ?>
                                <tr>
                                    <td>1</td>
                                    <td>12 April 2023</td>
                                    <td>Sewa Cafe Musiman GOR H Agus Salim</td>
                                    <td>115</td>
                                    <td>Rp.8.000</td>
                                    <td>Rp.920.000</td>
                                    <td><center><p style ="background-color:blue;">belum bayar</p></center></td>
                                    <td>
                                        <a href="print_surat_keterangan.php?nip=<?php echo $data['nip']; ?>" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-print"></i>
                                            </span>
                                        </a>
                                        <a href="?url=edit_data&nip=<?php echo $data['nip']; ?>" class="btn btn-warning btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#" onclick="confirmDelete(<?php echo $data['nip']; ?>)" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                        
                            <?php
                        
                        ?>
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


