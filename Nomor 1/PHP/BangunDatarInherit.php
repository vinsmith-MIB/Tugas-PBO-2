<?php
// Kelas Induk (Superclass)
class BangunDatar {
    public $nama;
    
    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function hitungLuas() {
        // Ini akan diimplementasikan oleh kelas anak.
    }
    
    public function hitungKeliling() {
        // Ini akan diimplementasikan oleh kelas anak.
    }
}

// Kelas Anak: Persegi
class Persegi extends BangunDatar {
    private $sisi;

    public function __construct($nama, $sisi) {
        parent::__construct($nama);
        $this->sisi = $sisi;
    }
    
    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }

    public function hitungKeliling() {
        return 4 * $this->sisi;
    }
}

// Kelas Anak: Persegi Panjang
class PersegiPanjang extends BangunDatar {
    private $panjang;
    private $lebar;
    
    public function __construct($nama, $panjang, $lebar) {
        parent::__construct($nama);
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }
    
    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
    
    public function hitungKeliling() {
        return 2 * ($this->panjang + $this->lebar);
    }
}

// Kelas Anak: Segitiga
class Segitiga extends BangunDatar {
    private $sisi1;
    private $sisi2;
    private $sisi3;
    private $s;

    public function __construct($nama, $sisi1, $sisi2, $sisi3) {
        parent::__construct($nama);
        
        if (!($sisi1 + $sisi2 > $sisi3 && $sisi1 + $sisi3 > $sisi2 && $sisi2 + $sisi3 > $sisi1)) {
            echo "sisi-sisi tersebut tidak membentuk Segitiga";
            return;
        } 

        $this->sisi1 = $sisi1;
        $this->sisi2 = $sisi2;
        $this->sisi3 = $sisi3;
        $this->s = $this->sisi1 + $this->sisi2 + $this->sisi3;
    }
    
    public function hitungLuas() {
        return 0.5 * sqrt($this->s * ($this->s - $this->sisi1) * ($this->s - $this->sisi2) * ($this->s - $this->sisi3));
    }
    
    public function hitungKeliling() {
        return $this->sisi1 + $this->sisi2 + $this->sisi3;
    }
}

// Kelas Anak: Lingkaran
class Lingkaran extends BangunDatar {
    private $jariJari;
    
    public function __construct($nama, $jariJari) {
        parent::__construct($nama);
        $this->jariJari = $jariJari;
    }
    
    public function hitungLuas() {
        return 3.14 * $this->jariJari * $this->jariJari;
    }
    
    public function hitungKeliling() {
        return 2 * 3.14 * $this->jariJari;
    }
    
    
}


if (isset($_POST["bangun_datar"])) {
    $nama = $_POST["bangun_datar"];
    $luas = $keliling = '';

    if($nama == "persegi") {
        $sisi = isset($_POST["sisi"]) ? (int)$_POST["sisi"] : 0;
        $persegi = new Persegi($nama, $sisi);
        $keliling = $persegi->hitungKeliling();
        $luas = $persegi->hitungLuas();
    }
    elseif($nama == "persegi_panjang") {
        $panjang = (int)$_POST["panjang"];
        $lebar = (int)$_POST["lebar"];
        $persegi_panjang = new PersegiPanjang($nama, $panjang, $lebar);
        $keliling = $persegi_panjang->hitungKeliling();
        $luas = $persegi_panjang->hitungLuas();
    }
    elseif($nama == "segitiga") {

        $sisi1 = (int)$_POST["sisi1"];
        $sisi2 = (int)$_POST["sisi2"];
        $sisi3 = (int)$_POST["sisi3"];
        $segitiga = new Segitiga($nama, $sisi1, $sisi2, $sisi3);
        $keliling = $segitiga->hitungKeliling();
        $luas = $segitiga->hitungLuas();
    }
    elseif($nama == "lingkaran") {
        $jarijari = (int)$_POST["jari_jari"];
        $lingkaran = new Lingkaran($nama, $jarijari);
        $keliling = $lingkaran->hitungKeliling();
        $luas = $lingkaran->hitungLuas();
    }
    
    echo "<p>{$nama}
    <br> Keliling: {$keliling}
    <br> Luas: {$luas}<br></p>";


} else {
    echo "Silakan isi nama dan sisi pada formulir.";
}

?>





