
<?php

class Pelanggan
{
    private $idPelanggan;
    private $nama;
    private $noTelepon;
    private $alamat;

    public function __construct($id, $nama, $telepon, $alamat)
    {
        $this->idPelanggan = $id;
        $this->nama = $nama;
        $this->noTelepon = $telepon;
        $this->alamat = $alamat;
    }

    public function buatPesanan()
    {
        return new Pesanan("PSN001");
    }

    public function getInfoPelanggan()
    {
        return $this->nama . " - " . $this->noTelepon;
    }
}


class Menu
{
    private $kodeMenu;
    private $namaMenu;
    private $harga;
    private $stok;

    public function __construct($kode, $nama, $harga, $stok)
    {
        $this->kodeMenu = $kode;
        $this->namaMenu = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public function getInfoMenu()
    {
        return $this->namaMenu . " - Rp" . $this->harga;
    }

    public function updateStok($jumlah)
    {
        $this->stok -= $jumlah;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function getNamaMenu()
    {
        return $this->namaMenu;
    }
}


class Pesanan
{
    private $noPesanan;
    private $tanggalPemesanan;
    private $statusPesanan;
    private $daftarMenu = [];

    public function __construct($noPesanan)
    {
        $this->noPesanan = $noPesanan;
        $this->tanggalPemesanan = date("d-m-Y");
        $this->statusPesanan = "Menunggu";
    }

    public function tambahMenu($menu, $jumlah)
    {
        $this->daftarMenu[] = [
            "menu" => $menu,
            "jumlah" => $jumlah
        ];

        $menu->updateStok($jumlah);
    }

    public function updateStatus($statusBaru)
    {
        $this->statusPesanan = $statusBaru;
    }

    public function hitungTotal()
    {
        $total = 0;

        foreach ($this->daftarMenu as $item) {
            $total += $item["menu"]->getHarga() * $item["jumlah"];
        }

        return $total;
    }

    public function getDaftarMenu()
    {
        return $this->daftarMenu;
    }
}


// SIMULASI PEMESANAN

$pelanggan = new Pelanggan(
    "P001",
    "Adli",
    "081234567890",
    "Pontianak"
);

$nasiGoreng = new Menu("M001", "Nasi Goreng", 15000, 10);
$mieAyam = new Menu("M002", "Mie Ayam", 12000, 8);
$esTeh = new Menu("M003", "Es Teh", 5000, 15);

$pesanan = $pelanggan->buatPesanan();

$pesanan->tambahMenu($nasiGoreng, 2);
$pesanan->tambahMenu($mieAyam, 1);
$pesanan->tambahMenu($esTeh, 2);

$pesanan->updateStatus("Diproses");


// OUTPUT

echo "SISTEM PEMESANAN MAKANAN\n";
echo "=======================\n\n";

echo "Pelanggan: " . $pelanggan->getInfoPelanggan() . "\n";
echo "Nomor Pesanan: PSN001\n";
echo "Status Pesanan: Diproses\n\n";

echo "DAFTAR PESANAN:\n";

foreach ($pesanan->getDaftarMenu() as $item) {
    $menu = $item["menu"];
    $jumlah = $item["jumlah"];

    echo $menu->getNamaMenu() .
        " x " . $jumlah .
        " = Rp" . ($menu->getHarga() * $jumlah) . "\n";
}

echo "\nTotal Pembayaran: Rp" . $pesanan->hitungTotal();

echo "\n\nSTOK MENU:\n";
echo "Nasi Goreng: " . $nasiGoreng->getStok() . "\n";
echo "Mie Ayam: " . $mieAyam->getStok() . "\n";
echo "Es Teh: " . $esTeh->getStok() . "\n";

?>
