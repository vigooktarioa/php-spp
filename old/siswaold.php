<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Data Siswa</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Siswa</h3>
    <p><a href="tambah_siswa.php">Tambah Data</a></p>
    <table class="table table-striped table-dark">
        <tr>
            <td>No. </td>
            <td>NISN</td>
            <td>NIS</td>
            <td>Nama Siswa</td>
            <td>Kelas</td>
            <td>Alamat</td>
            <td>No. Telp</td>
            <td>Aksi</td>
        </tr>
        <?php
        // Kita Konfigurasi Pagging disini
        $totalDataHalaman = 5;
        $data = mysqli_query($db, "SELECT * FROM siswa");
        $hitung = mysqli_num_rows($data);
        $totalHalaman = ceil($hitung / $totalDataHalaman);
        $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
        $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
        // Konfigurasi Selesai
        // Kita panggil tabel siswa
        // Setelah kita panggil, JOIN tabel yang ter relasi ke tabel siswa
        $sql = mysqli_query($db, "SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas = kelas.id_kelas
ORDER BY nama LIMIT $dataAwal, $totalDataHalaman ");
        $no = 1;
        while ($r = mysqli_fetch_assoc($sql)) { ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $r['nisn']; ?></td>
                <td><?= $r['nis']; ?></td>
                <td><?= $r['nama']; ?></td>
                <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
                <td><?= $r['alamat']; ?></td>
                <td><?= $r['no_telp']; ?></td>
                <td><a href="?hapus&nisn=<?= $r['nisn']; ?>">Hapus</a> |
                    <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>">Edit</a< /td>
            </tr>
        <?php $no++;
        } ?>
    </table>
    <!-- Tampilkan tombol halaman -->
    <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
    <?php endfor; ?>
    <!-- Selesai -->
    <hr />
    <?php require_once("footer.php"); ?>
</body>

</html>
<?php
// Tombol Hapus ditekan
if (isset($_GET['hapus'])) {
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
    if ($hapus) {
        header("location: siswa.php");
    } else {
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>

