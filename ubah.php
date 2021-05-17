<?php
require_once "layouts/header.php";
require_once "layouts/sidebar.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <!-- Logic Tambah Data -->
                    <?php
                    require_once "logic/function.php";
                    $id = $_GET['id'];
                    $mhs = tampil("SELECT * FROM mahasiswa WHERE id=$id")[0];

                    if (isset($_POST["ubah"])) {
                        if (ubah($_POST) > 0) {
                            echo "<script>alert('Data Berhasil Diubah');document.location.href='index.php'</script>";
                        } else {
                            echo mysqli_error($conn);
                        }
                    }

                    ?>

                    <!--  -->
                    <a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-undo">
                            Back</i></a>
                    <br> <br>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?= $mhs['id']; ?>">
                        <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $mhs['gambar']; ?>">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $mhs['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="npm" class="form-label">Npm</label>
                            <input type="text" class="form-control" name="npm" id="npm" value="<?= $mhs['npm']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="<?= $mhs['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan"
                                value="<?= $mhs['jurusan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="form-label">Gambar</label>
                            <br>
                            <img src="template/img/<?= $mhs['gambar']; ?> ?>" width="50">
                            <br>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-1" name="ubah">Ubah</button>
                        <button type="reset" class="btn btn-secondary float-right">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "layouts/footer.php"; ?>