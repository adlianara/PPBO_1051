<?php

require_once __DIR__ . "/../config/DatabaseConnection.php";

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getConnection();
    }

    // CREATE - tambah data
    public function save($nama, $harga, $stok)
    {
        $sql = "INSERT INTO products (nama, harga, stok)
                VALUES (:nama, :harga, :stok)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nama' => $nama,
            ':harga' => $harga,
            ':stok' => $stok
        ]);
    }

    // READ - lihat semua data
    public function findAll()
    {
        $sql = "SELECT * FROM products ORDER BY id DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ - lihat satu data
    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE - update data
    public function update($id, $nama, $harga, $stok)
    {
        $sql = "UPDATE products
                SET nama = :nama,
                    harga = :harga,
                    stok = :stok
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nama' => $nama,
            ':harga' => $harga,
            ':stok' => $stok
        ]);
    }

    // DELETE - hapus data
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}