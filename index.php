<?php
require_once "layouts/header.php";
require_once "layouts/sidebar.php";
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
                    <a href="" class="btn btn-primary my-3">
                        <i class="fas fa-plus"> Tambah Data</i>
                    </a>
                    <table class="table table-bordered table-hover table-striped text-center">
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
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $no; ?></td>
                                <td><?= $no; ?></td>
                                <td><?= $no; ?></td>
                                <td><?= $no; ?></td>
                                <td><?= $no; ?></td>
                                <td>
                                    <a href="hapus.php" onclick="return confirm('Yakin?');" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "layouts/footer.php"; ?>