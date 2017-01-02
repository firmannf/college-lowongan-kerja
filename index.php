<?php
	require "php/connection.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Lowker</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/index.css" rel="stylesheet" />
        <!--     Fonts and icons     -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href="font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                    <a href="index.php" class="navbar-brand">
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
                                    <a href="calonpekerja/login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="calonpekerja/signup.php">Sign Up</a>
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
                                    <a href="perusahaan/login.php">Sign In</a>
                                </li>
                                <li>
                                    <a href="perusahaan/signup.php">Sign Up</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="section section-header">
            <div class="parallax filter filter-color-blue">
                <div class="container">
                    <div class="content">
                        <form method="POST" action="#">
                            <div class="title-area">
                                <p>Cari Lowongan Pekerjaan yang Kamu Inginkan</p><br/>
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-lg" name="lowongan" placeholder="Lowongan Pekerjaan" />
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control input-lg" name="kota_id" style="height: 55px;">
                                        <?php
                                            $strQuery = "SELECT kota_id, kota_nama FROM kota";
                                            $query = mysqli_query($connection, $strQuery);
                                                echo "<option>Nama Kota</option>";
                                            while($result = mysqli_fetch_assoc($query)){
                                                echo "<option value=$result[kota_id]>$result[kota_nama]</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="Submit" class="btn btn-white btn-fill btn-lg" style="height: 55px;">
                                    Cari Lowongan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="js/modernizr.js"></script>
    </body>

    </html>