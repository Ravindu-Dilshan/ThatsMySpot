<!DOCTYPE html>
<html>
<?php
session_start();
$u = null;
if(isset($_SESSION['loggedUser'])){
    $u = $_SESSION['loggedUser'];
}else{
    header("Location:login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
    <!-- Font Awesome -->
    <link href="../utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">

    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

    <script src="../utils/jquery/jquery.min.js"></script>
</head>

<body>
    <?php
    include('../script/class/payment.cls.php');
    $pay = new Payment(null,null,$u['UID'],null);
    $count = $pay->getUnpaidCount();
    ?>
    
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
    <hr class="sidebar-divider">
    <ons-tabbar swipeable position="bottom" activeindex="0" modifier="top">
        <ons-tab page="location" label="Locations" icon="fa-map-marker">
        </ons-tab>
        <ons-tab page="vehicles" label="Vehicles" icon="fa-car">
        </ons-tab>
        <ons-tab page="payments" label="Payments" badge="<?php if ($count >0){echo $count;} ?>" icon="fa-money-bill">
        </ons-tab>
        <ons-tab page="profile" label="Profile" badge="<?php if ($count >0){echo $count;} ?>" icon="fa-user">
        </ons-tab>
    </ons-tabbar>

    <template id="location">
        <ons-page id="Tab1">
            <?php include("place.php");?>
        </ons-page>
    </template>

    <template id="vehicles">
        <ons-page id="Tab2">
            <iframe src="vehicle_manage.php" frameborder="0" height="100%" width="100%"></iframe>
        </ons-page>
    </template>

    <template id="payments">
        <ons-page id="Tab3">
            <iframe src="payment_log.php" frameborder="0" height="100%" width="100%"></iframe>
        </ons-page>
    </template>

    <template id="profile">
        <ons-page id="Tab4">
            <?php include("profile.php");?>
            <iframe src="profile_manage.php" frameborder="0" height="750" width="100%" scrolling="no" style="overflow:show;"></iframe>
        </ons-page>
    </template>

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