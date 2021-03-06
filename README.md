# Hi devs, Ini merupakan program assesment
Program assesment ini berlaku untuk penilaian siswa, sampai karakter, dan bahkan akan lebih banyak lagi program-program yang bisa kita bangun dari sini.

### 24 Jan 2021 : Data Rombel Kelas Done
```.sql
SELECT tbl_rombelkelas.kode_rombel, tbl_guru.nama_guru 'wali_kelas', tbl_jenjang.jenjang, 
tbl_datasiswa.id_siswa, tbl_datasiswa.nis, tbl_datasiswa.nama_siswa, tbl_detailrombel.tipe_anggota, 
tbl_detailrombel.kode_jurusan, tbl_kelas.kode_kelas, tbl_kelas.kelas, tbl_angkatan.angkatan, 
tbl_tahunajaran.tahunajaran FROM tbl_detailrombel JOIN tbl_rombelkelas 
ON tbl_rombelkelas.kode_rombel=tbl_detailrombel.kode_rombel JOIN tbl_datasiswa ON 
tbl_datasiswa.id_siswa=tbl_detailrombel.id_siswa JOIN tbl_angkatan ON 
tbl_angkatan.kode_angkatan=tbl_rombelkelas.kode_angkatan JOIN tbl_tahunajaran ON 
tbl_tahunajaran.kode_tahunajaran=tbl_rombelkelas.kode_tahunajaran JOIN tbl_guru ON 
tbl_guru.id_guru=tbl_rombelkelas.id_guru JOIN tbl_jenjang ON 
tbl_jenjang.kode_jenjang=tbl_rombelkelas.kode_jenjang JOIN tbl_kelas ON 
tbl_kelas.kode_kelas=tbl_rombelkelas.kode_kelas WHERE tbl_rombelkelas.kode_rombel = '1819-A1'
```

<img src="https://github.com/eljitech/assesment/blob/master/picture/github/1.PNG"/>

### 25 Jan 2021 : Reaserch Data untuk Menampilkan Data yang sesuai untuk Report List Penilaian
##### Mendapatkan Total Data Penilaian pada Table detail Penilaian (Sementara)
```.sql
SELECT COUNT(*) 'total_data'
FROM tbl_detailpenilaian
JOIN tbl_detailkarakter ON tbl_detailkarakter.kode_detailkarakter=tbl_detailpenilaian.kode_detailkarakter
JOIN tbl_karakter ON tbl_karakter.kode_karakter=tbl_detailkarakter.kode_karakter
```

<img src="https://github.com/eljitech/assesment/blob/master/picture/github/Screenshot%20from%202021-01-25%2007-22-58.png"/>

##### Menampilkan Data Penilaian (Masih Global)
```.sql
SELECT tbl_detailpenilaian.kode_penilaian, tbl_detailkarakter.kode_karakter, tbl_karakter.karakter, 
tbl_karakter.kategory, tbl_detailkarakter.indikator, tbl_detailpenilaian.nilai, tbl_detailpenilaian.pic
FROM tbl_detailpenilaian
JOIN tbl_detailkarakter ON tbl_detailkarakter.kode_detailkarakter=tbl_detailpenilaian.kode_detailkarakter
JOIN tbl_karakter ON tbl_karakter.kode_karakter=tbl_detailkarakter.kode_karakter
```

<img src="https://github.com/eljitech/assesment/blob/master/picture/github/Screenshot%20from%202021-01-25%2007-24-07.png"/>

##### Menampilkan Informasi Data Siswa
```.sql
SELECT tbl_detailpenilaian.kode_penilaian, tbl_datasiswa.nis, tbl_datasiswa.nama_siswa, 
tbl_detailkarakter.kode_karakter, tbl_karakter.karakter, tbl_karakter.kategory, 
tbl_detailkarakter.kode_detailkarakter, tbl_detailkarakter.indikator, tbl_detailpenilaian.nilai, 
tbl_detailpenilaian.pic
FROM tbl_detailpenilaian
JOIN tbl_detailkarakter ON tbl_detailkarakter.kode_detailkarakter=tbl_detailpenilaian.kode_detailkarakter
JOIN tbl_karakter ON tbl_karakter.kode_karakter=tbl_detailkarakter.kode_karakter
JOIN tbl_datasiswa ON tbl_datasiswa.id_siswa=tbl_detailpenilaian.id_siswa
```

<img src="https://github.com/eljitech/assesment/blob/master/picture/github/Screenshot%20from%202021-01-25%2007-30-49.png"/>

##### Menampilkan List data Dari Penilaian Karakter terhadap Siswa berdasarkan Kode Penilaian dan ID_siswa
```.sql
SELECT tbl_detailpenilaian.kode_penilaian, tbl_datasiswa.nis, tbl_datasiswa.nama_siswa, 
tbl_detailkarakter.kode_karakter, tbl_karakter.karakter, tbl_karakter.kategory, 
tbl_detailkarakter.kode_detailkarakter, tbl_detailkarakter.indikator, tbl_detailpenilaian.nilai, 
tbl_detailpenilaian.pic
FROM tbl_detailpenilaian
JOIN tbl_detailkarakter ON tbl_detailkarakter.kode_detailkarakter=tbl_detailpenilaian.kode_detailkarakter
JOIN tbl_karakter ON tbl_karakter.kode_karakter=tbl_detailkarakter.kode_karakter
JOIN tbl_datasiswa ON tbl_datasiswa.id_siswa=tbl_detailpenilaian.id_siswa
WHERE tbl_detailpenilaian.kode_penilaian = '22012021-DIMASQI' AND tbl_datasiswa.id_siswa = '2'
```

<img src="https://github.com/eljitech/assesment/blob/master/picture/github/Screenshot%20from%202021-01-25%2016-10-24.png"/>

Notes:
* `pic` yang ada di `tbl_detailpenilaian` dipindah ke `tbl_detailkarakter` agar ketika user yang login dia teridentifikasi sebagai apa bisa dimunculkan list penilaian siswa yang tersedia untuk dia.

* Tambahkan data penilaian terhadap siswa baru untuk mencompare informasi
```.sql
INSERT INTO tbl_detailpenilaian
(id_detailpenilaian, kode_penilaian, id_siswa, kode_detailkarakter, nilai, pic)
VALUES 
('val_kar_disiplin25', '22012021-DIMASQI', 2, 'disiplin_1', 1, ''),
('val_kar_disiplin26', '22012021-DIMASQI', 2, 'disiplin_2', 1, ''),
('val_kar_disiplin27', '22012021-DIMASQI', 2, 'disiplin_3', 1, ''),
('val_kar_disiplin28', '22012021-DIMASQI', 2, 'disiplin_4', 1, '');
```