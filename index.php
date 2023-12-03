<?php
$file = 'blacklist.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Form gönderildiğinde çalışacak kısım
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
    $name = $_POST['name'];
    $data[] = ['name' => $name];
    file_put_contents($file, json_encode($data));
    header('Location: index.php'); // Sayfayı yeniden yükle
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kara Liste Sistemi</title>
</head>
<body>
    <h2>Kara Liste Ekle</h2>
    <form method="post" action="index.php">
        İsim: <input type="text" name="name">
        <input type="submit" value="Ekle">
    </form>

    <h2>Kara Liste</h2>
    <ul>
        <?php foreach ($data as $item): ?>
            <li><?php echo htmlspecialchars($item['name']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
