<?php
    require "../php/connection.php";
    session_start();
    if(!isset($_SESSION['login_role'])){
            echo "<script language=javascript>document.location.href='login.php'</script>";
    }

    if(isset($_SESSION['login_role'])){
        if($_SESSION['login_role'] != 'Calon Pekerja')
            echo "<script language=javascript>document.location.href='login.php'</script>";
    }
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Lowker</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/themify-icons.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:300,400,600,800' rel='stylesheet' type='text/css'>
        <link href="../css/index.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            <div class="main-panel" style="float: none; width: 100%;">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                            <a class="navbar-brand" href="#" style="font-weight: 800;">LOWKER</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left" style="margin-left: 56px;">
                                <li>
                                    <a href="dashboard_lamaran.php">
                                        Lamaran
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="pencarian_lowongan.php"><i class="fa fa-search"></i>Cari Lowongan</a>
                                </li>
                                <li>
                                    <a href="profil_edit.php">
                                        <p>
                                            <i class="fa fa-user-circle" style="font-size: 18px;"></i> Hallo,
                                            <?php echo $_SESSION['calon_pekerja_nama_lengkap'];?>
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="../php/logout.php">
                                        <i class="fa fa-sign-out"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="section section-header">
                    <div class="parallax filter filter-color-blue">
                        <div class="container">
                            <div class="content">
                                <form method="GET" action="dashboard.php">
                                    <div class="title-area">
                                        <p>Cari Lowongan Pekerjaan yang Kamu Inginkan</p><br/>
                                        <div class="row" style="">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control input-lg" name="nama" placeholder="Lowongan Pekerjaan" />
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

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Lowker Team</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/dashboard.js" type="text/javascript"></script>
        <!--  Modal  -->
        <script>
            <?php
            for($j= 0 ; $j <= $i; $j++){
        ?>
            $('#detail<?php echo $j;?>').appendTo("body")
            <?php
            }
        ?>
            $('#search').appendTo("body")
        </script>
    </body>

    </html>