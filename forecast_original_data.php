<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ThatsMySpots - Forecast Original Data Demo</title>

    <!-- Custom fonts for this template-->
    <link href="utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("topbar.php")?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Original data Forecast</h1>
                    </div>
                    <div class="row mx-2">
                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Demand Forecast</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//authentication//fore.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>

                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Forecast</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//income//fore.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Demand Evaluate</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//authentication//evaluate.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>

                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Evaluate</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//income//evaluate.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2">
                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Demand Data Stationary</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//authentication//stationary.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>

                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Data Stationary</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//income//stationary.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mx-2">
                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Demand Data</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//authentication//normal.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>

                        <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Data</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample1">
                                <div class="card-body">
                                    <img src="python//income//normal.jpg" class="img-fluid" alt="Forecast Chart">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-2">
                    <!-- Collapsable Card -->
                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample5">
                                <h6 class="m-0 font-weight-bold text-primary">Demand Predicted Data</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample5">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered userTable" id="dataTableReport" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Predicted Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Open the file for reading
                                                if (file_exists ("python//authentication//foredata.csv") == TRUE) 
                                                {
                                                $file = fopen("python//authentication//foredata.csv", "r");
                                                // Convert each line into the local $data variable
                                                fgetcsv($file);
                                                while (($row = fgetcsv($file, 1000, ",")) !== FALSE) 
                                                {		
                                                ?>
                                                <tr>
                                                    <td><b><?php echo $row[1];?></b></td>
                                                    <td><?php echo $row[2];?></td>
                                                </tr>
                                                <?php }
                                                fclose($file);
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="d-flex">
                                            <a href="forecast_original_data.php?trainsetauthentication"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnTrain">Set Data</a>
                                            <a href="forecast_original_data.php?trainauthentication"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnTrain">Train Data</a>
                                            <a href="forecast_original_data.php?foreauthentication"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnFore">Forecast
                                                Data</a>
                                        </div>
                                        <?php
                                        $config = simplexml_load_file("./script/model/config.xml");
                                        $path = trim($config->python);
                                        if (isset($_GET["trainauthentication"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'reciveTrain.bat 0 0 authentication');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }
                                        elseif (isset($_GET["foreauthentication"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'reciveFore.bat 0 0 authentication');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }
                                        elseif (isset($_GET["trainsetauthentication"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'convert.bat authentication');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow mb-4 col-md-6">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample5">
                                <h6 class="m-0 font-weight-bold text-primary">Revenue Predicted Data</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample5">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered userTable" id="dataTableReport" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Predicted Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Open the file for reading
                                                if (file_exists ("python//income//foredata.csv") == TRUE) 
                                                {
                                                $file = fopen("python//income//foredata.csv", "r");
                                                // Convert each line into the local $data variable
                                                fgetcsv($file);
                                                while (($row = fgetcsv($file, 1000, ",")) !== FALSE) 
                                                {		
                                                ?>
                                                <tr>
                                                    <td><b><?php echo $row[1];?></b></td>
                                                    <td><?php echo $row[2];?></td>
                                                </tr>
                                                <?php }
                                                fclose($file);
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="d-flex">
                                            <a href="forecast_original_data.php?trainsetincome"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnTrain">Set Data</a>
                                            <a href="forecast_original_data.php?trainincome"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnTrain">Train Data</a>
                                            <a href="forecast_original_data.php?foreincome"
                                                class="btn btn-primary btn-user col-md-3 mx-2" id="btnFore">Forecast
                                                Data</a>
                                        </div>
                                        <?php
                                        $config = simplexml_load_file("./script/model/config.xml");
                                        $path = trim($config->python);
                                        if (isset($_GET["trainincome"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'reciveTrain.bat 0 0 income');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }
                                        elseif (isset($_GET["foreincome"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'reciveFore.bat 0 0 income');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }elseif (isset($_GET["trainsetincome"])){
                                            exec('c:\WINDOWS\system32\cmd.exe /c START  '.$path.'convert.bat income');
                                            echo ('<script>location = "forecast_original_data.php"</script>');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <?php include("footer.php")?>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="utils/jquery/jquery.min.js"></script>
    <script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="utils/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>