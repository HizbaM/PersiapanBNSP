<?php
require_once 'koneksi.php';

if (isset($_POST['kirim'])) {
  $nama = $_POST['nama_lengkap'];
  $email = $_POST['email'];
  $hp = $_POST['nomor_hp'];
  $semester = $_POST['semester'];
  $ipk = $_POST['ipk'];
  $id_beasiswa = $_POST['pilihan_beasiswa'];

  $nama_file = $_FILES["dokumen_pendukung"]["name"];
  $file_sementara = $_FILES["dokumen_pendukung"]["tmp_name"];
  $status = "Belum Terverifikasi";
  $folder = "./image/" . $nama_file;

  $queryInsert = "INSERT INTO tbl_daftar (nama, email, hp, semester, ipk, id, status_pengajuan, filename)
  VALUES ('$nama', '$email', '$hp', '$semester', '$ipk', '$id_beasiswa', '$status', '$nama_file')";
  
 // Memindahkan file dari lokasi sementara ke folder tujuan
if (move_uploaded_file($file_sementara, $folder)) {
  $queryInsert = "INSERT INTO tbl_daftar (nama, email, hp, semester, ipk, id, status_pengajuan, filename)
  VALUES ('$nama', '$email', '$hp', '$semester', '$ipk', '$id_beasiswa', '$status', '$nama_file')";
  
  if ($connect->query($queryInsert)) {
    echo "<script>
          alert('Sukses');
          window.location.href = 'hasil.php';
          </script>";
} else {
    echo "<script>
          alert('Gagal menyimpan data: " . $connect->error . "');
          window.history.back();
          </script>";
}

}
}
?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Beasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SMK Pesat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavigasi" aria-controls="navbarNavigasi" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavigasi">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Pilihan Beasiswa</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <a class="nav-link" href="hasil.php">Hasil</a>
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              Formulir Pendaftaran
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                  <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap">
                </div>

                <div class="mb-3">
                  <label for="emailPengguna" class="form-label">Email</label>
                  <input type="email" class="form-control" id="emailPengguna" name="email" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                  <label for="nomorHpPengguna" class="form-label">Nomor Handphone</label>
                  <input type="number" class="form-control" id="nomorHpPengguna" name="nomor_hp" placeholder="Masukkan nomor handphone">
                </div>

                <div class="mb-3">
                  <label for="semesterPengguna" class="form-label">Semester</label>
                  <select class="form-select" id="semesterPengguna" name="semester">
                    <option selected>Pilih Semester</option>
                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                      <option value="<?= $i; ?>">Semester <?= $i; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="ipkPengguna" class="form-label">IPK</label>
                  <input type="text" readonly class="form-control" id="ipkPengguna" name="ipk" placeholder="IPK otomatis diisi">
                  <small id="peringatan" class="text-danger"></small>
                  <small id="validasi" class="text-success"></small>
                </div>

                <div class="mb-3">
                  <label for="dokumenPengguna" class="form-label">Dokumen Pendukung</label>
                  <input type="file" class="form-control" id="dokumenPengguna" name="dokumen_pendukung">
                </div>

                <div class="mb-3">
                  <label for="beasiswaPengguna" class="form-label">Pilihan Beasiswa</label>
                  <select class="form-select" id="beasiswaPengguna" name="pilihan_beasiswa">
                    <option selected>-- Pilih Beasiswa --</option>
                    <?php
                    $query = "SELECT * FROM tbl_beasiswa";
                    $result = mysqli_query($connect, $query);

                    while ($rslt = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $rslt['id'] . '">' . $rslt['jenis_beasiswa'] . '</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="d-grid">
                  <button type="submit" id="tombolKirim" name="kirim" class="btn btn-success">Kirim</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>  
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
      const ipkPengguna = ipkAcak();
      const kolomIpk = document.getElementById("ipkPengguna");
      kolomIpk.value = ipkPengguna.toFixed(2);

      const pilihanBeasiswa = document.getElementById("beasiswaPengguna");
      const dokumenPendukung = document.getElementById("dokumenPengguna");
      const tombolKirim = document.getElementById("tombolKirim");

      if (ipkPengguna < 3.00) {
        pilihanBeasiswa.disabled = true;
        dokumenPendukung.disabled = true;
        tombolKirim.disabled = true;

        var warna = document.getElementById("peringatan");
        warna.style.color = "red";
        var pesanPeringatan = "Maaf, IPK Anda tidak memenuhi syarat.";
        document.getElementById("peringatan").innerHTML = pesanPeringatan;
      } else {
        var warnaValidasi = document.getElementById("validasi");
        warnaValidasi.style.color = "green";
        var pesanValidasi = "Hore, IPK Anda memenuhi syarat.";
        document.getElementById("validasi").innerHTML = pesanValidasi;
      }
    });

    function ipkAcak() {
      return Math.random() * 2 + 2;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
