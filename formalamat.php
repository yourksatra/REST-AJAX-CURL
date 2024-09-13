<?php
$testcURL = curl_init();
curl_setopt_array($testcURL, array(
    CURLOPT_URL => 'https://wilayah.id/api/provinces.json',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));
$response = curl_exec($testcURL);
curl_close($testcURL);
$data = json_decode($response, true);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Belajar REST API</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#prov").on('change', function() {
            const id = $('#prov').val();
            $.ajax({
                url: "https://wilayah.id/api/regencies/" + id + ".json",
                method: 'GET',
                dataType: 'json',
                success: function(result) {
                    if (result.data) {
                        let hasil = "";
                        result.data.forEach(function(item) {
                            hasil +=
                                `<option value="${item.code}">${item.name}</option>`
                        });
                        $("#kabkota").html(hasil);
                    }
                }
            });
        });
        $("#kabkota").on('change', function() {
            const kode = $('#kabkota').val();
            $.ajax({
                url: "https://wilayah.id/api/districts/" + kode + ".json",
                method: 'GET',
                dataType: 'json',
                success: function(result) {
                    if (result.data) {
                        let hasil = "";
                        result.data.forEach(function(item) {
                            hasil +=
                                `<option value="${item.code}">${item.name}</option>`
                        });
                        $("#kecamatan").html(hasil);
                    }
                }
            });
        });
    });
    </script>
</head>

<body>
    <h1>Memilih Alamat</h1>
    <select name="prov" id="prov">
        <option value="">Pilih Provinsi</option>
        <?php foreach ($data['data'] as $provinsi) {
        ?>
        <option value="<?= $provinsi['code'] ?>"><?= $provinsi['name'] ?></option>
        <?php
        } ?>
    </select>
    <select name="kabkota" id="kabkota">
        <option value="">Pilih Kabupaten/Kota</option>
    </select>
    <select name="kecamatan" id="kecamatan">
        <option value="">Pilih Kecamatan</option>
    </select>
</body>

</html>