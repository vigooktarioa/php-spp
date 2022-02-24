<?php
require_once("require.php");
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HALAMAN UTAMA</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<!-- Logika kita, Jika Level Admin Maka Fitur apa saja yang dapat diakses -->
<?php
$panggil = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
if ($hasil['level'] == "Administrator") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hello Bulma!</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>

    <body>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a href="index.php" class="navbar-item">
                        Home
                    </a>


                    <a href="siswa.php" class="navbar-item">
                        Data Siswa
                    </a>

                    <a href="petugas.php" class="navbar-item">
                        Data Petugas
                    </a>

                    <a href="cetaklaporan.php" class="navbar-item">
                        Cetak Laporan
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a href="kelas.php" class="navbar-item">
                                Kelas
                            </a>
                            <a href="spp.php" class="navbar-item">
                                Data SPP
                            </a>
                            <a href="transaksi.php" class="navbar-item">
                                Transaksi
                            </a>
                            <a href="history.php" class="navbar-item">
                                History Pembayaran
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="logout.php" class="button is-danger">
                                <strong>Logout</strong>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </body>
 
    </html>
<?php } else if ($hasil['level'] == "Petugas"){ ?>

        <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hello Bulma!</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>

    <body>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a href="index.php" class="navbar-item">
                        Home
                    </a>


                    <a href="siswa.php" class="navbar-item">
                        Data Siswa
                    </a>

                    <a href="petugas.php" class="navbar-item">
                        Data Petugas
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a href="kelas.php" class="navbar-item">
                                Kelas
                            </a>
                            <a href="spp.php" class="navbar-item">
                                Data SPP
                            </a>
                            <a href="transaksi.php" class="navbar-item">
                                Transaksi
                            </a>
                            <a href="history.php" class="navbar-item">
                                History Pembayaran
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="logout.php" class="button is-danger">
                                <strong>Logout</strong>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </body>

    </html>

<?php
} else { ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hello Bulma!</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    </head>

    <body>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a href="transaksi.php" class="navbar-item">
                        Transaksi
                    </a>


                    <a href="history.php" class="navbar-item">
                        History
                    </a>

                    <a href="logout.php" class="navbar-item">
                        Logout
                    </a>

                    
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="logout.php" class="button is-danger">
                                <strong>Logout</strong>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </body>

    </html>
<?php } ?>
<hr />