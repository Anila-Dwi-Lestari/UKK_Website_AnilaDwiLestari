<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bs5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="icon/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="admin/images/logoNeubook.png"></link>
    <title>Neubook - Website Admin Neubook</title>
</head>

<body>

    <!--============================================================================ NAVBAR ==========================================================-->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="admin/images/logoNeubookHeader.png" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    <li class="nav-item me-2 ms-4">
                        <a href="admin/login.php" class="btn btn-custom p-3 rounded shadow width-1n8x">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--============================================================================1. header==========================================================-->
    <div class="container">

        <br><br><br>

        <div class="row my-5">

            <div class="col-lg-12 d-block d-lg-none">
                <img src="admin/images/vector-header.svg" width="100%">
            </div>

            <div class="col-lg-6">
                <div class="row align">
                    <h1 class="text-truncate bold-2 my-5">Selamat Datang!</h1>
                    <div class="desc mt-1">
                        <p>Neubook adalah sebuah website yang digunakan oleh admin untuk melakukan CRUD data buku. Anda dapat melakukan CRUD data buku dengan login terlebih dahulu.</p>
                    </div>
                    <div class="row my-4">
                        <div class="col-lg-5">
                            <a href="admin/login.php" class="btn btn-custom p-3 rounded shadow width-1n8x">LOGIN</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="admin/images/vector-header.svg" width="100%">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>