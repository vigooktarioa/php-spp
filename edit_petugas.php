<?php
require_once("require.php");
$id = $_GET['id'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Edit data Petugas</title>

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
    while ($row = mysqli_fetch_assoc($petugas)) { ?>
        <div class="container-fluid">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Edit Data Petugas</h1>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, officia.</a>.</p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Editing From Siswa</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <table cellpadding="5">
                                <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>">
                                <tr>
                                    <td>Username :</td>
                                    <td><input class="form-control mb-3 ml-5" type="text" name="user" value="<?= $row['username']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Password :</td>
                                    <td><input class="form-control mb-3 ml-5" type="text" name="pass" value="<?= $row['password']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Nama Petugas :</td>
                                    <td><input class="form-control mb-3 ml-5" type="text" name="nama" value="<?= $row['nama_petugas']; ?>"></td>
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
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $update = mysqli_query($db, "UPDATE petugas SET username='$user',
                                 password='$pass', nama_petugas='$nama'
                                 WHERE petugas.id_petugas='$id'");
    if ($update) {
        ?>
        <script>
        document.location.href="petugas.php"
        </script>
        <?php
    } else {
        echo "<script>alert('Gagal'); </script>";
    }
}
?>