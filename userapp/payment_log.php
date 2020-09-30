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

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="../utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/demo.css" rel="stylesheet" type="text/css">
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
                <!-- Begin Page Content -->
                <?php
                include('../script/view/payment.view.php');
                $payment = new PaymentView();
                $result = $payment->viewPaymentsByUser($u['UID']);
                echo $result;
                ?>
                </div>
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
                                        <input type="number" class="form-control" id="cardNumber" name="card_number"
                                            placeholder="Valid Card Number" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <label for="cvCode">EXPIRE DATE</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" class="form-control" id="cardYear" name="card_exp_year"
                                                    placeholder="YYYY" required autofocus />
                                            </div>
                                            <div class="col-4">
                                                <input type="number" class="form-control" id="cardMonth" name="card_exp_month"
                                                    placeholder="MM" min="1" max="12" required autofocus />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="cvCode">CVV CODE</label>
                                        <input type="password" class="form-control" id="cvCode" placeholder="CVV" name="card_cvv"
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
                                    <div class="alert text-dark float-right w-100 text-center mt-3" role="alert"
                                        id="result1">
                                </form>
                                <div class="col-lg-1 mx-auto demo mb-2"><a class="btn btn-secondary btn-user btn-block" id="btnDemo">Demo</a></div>
                                <script>
                                    $('#btnDemo').click(function(){
                                        $('#cardNumber').val('4515031000000005');
                                        $('#cvCode').val('123');
                                        $('#cardMonth').val('4');
                                        $('#cardYear').val('2021');
                                    });
                                </script>
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