<?php
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit data Siswa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <?php
    while ($row = mysqli_fetch_assoc($siswa)) { ?>
        <div class="container-fluid">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Edit Data Siswa</h1>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, officia.</a>.</p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Editing From Siswa</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table cellpadding="5">
                                <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
                                <tr>
                                    <td>Nama :</td>
                                    <td><input class="form-control mb-2 ml-5" type="text" name="nama" value="<?= $row['nama']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Kelas :</td>
                                    <td><select class="form-select mb-2 ml-5" name="kelas">
                                            <?php
                                            $kelas = mysqli_query($db, "SELECT * FROM kelas");
                                            while ($r = mysqli_fetch_assoc($kelas)) { ?>
                                                <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                                                                                            . $r['kompetensi_keahlian']; ?></option>
                                            <?php } ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Alamat :</td>
                                    <td><input class="form-control mb-2 ml-5" type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>No. Telp :</td>
                                    <td><input class="form-control mb-5 ml-5" type="tel" name="no" value="<?= $row['no_telp']; ?>"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button class="btn btn-success" type="submit" name="simpan">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    <hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>

</html>
<?php
// Proses update
if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $update = mysqli_query($db, "UPDATE siswa SET nama='$nama',
                                 id_kelas='$kelas', alamat='$alamat', no_telp='$no' 
                                 WHERE siswa.nisn='$nisn'");
    if ($update) {
        ?>
        <script>
            document.location.href="siswa.php";
        </script>
        <?php
    } else {
        echo "<script>alert('Gagal'); </script>";
    }
}
?>