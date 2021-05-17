<?php
require_once "layouts/header.php";
require_once "layouts/sidebar.php";
require_once "logic/function.php";
$mahasiswa = tampil("SELECT * FROM mahasiswa");
if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
}

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
                    <div class="row mb-2">
                        <div class="col-md-8">
                            <a href="tambah.php" class="btn btn-primary">
                                <i class="fas fa-plus"> Tambah Data</i>
                            </a>
                        </div>
                        <div class="col-md">
                            <form action="" method="POST" style="display: inline-block;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                                            name="cari">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                    <a href="hapus.php?id=<?= $mhs['id']; ?>" onclick="return confirm('Yakin?');"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <a href="ubah.php?id=<?= $mhs['id']; ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
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