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
    <script src="../utils/jquery/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#addVehicleform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '../script/vehicle.inc.php?btnAddVehicle',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result1").removeClass('alert-danger');
                        $("#result1").addClass('alert-success');
                        $("#result1").html('Added successfully');
                        alert("Added successfully");
                        window.location = "vehicle_manage.php";
                    } else {
                        $("#result1").removeClass('alert-success');
                        $("#result1").addClass('alert-danger');
                        $("#result1").html(data);
                    }
                }
            });
        });

        $('#updateUserform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();;
            $.ajax({
                type: "POST",
                url: '../script/vehicle.inc.php?btnUpdateVehicle',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result2").removeClass('alert-danger');
                        $("#result2").addClass('alert-success');
                        $("#result2").html('Updated successfully');
                        alert("Updated successfully");
                        window.location = "vehicle_manage.php";
                    } else {
                        $("#result2").removeClass('alert-success');
                        $("#result2").addClass('alert-danger');
                        $("#result2").html(data);
                    }
                }
            });
        });

        $('#vehicleUpdateModal').modal('show');
    });
    </script>

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
                include('../script/class/vehicle.cls.php');
                $vehicle = new Vehicle(null,null,null,null,$u['UID']);
                $result = $vehicle->getAllByUser();
                $none = "";
                if($result==false){
                    $none = '<div class="alert alert-danger float-right w-100 text-center mt-5"  role="alert">No Vehicles Added</div>';
                  }else{
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <!-- Begin Page Content -->
                <div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body vehicleView">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPtype">
                                            <?php echo $row['type'];?>
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Plate
                                            Number:</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPplate">
                                            <?php echo $row['plate']?>
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                                                id="UPcolor"><?php echo $row['color']?></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-car fa-4x"></i>
                                    </div>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-2">
                                        <a type="button" id="btnViewVehicel" class="btn btn-primary btn-sm"
                                            href="vehicle_manage.php?VID=<?php echo $row['VID']?>">Update</a>
                                            <button type="submit" class="btn btn-danger btn-sm confirm_dialog"
                                                    onclick="if(confirm('Are You Sure!')){window.location = '../script/vehicle.inc.php?btnDelete=&id=<?php echo $row['VID'];?>';}">
                                                    <i class="fas fa-trash-alt"></i></button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                                        }?>
                </div>
                <?php echo $none; ?>
                <div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary waves-effect btn-block mb-4" data-toggle="modal"
                            data-target="#addVehicleModal">Add new vehicle</button>
                    </div>
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

    <!--Add Modal-->
    <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Body-->
                <div class="modal-body">
                    <form action="" id="addVehicleform" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtType" name="txtType"
                                placeholder="Enter Vehicle Type...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtPlate" name="txtPlate"
                                placeholder="Enter Number Plate...">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtColor" name="txtColor"
                                placeholder="Enter Vehicle Color...">
                        </div>
                        <button class="btn btn-primary btn-user btn-block col-md-6 m-auto">Add New</button>
                        <div class="alert text-dark shadow float-right w-100 text-center mt-3" role="alert"
                            id="result1">
                        </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['VID'])){
        $result = $vehicle->getByID($_GET['VID']);
        if($result==false){
            echo 'Wrong ID';
        }else{
            while($row = mysqli_fetch_assoc($result)){
                if($row['UID']==$u['UID']){?>
            <!--Update Modal-->
            <div class="modal fade" id="vehicleUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-notify modal-warning" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <!--Body-->
                        <div class="modal-body">
                            <form action="" method="post" id="updateUserform">
                                <div class="form-group">
                                    <label>Type</label>
                                    <input type="text" class="form-control" id="update-type" name="txtType" value="<?php echo $row['type'];?>">
                                </div>

                                <div class="form-group">
                                    <label>Plate Number</label>
                                    <input type="text" class="form-control" id="update-plate" name="txtPlate" value="<?php echo $row['plate'];?>">
                                </div>

                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="text" class="form-control" id="update-color" name="txtColor" value="<?php echo $row['color'];?>">
                                    <input type="text" class="form-control" id="update-color" name="txtVID" value="<?php echo $row['VID'];?>" hidden>
                                </div>
                                <div id="updateUser-error-message"></div>
                                <!--Footer-->
                                <button class="btn btn-primary btn-user btn-block col-md-6 m-auto" id="btnUpdateUser"
                                    name="btnLogin">Update</button>
                                <div class="alert text-dark shadow float-right w-100 text-center mt-3" role="alert"
                                    id="result2">
                            </form>
                        </div>
                        <!--/.Content-->
                    </div>
                </div>
            </div>

    <?php
                }
            }
        }
    }?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>