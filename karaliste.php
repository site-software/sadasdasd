<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
    $name = $_POST['name'];
    $file = 'blacklist.json';

    // JSON dosyasını oku
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
    } else {
        $data = [];
    }

    // Yeni veriyi ekle
    $data[] = ['name' => $name];

    // JSON dosyasına yaz
    file_put_contents($file, json_encode($data));

    // Kullanıcıyı ana sayfaya yönlendir
    header('Location: index.html');
    exit;
}
?>
