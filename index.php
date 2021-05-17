<?php
require_once "layouts/header.php";
require_once "layouts/sidebar.php";
require_once "logic/function.php";
$mahasiswa = tampil("SELECT * FROM mahasiswa");


?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <a href="tambah.php" class="btn btn-primary my-3">
                        <i class="fas fa-plus"> Tambah Data</i>
                    </a>
                    <table class="table table-bordered table-hover table-striped text-center table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 1%;">No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Npm</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="template/img/<?= $mhs['gambar']; ?>" width="50"></td>
                                <td><?= $mhs['nama']; ?></td>
                                <td><?= $mhs['npm']; ?></td>
                                <td><?= $mhs['email']; ?></td>
                                <td><?= $mhs['jurusan']; ?></td>
                                <td>
                                    <a href="hapus.php" onclick="return confirm('Yakin?');"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "layouts/footer.php"; ?>