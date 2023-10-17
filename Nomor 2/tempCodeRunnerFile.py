
    if tipe_pegawai == "tetap":
        gaji_pokok = float(input("Gaji pokok: "))
        return PegawaiTetap(nama, id_pegawai, gaji_pokok)
    elif tipe_pegawai == "harian":
        tarif_per_jam = float(input("Tarif per jam: "))
        jam_kerja = float(input("Jam