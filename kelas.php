<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelas | Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="1startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="1startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once("header.php"); ?>
    <div class="container-fluid">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Data Kelas</h1>
            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, officia.</a>.</p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables From Kelas</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="dataTable_filter" class="dataTables_filter"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    &nbsp<p><a class="btn btn-success" href="tambah_kelas.php">Tambah Data</a></p>
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">Nama Kelas</th>
                                                <th rowspan="1" colspan="1">Kompetensi Keahlian</th>
                                                <th rowspan="1" colspan="1">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            // Kita Konfigurasi Pagging disini
                                            $totalDataHalaman = 5;
                                            $data = mysqli_query($db, "SELECT * FROM kelas");
                                            $hitung = mysqli_num_rows($data);
                                            $totalHalaman = ceil($hitung / $totalDataHalaman);
                                            $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
                                            $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
                                            // Konfigurasi Selesai
                                            // Kita panggil tabel kelas
                                            $sql = mysqli_query($db, "SELECT * FROM kelas ORDER BY nama_kelas LIMIT $dataAwal, $totalDataHalaman");
                                            $no = 1;
                                            while ($r = mysqli_fetch_assoc($sql)) { ?>

                                                <tr class="odd">
                                                    <td><?= $no ?></td>
                                                    <td><?= $r['nama_kelas']; ?></td>
                                                    <td><?= $r['kompetensi_keahlian']; ?></td>
                                                    <td><a class="btn btn-danger" href="?hapus&id=<?= $r['id_kelas']; ?>">Hapus</a> |
                                                        <a class="btn btn-warning" href="edit_kelas.php?id=<?= $r['id_kelas']; ?>">Edit</a>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
                         
                                                <li class="paginate_button page-item "><a href="?hal=<?= $i; ?>" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link"><?= $i; ?></a></li>
                                            <?php endfor; ?>
                                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once("footer.php"); ?>

</html>
<?php
// Tombol Hapus ditekan
if (isset($_GET['hapus'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id'");
    if ($hapus) {
        header("location: kelas.php");
    } else {
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>