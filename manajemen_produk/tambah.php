<?php

require_once "models/Product.php";

$product = new Product();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $product->save($nama, $harga, $stok);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>

<body>

    <h1>Tambah Produk</h1>

    <form method="POST">

        <label>Nama Produk</label>
        <br>
        <input type="text" name="nama" required>

        <br><br>

        <label>Harga</label>
        <br>
        <input type="number" name="harga" required>

        <br><br>

        <label>Stok</label>
        <br>
        <input type="number" name="stok" required>

        <br><br>

        <button type="submit">Simpan</button>

        <a href="index.php">Kembali</a>

    </form>

</body>
</html>