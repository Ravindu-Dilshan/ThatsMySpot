<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/demo.css" rel="stylesheet" type="text/css">
    <title>ThatsMySpot - Locations</title>

    <!-- Custom fonts for this template -->
    <link href="utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="utils/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="utils/jquery/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#addPlaceform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: 'script/place.inc.php?btnAddPlace',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result1").removeClass('alert-danger');
                        $("#result1").addClass('alert-success');
                        $("#result1").html('Added successfully');
                    } else {
                        $("#result1").removeClass('alert-success');
                        $("#result1").addClass('alert-danger');
                        $("#result1").html(data);
                    }
                }
            });
        });

        $('#updatePlaceform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: 'script/place.inc.php?btnUpdatePlace',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result2").removeClass('alert-danger');
                        $("#result2").addClass('alert-success');
                        $("#result2").html('Updated successfully');
                    } else {
                        $("#result2").removeClass('alert-success');
                        $("#result2").addClass('alert-danger');
                        $("#result2").html(data);
                    }
                }
            });
        });
    });
    </script>

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

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Parking Locations Management</h1>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Parking Locations Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered placeTable" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>PID</th>
                                            <th>Name</th>
                                            <th>Latitude</th>
                                            <th>Longtitude</th>
                                            <th>Availability</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('script/view/place.view.php');
                                    $place = new PlaceView();
                                    $result = $place->viewPlaces();
                                    echo $result;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <div>
                    <div class="col-md-4 mb-2">
                        <button type="button" class="btn btn-primary waves-effect btn-block col-md-4 ml-md-5"
                            data-toggle="modal" data-target="#addPlaceModal">Add new Location</button>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--Add Modal-->
    <div class="modal fade" id="addPlaceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="text-center bg-primary py-2">
                    <h1 class="h4 text-gray-900 my-4">ADD NEW LOCATION</h1>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="" id="addPlaceform" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtName" name="txtName"
                                placeholder="Enter Placename...">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txtLat" name="txtLat"
                                placeholder="Enter Latitude...(Decimal)" step="0.0000000001">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txtLong" name="txtLong"
                                placeholder="Enter Longtitude...(Decimal)" step="0.0000000001">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txtAvailable" name="txtAvailable"
                                placeholder="Enter Parking Spot Count...">
                        </div>
                        <button class="btn btn-primary btn-user btn-block col-md-6 m-auto">Add New</button>
                        <div class="alert text-dark float-right w-100 text-center mt-3" role="alert"
                            id="result1">
                        </div>
                    </form>
                    <div class="col-lg-3 mx-auto demo mb-2"><button class="btn btn-secondary btn-user btn-block" id="btnDemo">Demo</button></div>
                    <script>
                        $('#btnDemo').click(function(){
                            $('#txtName').val('Jaffna');
                            $('#txtLat').val('9.6615');
                            $('#txtLong').val('80.0255');
                            $('#txtAvailable').val('25');
                        });
                    </script>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>

    <!--Update Modal-->
    <div class="modal fade" id="placeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="text-center bg-primary py-2">
                    <h1 class="h4 text-gray-900 my-4">UPDATE LOCATION</h1>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="" method="post" id="updatePlaceform">
                        <div class="form-group">
                            <label>Place ID</label>
                            <input type="text" class="form-control" id="update-idPlace" name="txtPID" readonly>
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="update-namePlace" name="txtName">
                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="number" class="form-control" id="update-Latitude" name="txtLat" step="0.0000000001">
                        </div>

                        <div class="form-group">
                            <label>Longtitude</label>
                            <input type="number" class="form-control" id="update-Longtitude" name="txtLong" step="0.0000000001">
                        </div>

                        <div class="form-group">
                            <label>Available Spots</label>
                            <input type="text" class="form-control" id="update-Available" name="txtAvailable">
                        </div>

                        <div class="form-group">
                            <label>Spots in use</label>
                            <input type="text" class="form-control" id="update-current" name="txtCurrent" readonly>
                        </div>

                        <div id="updateUser-error-message"></div>
                        <!--Footer-->
                        <button class="btn btn-primary btn-user btn-block col-md-6 m-auto" id="btnUpdatePlace"
                            name="btnLogin">Update</button>
                        <div class="alert text-dark float-right w-100 text-center mt-3" role="alert"
                            id="result2">
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->

    <script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="utils/datatables/jquery.dataTables.min.js"></script>
    <script src="utils/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
    $('.placeTable tbody').on('click', '#btnViewPlace', function() {
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').text();
        var name = currow.find('td:eq(1)').text();
        var lat = currow.find('td:eq(2)').text();
        var long = currow.find('td:eq(3)').text();
        var available = currow.find('td:eq(4)').text().split("/");
        
        $('#update-idPlace').val(id);
        $('#update-namePlace').val(name);
        $('#update-Latitude').val(lat);
        $('#update-Longtitude').val(long);
        $('#update-Available').val(available[1]);
        $('#update-current').val(available[0]);
        //$('#update-typeUser select').val(type);
        $("#update-typeUser option[value="+type+"]").attr('selected', 'selected');
        //$('#userUpdateModal').modal('show');

    })
    </script>

</body>

</html>