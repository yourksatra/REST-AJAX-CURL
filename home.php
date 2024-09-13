<?php
$testcURL = curl_init();
curl_setopt_array($testcURL, array(
    CURLOPT_URL => 'https://animechan.io/api/v1/quotes/random',
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Selamat Datang</h1>
    <?php
    if (isset($data['data']['content']) && isset($data['data']['character']['name'])) {
        echo "
        <button onclick='tampilkanQuote()'>Tampilkan Quote</button>
        <div class='box'>
            <blockquote id='tampil' class='quote'>".htmlspecialchars($data['data']['content'])."</blockquote>
            <p class='quoteBy'>By - <i id='by'>". htmlspecialchars($data['data']['character']['name']) ."</i></p>
        </div>
        ";
    }else{
        echo "Gagal mengambil data dari API.";
    }
    ?>

    <script src=" test.js"></script>
</body>

</html>