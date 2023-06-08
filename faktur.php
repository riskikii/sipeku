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
                            <th>Tgl Pemakaian</th>
                            <th>Fasilitas</th>
                            <th>Vol</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot align="center">
                        <tr>
                            <th>No</th>
                            <th>Tgl Pemakaian</th>
                            <th>Fasilitas</th>
                            <th>Vol</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>
                                <center>1</center>
                            </td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>
                                <center>
                                    <p style="background-color:blue;">belum bayar</p>
                                </center>
                            </td>
                            <td>
                                <center>
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
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>2</center>
                            </td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                            <td>
                                <center>
                                    <p style="background-color:blue;">belum bayar</p>
                                </center>
                            </td>
                            <td>
                                <center>
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
                                </center>
                            </td>
                        </tr>
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