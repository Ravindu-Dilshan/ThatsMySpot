<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("topbar.php")?>
                <!-- End of Topbar -->
                <?php
                include('../script/class/place.cls.php');
                $place = new Place(null,null,null,null,null,null);
                $result = $place->getAllPalce();
                $none = "";
                if($result==false){
                    $none = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No Places Added</div>';
                  }else{
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <!-- Begin Page Content -->
                <div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['namePlace'];?></div>
                                        <?php if($row['current'] == $row['available']){?>
                                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Available</div>
                                        <?php 
                                        }else{?>
                                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Available</div>
                                        <?php }?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['current']."/".$row['available'];?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-map-marker fa-4x"></i>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-2">
                                      <a class="h8 btn btn-group btn-dark text-white" href="https://map.google.com/maps?q=<?php echo $row['latitude'];?>,<?php echo $row['longtitude'];?>">Location</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                                        }?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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
    <script src="../utils/jquery/jquery.min.js"></script>
    <script src="../utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../utils/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>