<?php
require_once 'koneksi.php';

// Query untuk mendapatkan data beasiswa akademik dan non-akademik
$query = "SELECT jenis_beasiswa, keterangan FROM tbl_beasiswa";
$result = mysqli_query($connect, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jenis Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SMK Pesat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="navbar-nav">
            <a class="nav-link active" href="index.php">Pilihan Beasiswa</a>
            <a class="nav-link" href="daftar.php">Daftar</a>
            <a class="nav-link" href="#">Hasil</a>
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="card shadow border-0">
            <div class="card-header bg-success text-white">
              <h5 class="mb-0">Jenis Beasiswa</h5>
            </div>
            <div class="card-body">
              <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                  <div class="col-md-6 col-lg-4">
                  <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                      <!-- Ikon Beasiswa -->
                      <div class="text-center mb-3">
                        <img src="https://img.icons8.com/?size=100&id=79387&format=png&color=31AF36" alt="Beasiswa Icon" width="50" height="50">
                      </div>

                      <!-- Jenis Beasiswa -->
                      <h5 class="card-title fw-bold text-black text-center">
                        <?php echo htmlspecialchars($row['jenis_beasiswa']); ?>
                      </h5>

                      <!-- Keterangan -->
                      <p class="card-text text-muted text-center">
                        <?php echo htmlspecialchars($row['keterangan']); ?>
                      </p>
                    </div>
                    <div class="card-footer bg-light text-end">
                      <a href="#" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
