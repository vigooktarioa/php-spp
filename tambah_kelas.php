<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>

    <link href="css/style.css" rel="stylesheet">

<link href="style.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <div class="container-fluid">
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Kelas</h1>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, officia.</a>.</p>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Data from Kelas</h6>
                    </div>
                    <div class="card-body">
    <form action="" method="POST">
        <table cellpadding="5">
            <tr>
                <td>Nama Kelas :</td>
                <td><input class="form-control mb-3 ml-4" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian :</td>
                <td><input class="form-control mb-3 ml-4" type="text" name="kk"></td>
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
<hr />
            <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $simpan = mysqli_query($db, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk')");
        if($simpan){
            header("location: kelas.php");
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>