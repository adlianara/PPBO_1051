<?php

require_once "models/Product.php";

$product = new Product();

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$data = $product->findById($id);

if (!$data) {
    die("Produk tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $product->update($id, $nama, $harga, $stok);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>

<body>

    <h1>Edit Produk</h1>

    <form method="POST">

        <label>Nama Produk</label>
        <br>

        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($data['nama']); ?>"
            required
        >

        <br><br>

        <label>Harga</label>
        <br>

        <input
            type="number"
            name="harga"
            value="<?= $data['harga']; ?>"
            required
        >

        <br><br>

        <label>Stok</label>
        <br>

        <input
            type="number"
            name="stok"
            value="<?= $data['stok']; ?>"
            required
        >

        <br><br>

        <button type="submit">Simpan Perubahan</button>

        <a href="index.php">Kembali</a>

    </form>

</body>

</html>