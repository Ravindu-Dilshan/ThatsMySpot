<?php
$expire = 365*24*3600; // We choose a one year duration
ini_set('session.gc_maxlifetime', $expire);
session_start();
setcookie(session_name(),session_id(),time()+$expire); 
//Set a session cookies to the one year duration
$u = null;
if(isset($_SESSION['loggedUser'])){
    $u = $_SESSION['loggedUser'];
}
?>
<nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <div  class="text-dark">
        <h6>Thats My Spot</h6>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <i class="fa fa-user"></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="vehicle_manage.php">
                    <i class="fas fa-car fa-sm fa-fw mr-2 text-gray-400"></i>
                    My Vehicles
                </a>
                <a class="dropdown-item" href="payment_log.php">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../script/logout.inc.php?btnLogoutCustomer">Logout</a>
            </div>
        </div>
    </div>
</div>