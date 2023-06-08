<div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Tambah Data Penyewaan</h3>
                <form method="POST" action="?url=tambah_data_penyewaan">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Dari Tanggal</label>
                            <input type="date" class="form-control" id="dari_tanggal" name="dari_tanggal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="sampai_tanggal" name="sampai_tanggal">
                        </div>
                    </div>

                    <a type="button" class="btn btn-success" name="submit" href="?url=print_lap_rinci">Cari</a>
                    <a type="button" class="btn btn-danger" href="index.php">Batal</a>
                </form>
            </div>
        </div>
    </div>