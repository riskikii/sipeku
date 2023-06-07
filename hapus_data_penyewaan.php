<head>

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php


if ($_GET['id_penyewaan'] == null) {
    echo "
    <script>
    window.location.assign('./?url=penyewaan')
    </script>
    ";
}

$id_penyewaan = $_GET['id_penyewaan'];
spl_autoload_register(function ($class) {
    require_once 'controller/' . $class . '.php';
});

$wp = new PenyewaanController();

try {
    $dataSurat = $wp->deleteDataPenyewaan($id_penyewaan);

    echo "    
    <body>
        <script src='js/sweetalert/sweetalert2@11.js'></script>
        <script>
            Swal.fire({
                title: 'Data Berhasil Dihapus!',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace('./?url=penyewaan')
                }
            })
        </script>
    </body>
";
} catch (\Throwable $th) {
    throw $th;
}

?>