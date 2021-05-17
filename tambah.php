<?php
require_once "layouts/header.php";
require_once "layouts/sidebar.php";
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">

                    <!-- Logic Tambah Data -->
                    <?php
                    require_once "logic/function.php";
                    if (isset($_POST["tambah"])) {
                        if (tambah($_POST) > 0) {
                            echo "<script>alert('Data Berhasil Ditambahkan');document.location.href='index.php'</script>";
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
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="npm" class="form-label">Npm</label>
                            <input type="text" class="form-control" name="npm" id="npm">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan">
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary float-right ml-1" name="tambah">Tambah</button>
                        <button type="reset" class="btn btn-secondary float-right">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once "layouts/footer.php"; ?>