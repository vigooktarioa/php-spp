<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if (!isset($_SESSION['nisn'])) {
    header("location: login_siswa.php");
} else {
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn'
ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
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
    <?php require_once("header_siswa.php"); ?>
    
    <div class="container-fluid mt-5">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Halo, <?= $result['nama']; ?></h1>
            <p class="mb-4">Berikut adalah biodata dan history pembayaran kamu.</a>.</p>
            <div class="card shadow mb-4">
                <div class="card-header" id="biodata">
                    <h6 class=" font-weight-bold text-primary">Biodata</h6>
                </div>
                <div class="card-body p-0">
                    <!-- <h2>>> Hallo, <?= $result['nama']; ?></h2>
                    <h3>Biodata Kamu</h3> -->
                    
                    <table class="table table mt-4" cellpadding="5" id="biodata">
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><?= $result['nisn']; ?></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><?= $result['nis']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $result['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $result['alamat']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="container-fluid" id="history">
            
            <div class="card shadow mb-5">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">History Pembayaran</h6>
                </div>
                
                    <table class="table table-bordered mt-4"  cellpadding="5" cellspacing="0" border="1">
                        <thead>
                            <td>No. </td>
                            <td>Dibayarkan kepada</td>
                            <td>Tgl. Pembayaran</td>
                            <td>Tahun | Nominal yang harus dibayar</td>
                            <td>Jumlah yang dibayarkan</td>
                            <td>Status</td>
                        </thead>
                        <?php
                        $no = 1;
                        while ($r = mysqli_fetch_assoc($pembayaran)) { ?>
                            <tbody>
                                <td><?= $no; ?></td>
                                <td><?= $r['nama_petugas']; ?></td>
                                <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
                                <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
                                <td><?= $r['jumlah_bayar']; ?></td>
                                <td>
                                    <?php
                                    // Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
                                    if ($r['jumlah_bayar'] == $r['nominal']) { ?>
                                        <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
                                    <?php } else { ?> BELUM LUNAS <?php } ?>
                                </td>
                            </tbody>
                        <?php $no++;
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once("footer.php"); ?>
</body>

</html>