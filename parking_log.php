<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ThatsMySpot - Parking Logs</title>

    <!-- Custom fonts for this template -->
    <link href="utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="utils/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="utils/jquery/jquery.min.js"></script>

</head>
<?php
include('script/view/parking.view.php');
$parking = new ParkingLogView();
$result = $parking->viewParkingLog(False,null,null);
if(isset($_POST['txtFrom']) && isset($_POST['txtTo'])){//get by date range
    if(!empty($_POST['txtFrom']) && !empty($_POST['txtTo'])){
        $result = $parking->viewParkingLog(True,$_POST['txtFrom'],$_POST['txtTo']);
    } 
}
?>
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

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Parking Logs</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <form action="parking_log.php" method="post"
                                class="float-md-right">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary w-auto">
                                            From
                                        </div>
                                        <input type="date" class="form-control bg-light border-0 small w-auto"
                                            name="txtFrom">
                                    </div>

                                    <div class="input-group-append">
                                        <div class="btn btn-primary w-auto">
                                            to
                                        </div>
                                        <input type="date" class="form-control bg-light border-0 small w-auto"
                                            name="txtTo">
                                    </div>

                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered userTable" id="dataTableReport" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>PID</th>
                                            <th>Plate Number</th>
                                            <th>Facility</th>
                                            <th>In time</th>
                                            <th>Out time</th>
                                            <th>Amount(Rs.)</th>
                                            <th>User</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $result;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->

        <script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="utils/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="utils/datatables/jquery.dataTables.min.js"></script>
        <script src="utils/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>


        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>


</body>

</html>