<?php
	require "../php/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Lowker</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/index.css" rel="stylesheet" />
        <link href="../css/login.css" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="../font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <style>
        html {
            background-color: #F4F4F4;
        }
        
        </style>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200" style="color: #59ABE3;">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                    </button>
                    <a href="index.php" class="navbar-brand" style="color: #C0C0C0;">
                        LOWKER
                    </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right navbar-uppercase">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false" style="color: #C0C0C0;">
                                <i class="fa fa-share-alt"></i> Calon Pekerja
                            </a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dLabel">
                                <li>
                                    <a href="login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="signup.php">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false" style="color: #C0C0C0;">
                                <i class="fa fa-share-alt"></i> Perusahaan
                            </a>
                            <ul class="dropdown-menu dropdown-info" aria-labelledby="dLabel">
                                <li>
                                    <a href="../perusahaan/login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="../perusahaan/signup.php">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="section section-header">
            <div class="parallax filter filter-color-black">
                <div class="container">
                    <div class="content">
                        <form class="form-signin" method="POST" action="php/calonpekerja_tambah_proses.php" enctype="multipart/form-data">
                            <!--<img src="img/logo.png" width="90px" style="margin-bottom: 20px;"/>-->
                            <h7 class="login-text">Daftar sebagai <b>Calon Pekerja</b>.</h7>
                            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required/>
                            <input class="form-control" type="text" name="email" placeholder="Email" required/>
                            <input class="form-control" type="text" name="username" placeholder="Username" required/>
                            <input class="form-control" type="password" name="password" placeholder="Password" required/>
                            <input class="form-control" type="password" name="konfirmasi_password" placeholder="Konfirmasi Password"required/>
                            <input class="form-control" type="hidden" name="alamat" value="" required/>
                            <input class="form-control" type="hidden" name="kota_id" value="1" required/>
                            <input class="form-control" type="hidden" name="jk" value="L" required/>
                            <input class="form-control" type="hidden" name="tanggal_lahir" value="" required/>
                            <input class="form-control" type="hidden" name="tempat_lahir" value="" required/>
                            <input class="form-control" type="hidden" name="status_pernikahan" value="Lajang" required/>
                            <input class="form-control" type="hidden" name="email" value="" required/>
                            <input class="form-control" type="hidden" name="telepon" value="" required/>
                            <input class="form-control" type="hidden" name="pendidikan_terakhir" value="SD" required/>
                            <input class="form-control" type="hidden" name="tempat_pendidikan_terakhir" value="" required/>
                            <input class="form-control" type="hidden" name="tempat_bekerja_terakhir" value="" required/>
                            <input class="form-control" type="hidden" name="pekerjaan_bekerja_terakhir" value="" required/>
                            <button class="btn btn-primary" type="submit" style="padding: 14px 20px; margin-top: 20px;">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/index.js"></script>
        <script type="text/javascript" src="../js/modernizr.js"></script>
    </body>

    </html>