<?php
require_once '../Catatan.php';

$c = new Catatan();
$hasil = $c->setJudul("AKU HARUS BISA")
            ->setIsi("SEMANGAT BELAJAR")
            ->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";