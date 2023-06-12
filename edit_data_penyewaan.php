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
    $classPemungut = $wp->getListofPemungut();

    // print_r($class);

    if (isset($_POST['submit'])) {

        $wp = new PenyewaanController();

        $idTransaksi = $_POST['id_transaksi'];
        $idRetri = $_POST['jenis_retribusi'];
        $idKategoriRetribusi = $_POST['kategori_retribusi'];
        $idSubKategoriRetribusi = $_POST['sub_kategori_retribusi'];
        $tanggal = $_POST['tanggal_penyewaan'];
        $penyetor = $_POST['penyetor'];
        $referensi = $_POST['referensi'];
        $satuan = $_POST['volume'];
        $detailVolume = $_POST['detail_volume'];
        $nilai = $_POST['nilai'];

        $wp->editPenyewaan(
            $idTransaksi,
            $idRetri,
            $idKategoriRetribusi,
            $idSubKategoriRetribusi,
            $tanggal,
            $penyetor,
            $referensi,
            $satuan,
            $detailVolume,
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
                    <input type="hidden" value="<?= $class['id_transaksi'] ?>" name="id_transaksi">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Jenis Retribusi</label>
                            <select required data-live-search="true" title="Pilih Jenis Retribusi" name="jenis_retribusi" id="jenis_retribusi" class="form-control input-lg">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Kategori Retribusi</label>
                            <select required data-live-search="true" title="Pilih Kategori Retribusi" name="kategori_retribusi" id="kategori_retribusi" class="form-control input-lg">

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Sub Kategori Retribusi</label>
                            <select data-live-search="true" title="Sub Kategori Retribusi" name="sub_kategori_retribusi" id="sub_kategori_retribusi" class="form-control input-lg">

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Tarif</label>
                            <input required type="text" class="form-control" id="tarif" name="tarif" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Pemakaian (angka)</label>
                            <input required type="text" class="form-control" id="volume" name="volume" value="<?= $class['volume'] ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Satuan (hari/bulan/dll)</label>
                            <input required type="text" class="form-control" id="detail_volume" name="detail_volume" value="<?= $class['detail_volume'] ?>" placeholder="/kegiatan, jam/hari, dll...">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Nilai</label>
                            <input required type="text" class="form-control" id="nilai" name="nilai" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Tanggal Penyewaan</label>
                            <input required type="date" class="form-control" id="tanggal_penyewaan" name="tanggal_penyewaan" value="<?= $class['tanggal'] ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nama Penyetor</label>
                            <select name="penyetor" id="penyetor" class="form-control" required>
                                <option value="" disabled>-- Pilih Nama Penyetor --</option>
                                <?php
                                foreach ($classPemungut as $data) {
                                ?>
                                    <option value="<?= $data['id_pemungut'] ?> 
                                    <?php
                                    if ($class['penyetor'] == $data['id_pemungut']) { ?> selected 
                                    <?php }
                                    ?>"><?= $data['nama_pemungut'] ?></option>
                                <?php
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputPassword4">Referensi</label>
                            <input required type="text" class="form-control" id="referensi" name="referensi" value="<?= $class['referensi'] ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success" name="submit">Ubah</button>
                    <a type="button" class="btn btn-danger" href="?url=faktur">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <br>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#jenis_retribusi').selectpicker();
            $('#kategori_retribusi').selectpicker();
            $('#sub_kategori_retribusi').selectpicker();

            load_data('load_jenis_retribusi')

            function load_data(type, category_id = '') {
                console.log('hello :>> ');
                htmlDefaultOption = '<option selected value="0"> - Pilih kategori - </option>'

                $.ajax({
                    url: "load_retribusi_ajax.php",
                    method: "POST",
                    data: {
                        type: type,
                        category_id: category_id
                    },
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        var price = '';

                        html += htmlDefaultOption
                        for (var count = 0; count < data.length; count++) {
                            html += '<option data-priceretribusi="' + data[count].price + '" value="' + data[count].id + '">' + data[count].name + '</option>';
                        }

                        if (type == 'load_jenis_retribusi') {
                            $('#jenis_retribusi').html(html);
                            $('#jenis_retribusi').selectpicker('refresh');

                        } else if (type == 'load_kategori_retribusi') {
                            $('#kategori_retribusi').html(html);
                            $('#kategori_retribusi').selectpicker('refresh');

                            let subcategoryitem = document.getElementById("kategori_retribusi")
                            subcategoryitem.onchange = function() {
                                let selectedI = this.selectedIndex;
                                let selectedPrice = this.options[selectedI].dataset.priceretribusi
                                console.log(selectedPrice)

                                if (selectedPrice != 0) {
                                    // $('#sub_kategori_retribusi').prop('selectedIndex', 0);
                                    html = htmlDefaultOption
                                    $('#sub_kategori_retribusi').html(html);
                                    $('#sub_kategori_retribusi').selectpicker('refresh');

                                    console.log('here!! :>> ');
                                }

                                $('#tarif').val(selectedPrice)
                            }

                            console.log('html :>> ', html);

                        } else if (type == 'load_sub_kategori_retribusi') {
                            $('#sub_kategori_retribusi').html(html);
                            $('#sub_kategori_retribusi').selectpicker('refresh');

                            console.log('html :>> ', html);
                        }

                        let subsubcategoryitem = document.getElementById("sub_kategori_retribusi")
                        subsubcategoryitem.onchange = function() {
                            let selectedI = this.selectedIndex;
                            let selectedPrice = this.options[selectedI].dataset.priceretribusi
                            console.log(selectedPrice)

                            $('#tarif').val(selectedPrice)
                        }
                    }
                })
            }

            $(document).on('change', '#jenis_retribusi', function() {
                var category_id = $('#jenis_retribusi').val();
                load_data('load_kategori_retribusi', category_id);
            });

            $(document).on('change', '#kategori_retribusi', function() {
                var category_id = $('#kategori_retribusi').val();
                load_data('load_sub_kategori_retribusi', category_id);
            });

            $('#volume').keyup(function() { // run anytime the value changes
                var firstValue = Number($('#tarif').val()); // get value of field
                var secondValue = Number($('#volume').val()); // convert it to a float

                // $('#total_expenses1').html(firstValue + secondValue + thirdValue + fourthValue); // add them and output it
                document.getElementById('nilai').value = firstValue * secondValue
                // add them and output it
            });
        });
    </script>
</body>