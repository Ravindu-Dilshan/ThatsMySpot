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
        $('#addUserform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();

            $.ajax({
                type: "POST",
                url: 'script/user.inc.php?btnAddUser',
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

        $('#updateUserform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();;
            $.ajax({
                type: "POST",
                url: 'script/user.inc.php?btnUpdateUser',
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
<?php
include('script/class/user.cls.php');
$user = new User(null,null,null,null,null,null);
$result = $user->getAllUsers();
$none = "";
if($result==false){
  $none = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No users</div>';
}
else{
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
                                <table class="table table-bordered userTable" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>UID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Autorized access</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          while($row = mysqli_fetch_assoc($result))
                                          {
                                        ?>
                                        <tr>
                                            <td><b><?php echo $row['UID'];?></b></td>
                                            <td><?php echo $row['nameUser'];?></td>
                                            <td><?php echo $row['emailUser'];?></td>
                                            <td><?php echo $row['telephoneUser'];?></td>
                                            <td><?php echo $row['accessUser'];?></td>
                                            <td><button type="button" id="btnViewUser" class="btn btn-primary btn-sm"
                                                    data-toggle="modal" data-target="#userUpdateModal">Update</button>
                                            </td>
                                            <td><button type="submit" class="btn btn-danger btn-sm confirm_dialog"
                                                    onclick="if(confirm('Are You Sure!')){window.location = 'script/user.inc.php?btnDelete=&id=<?php echo $row['UID'];?>';}">
                                                    <i class="fas fa-trash-alt"></i></button></td>
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
                <div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary waves-effect btn-block col-md-4 ml-md-5"
                            data-toggle="modal" data-target="#addUserModal">Add new user</button>
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
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="text-center bg-primary py-2">
                    <h1 class="h4 text-gray-900 my-4">ADD NEW USER</h1>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="" id="addUserform" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="txtName" name="txtName"
                                placeholder="Enter Username...">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail"
                                placeholder="Enter Email...">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="txtPassword" name="txtPassword"
                                placeholder="Enter Password...">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="txtTelephone" name="txtTelephone"
                                placeholder="Enter Telephone...">
                        </div>
                        <div class="form-group">
                            <label for="typeUser ml-4">Type</label>
                            <select id="update-typeUser" name="txtTypeUser" class="form-control">
                                <option>Customer</option>
                                <option>Manager</option>
                                <option>Admin</option>
                            </select>
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

    <!--Update Modal-->
    <div class="modal fade" id="userUpdateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="text-center bg-primary py-2">
                    <h1 class="h4 text-gray-900 my-4">UPDATE USER</h1>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <form action="" method="post" id="updateUserform">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control" id="update-idUser" name="txtUID" readonly>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="update-nameUser" name="txtName">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="update-emailUser" name="txtEmail">
                        </div>

                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="number" class="form-control" id="update-telephoneUser" name="txtTelephone">
                        </div>

                        <div class="form-group">
                            <label for="update-typeUser">Type</label>
                            <select id="update-typeUser" name="txtTypeUser" class="form-control">
                                <option value="Customer">Customer</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                            </select>
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
    $('.userTable tbody').on('click', '#btnViewUser', function() {
        var currow = $(this).closest('tr');
        var id = currow.find('td:eq(0)').text();
        var name = currow.find('td:eq(1)').text();
        var email = currow.find('td:eq(2)').text();
        var telephone = currow.find('td:eq(3)').text();
        var type = currow.find('td:eq(4)').text();

        $('#update-idUser').val(id);
        $('#update-nameUser').val(name);
        $('#update-emailUser').val(email);
        $('#update-telephoneUser').val(telephone);
        //$('#update-typeUser select').val(type);
        $("#update-typeUser option[value="+type+"]").attr('selected', 'selected');
        //$('#userUpdateModal').modal('show');

    })
    </script>

</body>

</html>