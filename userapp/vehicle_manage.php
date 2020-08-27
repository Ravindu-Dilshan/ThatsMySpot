<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$u = null;
if(isset($_SESSION['loggedUser'])){
    $u = $_SESSION['loggedUser'];
}
?>
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
    <style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            bottom: 0;
            opacity: 0;
        }

        to {
            bottom: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            bottom: 30px;
            opacity: 1;
        }

        to {
            bottom: 0;
            opacity: 0;
        }
    }
    </style>
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
                        $('#addVehicleModal').modal('toggle');
                        snackBar("Added Successfully"); 
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
                        snackBar("Updated Successfully");
                    } else {
                        $("#result2").removeClass('alert-success');
                        $("#result2").addClass('alert-danger');
                        $("#result2").html(data);
                    }
                }
            });
        });

        $('#vehicleUpdateModal').modal('toggle');
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
                <?php //include("topbar.php")?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <?php
                include('../script/view/vehicle.view.php');
                $vehicle = new VehicleView();
                $result = $vehicle->viewVehiclesByUser($u['UID']);
                echo $result;
                ?>
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
                        <div class="alert text-dark float-right w-100 text-center mt-3" role="alert"
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
    $row = $vehicle->viewVehicle($_GET['VID']);
    if(is_array($row)){
    ?>
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
                            <input type="text" class="form-control" id="update-type" name="txtType"
                                value="<?php echo $row['type'];?>">
                        </div>

                        <div class="form-group">
                            <label>Plate Number</label>
                            <input type="text" class="form-control" id="update-plate" name="txtPlate"
                                value="<?php echo $row['plate'];?>">
                        </div>

                        <div class="form-group">
                            <label>Color</label>
                            <input type="text" class="form-control" id="update-color" name="txtColor"
                                value="<?php echo $row['color'];?>">
                            <input type="text" class="form-control" id="update-color" name="txtVID"
                                value="<?php echo $row['VID'];?>" hidden>
                        </div>
                        <div id="updateUser-error-message"></div>
                        <!--Footer-->
                        <button class="btn btn-primary btn-user btn-block col-md-6 m-auto" id="btnUpdateUser"
                            name="btnLogin">Update</button>
                        <div class="alert text-dark float-right w-100 text-center mt-3" role="alert"
                            id="result2">
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>

    <?php
    }else{
        echo $row;
        }
    }?>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div id="snackbar"></div>

    <!-- Bootstrap core JavaScript-->
    <script src="../utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script>
    function snackBar(msg) {
        var x = document.getElementById("snackbar");
        x.innerHTML = msg;
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
            window.location = "vehicle_manage.php";
        }, 3000);
        
    }
    </script>

</body>

</html>