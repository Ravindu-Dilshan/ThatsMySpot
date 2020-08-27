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
            <!-- Begin Page Content -->
            <?php
                include('../script/view/place.view.php');
                $place = new PlaceView();
                $result = $place->viewPlaceForUser();
                echo $result;
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- End of Footer -->
        <div class="text-center m-2">
            <a class="rounded" href="home.php">
                <i class="fa fa-refresh"></i>
            </a>
        </div>
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->