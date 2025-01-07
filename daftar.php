<?php
require_once 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SMK Pesat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Pilihan Beasiswa</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <a class="nav-link" href="#">Hasil</a>
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
                  <label for="fullNameInput" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="fullNameInput" name="full_name" placeholder="Masukkan nama lengkap">
                </div>

                <div class="mb-3">
                  <label for="emailInput" class="form-label">Email</label>
                  <input type="email" class="form-control" id="emailInput" name="email" placeholder="Masukkan email">
                </div>

                <div class="mb-3">
                  <label for="phoneInput" class="form-label">Nomor Handphone</label>
                  <input type="text" class="form-control" id="phoneInput" name="phone_number" placeholder="Masukkan nomor handphone">
                </div>

                <div class="mb-3">
                  <label for="semesterSelect" class="form-label">Semester</label>
                  <select class="form-select" id="semesterSelect" name="semester">
                    <option selected>Pilih Semester</option>
                    <?php for($i=1; $i<=8; $i++) : ?>
                      <option value="<?= $i; ?>">Semester <?= $i; ?></option>
                    <?php endfor; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="ipkInput" class="form-label">IPK</label>
                  <input type="text" class="form-control" id="ipkInput" name="ipk" placeholder="Masukkan IPK">
                </div>

                <div class="mb-3">
                  <label for="documentInput" class="form-label">Dokumen Pendukung</label>
                  <input type="file" class="form-control" id="documentInput" name="supporting_document">
                </div>

                <div class="mb-3">
                  <label for="beasiswaInput" class="form-label">Pilihan Beasiswa</label>
                  <select class="form-select" id="beasiswaInput" name="pilihan_beasiswa">
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
                  <button type="submit" id="submitBtn" name="submit" class="btn btn-success">Kirim</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
