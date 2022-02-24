<html>

<head>
    <title>Home | Pembayaran SPP</title>

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
    <!-- Kita akan panggil menu navigasi -->
    <?php require_once("header.php"); ?>
    <!-- <h3>Selamat datang, <?= $username; ?></h3>
    <br />
    Silahkan dikelola dengan baik yaa :)
    <hr /> -->

    <section class="hero">
        <div class="mb-6 mt-6">
        <div class="hero-body has-text-centered">
            <p class="title">
                Selamat datang, <?= $username; ?>
            </p>
            <p class="subtitle">
                Aplikasi Pembayaran SPP
            </p>
        </div>
        </div>
    </section>

    <div class="mt-5">
    <?php require_once("footer.php"); ?>
    </div>
</body>

</html>