<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>History | Pembayaran SPP</title>
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
    <?php require_once("header.php"); ?>
    <!-- Konten -->
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">History</h1>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, officia.</a>.</p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">History</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" autocomplete="off">
                        Cari Siswa <input class="form-control mt-3" type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
                        <button class="btn btn-success mt-5" type="submit" name="cari">Cari</button>
                    </form>


                    <?php
                    // Kita lakukan proses pencariannya disini
                    if (isset($_POST['cari'])) {
                        $nisn = $_POST['nisn'];
                        // Kita panggil table siswa
                        $biodataSiswa = mysqli_query($db, "SELECT * FROM siswa 
                        JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                        WHERE nisn='$nisn'");
                        // Table pembayaran wajib kita panggil
                        $historyPembayaran = mysqli_query($db, "SELECT * FROM pembayaran
                         JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                         JOIN spp ON pembayaran.id_spp=spp.id_spp
                         WHERE nisn='$nisn'
                         ORDER BY tgl_bayar");
                        $r_siswa = mysqli_fetch_assoc($biodataSiswa);
                    ?>
                        <hr />
                        <!-- Kita tampilkan Biodata Siswa -->
                        <div class="card-body">
                        <h3>Biodata <?= $r_siswa['nama']; ?></h3>
                        <table class="table table" cellpadding="5">
                            <tr>
                                <td>NISN</td>
                                <td>:</td>
                                <td><?= $r_siswa['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td><?= $r_siswa['nis']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $r_siswa['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?= $r_siswa['nama_kelas'] . " | " . $r_siswa['kompetensi_keahlian']; ?></td>
                            </tr>
                        </table>
                        </div>
                        <!-- Sekarang kita tampilkan history pembayarannya -->
                        <table class="table table-bordered dataTable" cellpadding="5" cellspacing="0" border="1">
                            <thead>
                                <td>No. </td>
                                <td>Tanggal Pembayaran</td>
                                <td>Pembayaran Melalui</td>
                                <td>Tahun SPP | Nominal yang harus dibayar</td>
                                <td>Jumlah yang sudah dibayar</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </thead>
                            <?php
                            $no = 1;
                            while ($r_trx = mysqli_fetch_assoc($historyPembayaran)) { ?>
                                <tbody>
                                    <td><?= $no; ?></td>
                                    <td><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_dibayar'] . " " .
                                            $r_trx['tahun_dibayar']; ?></td>
                                    <td><?= $r_trx['nama_petugas']; ?></td>
                                    <td><?= $r_trx['tahun'] . " | Rp. " . $r_trx['nominal']; ?></td>
                                    <td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>
                                    <?php
                                    if ($r_trx['jumlah_bayar'] == $r_trx['nominal']) { ?>
                                        <td>
                                            <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
                                        </td>
                                        <td>-</td>
                                    <?php } else { ?> <td>BELUM LUNAS</td>
                                        <td><a href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
                                                BAYAR LUNAS</a></td>
                                    <?php } ?>
                                </tbody>
                            <?php $no++;
                            } ?>
                        </table>
                    <?php } ?>
                    <hr />
                </div>
            </div>
        </div>
    </div>

    <?php require_once("footer.php"); ?>
</body>

</html>