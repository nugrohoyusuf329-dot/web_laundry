<html>
<head>
    <title>Sistem Informasi Laundry</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body style="background: #c8dfdb">

    <br><br><br><br>

    <center>
        <h2><strong>SISTEM INFORMASI LAUNDRY</strong></h2>
    </center>

    <br><br><br><br>

    <div class="container">
        <div class="col-md-4 col-md-offset-4">

            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger'>
                            Login gagal! Username atau Password salah!
                          </div>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-info'>
                            Anda Berhasil Logout!
                          </div>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-danger'>
                            Anda Harus Login untuk mengakses Halaman Admin!
                          </div>";
                }
            }
            ?>

            <form action="login.php" method="post">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   placeholder="Masukkan Username"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan Password"
                                   required>
                        </div>

                        <br>

                        <input type="submit"
                               class="btn btn-primary"
                               value="Log in">

                    </div>
                </div>

            </form>

        </div>
    </div>

</body>
</html>