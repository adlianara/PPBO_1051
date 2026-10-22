<?php

require_once "models/Product.php";

$product = new Product();
$products = $product->findAll();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
</head>

<body>

    <h1>Manajemen Produk</h1>

    <a href="tambah.php">+ Tambah Produk</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($products as $item): ?>

                <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['nama']; ?></td>
                    <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                    <td><?= $item['stok']; ?></td>

                    <td>
                        <a href="edit.php?id=<?= $item['id']; ?>">
                            Edit
                        </a>

                        |

                        <a href="hapus.php?id=<?= $item['id']; ?>"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</body>
</html>