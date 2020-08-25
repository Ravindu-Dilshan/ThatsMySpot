<?php
    $expire = 365*24*3600; // We choose a one year duration
    ini_set('session.gc_maxlifetime', $expire);
    session_start();
    setcookie(session_name(),session_id(),time()+$expire); 
    //Set a session cookies to the one year duration
    if(isset($_SESSION['loggedUser'])){
        $u = $_SESSION['loggedUser'];
        if($u['ACESS'] == "Customer"){
            header("Location:login.php");
        }
    }else{
        header("Location:login.php");
    }
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand-icon">
        <img src="img/logowhite.png" alt="" class="img-fluid p-3">
    </div>
    <div class="sidebar-brand-text"></div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage
    </div>
    <?php if($u['ACESS'] == "Admin"){?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="user_manage.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
        <!--
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
        -->
    </li>
    <?php }?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="place_manage.php">
            <i class="fas fa-fw fa-cog"></i>
            <span>Parking Locations</span>
        </a>
        <!--
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
        -->
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        DSS
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Reports</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="users_log.php">Users Info</a>
                <a class="collapse-item" href="places_log.php">Parking Locations Info</a>
                <a class="collapse-item" href="vehicle_log.php">Vehicle Info</a>
                <a class="collapse-item" href="parking_log.php">Authentication Log</a>
                <a class="collapse-item" href="payment_log.php">Payment Info</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true"
            aria-controls="collapsePages2">
            <i class="fa fa-chart-line"></i>
            <span>Forecasts</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="forecast_revenue.php">Revenue</a>
                <a class="collapse-item" href="forecast_demand.php">Demand</a>
                <a class="collapse-item" href="forecast.php">Forecast Demo</a>
            </div>
        </div>
    </li>

    
    
    
    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>