<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah data transaksi</title>

    <link href="css/style.css" rel="stylesheet">

<link href="style.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php require("header.php"); ?>
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
                <td>Petugas :</td>
                <td><select class="form-select ml-3 mb-3" name="petugas">
<?php
// Kita akan ambil Nama Petugas yang ada pada tabel Petugas
$petugas = mysqli_query($db, "SELECT * FROM petugas");
while($r = mysqli_fetch_assoc($petugas)){ ?>
                        <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Nama siswa :</td>
                <td><select class="form-select ml-3 mb-3" name="siswa">
<?php
// Sekarang kita ambil NISN Siswa 
$siswa = mysqli_query($db, "SELECT * FROM siswa");
while($r = mysqli_fetch_assoc($siswa)){ ?>
                        <option value="<?= $r['nisn']; ?>"><?= $r['nama']; ?></option>
<?php } ?>          </select></td>
            </tr>   
            <tr>
                <td>Tgl. / Bulan / Tahun bayar :</td>
                <td><input class="form-control ml-3 mb-3" type="text" name="tgl" size="5" placeholder="Tanggal.">
                    <input class="form-control ml-3 mb-3" type="text" name="bulan" size="10" placeholder="Bulan.">
                    <input class="form-control ml-3 mb-3" type="text" name="tahun" size="5" placeholder="Tahun."></td>
            </tr>
            <tr>
                <td>SPP / Nominal yang harus dibayar</td>
                <td><select class="form-select ml-3 mb-3" name="spp">
<?php
// Ambil juga data SPP
$spp = mysqli_query($db, "SELECT * FROM spp");
while($r = mysqli_fetch_assoc($spp)){ ?>
                        <option value="<?= $r['id_spp']; ?>">
                        <?= $r['tahun'] . " | " . $r['nominal']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Jumlah bayar</td>
                <td><input class="form-control ml-3 mb-3" type="text" name="jumlah" placeholder="1000000"></tdd>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-success" type="submit" name="simpan">Simpan</button></td>
            </tr>
        </table>
        </div>
                </div>
            </div>
    </div>
<hr />
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Kita simpan proses simpan datanya disini
if(isset($_POST['simpan'])){
    $petugas = $_POST['petugas'];
    $nama = $_POST['siswa'];
    $tgl = $_POST['tgl']; $bulan = $_POST['bulan']; $tahun = $_POST['tahun'];
    $spp = $_POST['spp'];
    $cek = mysqli_query($db, "SELECT * FROM transaksi WHERE nama='$nama'");
    $ambil = mysqli_fetch_assoc($cek);
    $jumlah = $_POST['jumlah'];
    if($spp == $ambil['id_spp']){
        echo "<script>alert('Tahun spp tersebut sudah ada pada siswa');</script>";
    }else{
    $s = mysqli_query($db,"INSERT INTO pembayaran VALUES
                (NULL, '$petugas', '$nama', '$tgl', '$bulan', '$tahun', '$spp', '$jumlah')");
    // Arahkan ke menu transaksi
    if($s){
    header("location: transaksi.php"); 
    }else{
        echo "<script>alert('gagal');</script>";
    }}}
?>