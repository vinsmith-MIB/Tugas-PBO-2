
<!DOCTYPE html>
<html>
<head>
    <title>Bangun Datar</title>
</head>
<body>
    <h1>Hitung Luas dan Keliling Bangun Datar</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="bangun_datar">Pilih Bangun Datar:</label>
        <select name="bangun_datar" id="bangun_datar">
            <option value="" disabled selected>Pilih</option>
            <option value="persegi">Persegi</option>
            <option value="persegi_panjang">Persegi Panjang</option>
            <option value="segitiga">Segitiga</option>
            <option value="lingkaran">Lingkaran</option>
        </select>
        <br>

        <!-- Input panjang sisi untuk Persegi -->
        <div id="panjang_sisi" style="display: none;">
            <label for="sisi">Panjang Sisi:</label>
            <input type="text" name="sisi" id="sisi">
        </div>

        <!-- Input panjang dan lebar untuk Persegi Panjang -->
        <div id="panjang_lebar" style="display: none;">
            <label for="panjang">Panjang:</label>
            <input type="text" name="panjang" id="panjang">
            <br>
            <label for="lebar">Lebar:</label>
            <input type="text" name="lebar" id="lebar">
        </div>

        <!-- Input alas, tinggi, dan sisi-sisi untuk Segitiga -->
        <div id="alas_tinggi_sisi" style="display: none;">
            <label for="alas">Alas:</label>
            <label for="sisi1">Sisi 1:</label>
            <input type="text" name="sisi1" id="sisi1">
            <br>
            <label for="sisi2">Sisi 2:</label>
            <input type="text" name="sisi2" id="sisi2">
            <br>
            <label for="sisi3">Sisi 3:</label>
            <input type="text" name="sisi3" id="sisi3">
        </div>

        <!-- Input jari-jari untuk Lingkaran -->
        <div id="jari_jari" style="display: none;">
            <label for="jari_jari">Jari-Jari:</label>
            <input type="text" name="jari_jari" id="jari_jari">
        </div>

        <br>
        <input type="submit" value="Hitung">
    </form>

    <div>
        <?php include 'BangunDatarInherit.php' ?>
    </div>

    <script>
        // Menampilkan elemen input yang sesuai dengan pilihan pengguna
        document.getElementById('bangun_datar').addEventListener('change', function() {
            var selectedOption = this.value;

            // Sembunyikan semua elemen input terlebih dahulu
            document.getElementById('panjang_sisi').style.display = 'none';
            document.getElementById('panjang_lebar').style.display = 'none';
            document.getElementById('alas_tinggi_sisi').style.display = 'none';
            document.getElementById('jari_jari').style.display = 'none';

            // Tampilkan elemen input yang sesuai dengan pilihan
            if (selectedOption === 'persegi') {
                document.getElementById('panjang_sisi').style.display = 'block';
            } else if (selectedOption === 'persegi_panjang') {
                document.getElementById('panjang_lebar').style.display = 'block';
            } else if (selectedOption === 'segitiga') {
                document.getElementById('alas_tinggi_sisi').style.display = 'block';
            } else if (selectedOption === 'lingkaran') {
                document.getElementById('jari_jari').style.display = 'block';
            }
        });
    </script>

</body>
</html>

