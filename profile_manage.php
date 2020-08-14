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

    <script src="utils/jquery/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#updateProfileform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: 'script/user.inc.php?btnUpdatePro',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result1").removeClass('alert-danger');
                        $("#result1").addClass('alert-success');
                        $("#result1").html('Updated successfully');
                    } else {
                        $("#result1").removeClass('alert-success');
                        $("#result1").addClass('alert-danger');
                        $("#result1").html(data);
                    }
                }
            });
        });

        $('#passwordChangeform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: 'script/user.inc.php?btnPassword',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result2").removeClass('alert-danger');
                        $("#result2").addClass('alert-success');
                        $("#result2").html('Changed successfully');
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
        <?php
        include('script/class/user.cls.php');
        $user = new User($u['UID'],null,null,null,null,null);
        $result = $user->getUser();
        $none = "";
        ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                    </div>
                    <div class="m-auto shadow p-5">
                        <div class="w-auto">
                            <div class="px-0 pb-4">
                                <form class="user" action="" class="user" id="updateProfileform" method="post">
                                    <?php 
                                        if($result==false){
                                            $none = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No Users Added</div>';
                                            echo $none;
                                        }
                                        else{
                                          while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['nameUser'];?>"
                                            aria-describedby="emailHelp" placeholder="Enter Email Address"
                                            name="txtName">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?php echo $row['emailUser'];?>"
                                            aria-describedby="emailHelp" placeholder="Enter Name" name="txtEmail">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control"
                                            value="<?php echo $row['telephoneUser'];?>" aria-describedby="emailHelp"
                                            placeholder="Enter Telephone number" name="txtTelephone">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block col-md-3" id="btnUpdate"
                                        name="btnUpdate">Update</button>
                                    <?php }
                                        }?>
                                    <div class="alert text-dark float-right w-100 text-center my-3" role="alert"
                                        id="result1"></div>
                                </form>

                                <div class="d-sm-flex align-items-center justify-content-between mb-4"
                                    style="margin-top:6rem;">
                                    <h3 class="h4 mb-0 text-gray-800">Change Password</h3>
                                </div>
                                <form class="user" action="" class="user" id="passwordChangeform" method="post">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="" aria-describedby="emailHelp"
                                            placeholder="Enter Current Password" name="txtOldPW">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="" aria-describedby="emailHelp"
                                            placeholder="Enter new Password" name="txtNewPW">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="" aria-describedby="emailHelp"
                                            placeholder="Confirm Password" name="txtCPW">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block col-md-3" id="btnLogin"
                                        name="btnLogin">Change</button>
                                    <div class="alert text-dark float-right w-100 text-center my-3" role="alert"
                                        id="result2"></div>
                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
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
    <!--/.Content-->
    <!-- Bootstrap core JavaScript-->

    <script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>