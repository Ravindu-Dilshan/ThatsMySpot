<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

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
include('script/class/vehicle.cls.php');
$vehicle = new Vehicle(null,null,null,null,null);
$result = $vehicle->getVehicleLog();
$none = "";
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered userTable" id="dataTableReport" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>VID</th>
                                            <th>Plate Number</th>
                                            <th>Color</th>
                                            <th>Type</th>
                                            <th>User</th>
                                            <th>User Email</th>
                                            <th>User Telephone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if($result==false){
                                            $none = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No Vehicles Added</div>';
                                        }
                                        else{
                                          while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <td><b><?php echo $row['VID'];?></b></td>
                                            <td><?php echo $row['plate'];?></td>
                                            <td><?php echo $row['color'];?></td>
                                            <td><?php echo $row['type'];?></td>
                                            <td><?php echo $row['nameUser']."(".$row['UID'].")";?></td>
                                            <td><?php echo $row['emailUser'];?></td>
                                            <td><?php echo $row['telephoneUser'];?></td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
                                <?php echo $none; ?>
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