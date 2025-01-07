<?php
require_once 'koneksi.php';

// Query untuk mengambil data dari tabel
$querySelect = "SELECT * FROM tbl_daftar";
$result = $connect->query($querySelect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
                <h2 class="text-center mt-3">Hasil Pendaftaran</h2>
                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Semester</th>
                            <th>IPK</th>
                            <th>ID Beasiswa</th>
                            <th>Status Pengajuan</th>
                            <th>Dokumen Pendukung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php $no = 1; ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($row['nama']); ?></td>
                                    <td><?= htmlspecialchars($row['email']); ?></td>
                                    <td><?= htmlspecialchars($row['hp']); ?></td>
                                    <td><?= htmlspecialchars($row['semester']); ?></td>
                                    <td><?= htmlspecialchars($row['ipk']); ?></td>
                                    <td><?= htmlspecialchars($row['id']); ?></td>
                                    <td><?= htmlspecialchars($row['status_pengajuan']); ?></td>
                                    <td>
                                        <!-- ? -->
                                         <img style="width: 100px;" src="image/<?=$row['filename']?>">
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">Belum ada data pendaftaran.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
