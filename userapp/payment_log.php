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
    <script>
    $(document).ready(function() {
        $('#payform').submit(function(e) {
            e.preventDefault();
            var values = $(this).serialize();
            $.ajax({
                type: "POST",
                url: '../script/payment.inc.php?btnUpdateStatus',
                data: values,
                success: function(data) {
                    if (data == "Success") {
                        $("#result1").removeClass('alert-danger');
                        $("#result1").addClass('alert-success');
                        $("#result1").html('Added successfully');
                        $('#paymentModal').modal('toggle');
                        snackBar("Payment Successfull"); 
                    } else {
                        $("#result1").removeClass('alert-success');
                        $("#result1").addClass('alert-danger');
                        $("#result1").html(data);
                    }
                }
            });
        });
        $('#paymentModal').modal('show');
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
                <?php
                include('../script/class/payment.cls.php');
                $payment = new Payment(null,null,$u['UID'],null);
                $result = $payment->getAllByUser();
                $none = "";
                if($result==false){
                    $none = '<div class="alert alert-danger float-right w-100 text-center mt-5"  role="alert">No Activity</div>';
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
                                            <?php echo $row['in_time'];?>
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <?php echo $row['place']?></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="UPplate">
                                            <?php echo $row['plate']?>
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"
                                                id="UPcolor">Rs.<?php echo $row['amount']?>
                                                <span class="badge <?php if($row['status'] == 'Not Paid'){echo 'badge-danger';}
                                                else{echo 'badge-success';}?>"><?php echo $row['status']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-money-bill fa-4x"></i>
                                    </div>
                                </div>
                                <?php if($row['status'] == 'Not Paid'){?>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mt-2">
                                        <a type="button" class="btn btn-primary btn-sm"
                                            href="payment_log.php?PID=<?php echo $row['PID']?>">Pay</a>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }
                                        }?>
                </div>
                <?php echo $none; ?>
                <!-- /.container-fluid -->
                <?php
                if(isset($_GET['PID'])){?>
                <!--Update Modal-->
                <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-warning" role="document">
                        <!--Content-->
                        <div class="modal-content">
                            <!--Header-->
                            <!--Body-->
                            <div class="modal-body">
                                <form action="" method="post" id="payform">
                                    <div class="form-group">
                                        <label for="cvCode">CARD NUMBER</label>
                                        <input type="text" class="form-control" id="cardNumber"
                                            placeholder="Valid Card Number" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label for="cvCode">EXPIRE DATE</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" class="form-control" id="cardNumber"
                                                    placeholder="YYYY" required autofocus />
                                            </div>
                                            <div class="col-4">
                                                <input type="number" class="form-control" id="cardNumber"
                                                    placeholder="MM" min="1" max="12" required autofocus />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="cvCode">CV CODE</label>
                                        <input type="password" class="form-control" id="cvCode" placeholder="CV"
                                            required />
                                        <input type="password" class="form-control" name="txtPID" placeholder="CV"
                                            value="<?php echo $_GET['PID']?>" hidden />
                                    </div>
                                    <ul class="list-group list-group-horizontal my-4">
                                        <li class="list-group-item"><img src="../img/visa.png" class="img-fluid"></li>
                                        <li class="list-group-item"><img src="../img/master.png" class="img-fluid"></li>
                                        <li class="list-group-item"><img src="../img/hnb.jpg" class="img-fluid"></li>
                                    </ul>

                                    <div id="updateUser-error-message"></div>
                                    <!--Footer-->
                                    <button class="btn btn-primary btn-user btn-block col-md-6 m-auto"
                                        id="btnUpdateUser" name="btnLogin">Pay</button>
                                    <div class="alert text-dark shadow float-right w-100 text-center mt-3" role="alert"
                                        id="result1">
                                </form>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                </div>
                <?php
                }?>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
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
            window.location = "payment_log.php";
        }, 3000);
        
    }
    </script>

</body>

</html>