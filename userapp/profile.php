<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <!-- End of Topbar -->
            <?php
            include('../script/view/user.view.php');
            $user = new UserView();
            $row = $user->viewUser($u['UID']);
            ?>
            <?php 
            if(is_array($row)){
            ?>
            <!-- Begin Page Content -->
            <div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                    <div class="card border-bottom-dark h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                                <div class="col ml-5">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">USERNAME
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['nameUser'];?>
                                    </div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">EMAIL
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['emailUser'];?>
                                    </div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TELEPHONE
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo $row['telephoneUser'];?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                    echo $row;
                }?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <!--<img src="../img/park.jpg" alt="" class="img-fluid"> -->
                    <div class="card border-bottom-dark h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <a class="btn btn-group-lg btn-primary m-auto"
                                    href="../script/logout.inc.php?btnLogoutCustomer">Logout</a>
                            </div>
                        </div>
                    </div>
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