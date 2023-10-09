<!DOCTYPE html>
<html>
<head>
    <title>Contoh Switch Case</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <ul>
        <li><a href="index.php?page=beranda">Beranda</a></li>
        <li><a href="index.php?page=produk">Produk</a></li>
        <li><a href="index.php?page=kontak">Kontak</a></li>
    </ul>
    
    <?php
    // Ambil nilai parameter 'page' dari URL
    $halaman = isset($_GET['page']) ? $_GET['page'] : 'beranda';

    // Gunakan switch untuk menentukan halaman yang akan dimuat
    switch ($halaman) {
        case 'beranda':
            include('beranda.php'); // Mengarahkan ke halaman beranda.php
            break;
        case 'produk':
            include('produk.php'); // Mengarahkan ke halaman produk.php
            break;
        case 'kontak':
            include('kontak.php'); // Mengarahkan ke halaman kontak.php
            break;
        default:
            include('404.php'); // Jika parameter 'page' tidak cocok, arahkan ke halaman 404.php
            break;
    }
    ?>
</body>
</html>
