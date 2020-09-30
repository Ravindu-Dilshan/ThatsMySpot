<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="../utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/demo.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script src="../utils/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#registerform').submit(function(e) {
        e.preventDefault();
        var values = $(this).serialize();
        $.ajax({
          type: "POST",
          url: '../script/user.inc.php?btnRegister',
          data: values,
          success: function(data)
          {   if(data=="Success"){
                $("#result").removeClass('alert-danger');
                $("#result").addClass('alert-success');
                $("#result").html('Registered successfully');
              }else{
                $("#result").removeClass('alert-success');
                $("#result").addClass('alert-danger');
                $("#result").html(data);
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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="m-auto">
              <div class="m-auto">
                <div class="px-0 pb-4 mt-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <form class="user" action="" class="user" id="registerform" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="demoEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" name="txtEmail">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="demoName" aria-describedby="emailHelp" placeholder="Enter Name" name="txtName">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control form-control-user" id="demoTelephone" aria-describedby="emailHelp" placeholder="Enter Telephone number" name="txtTelephone">
                    </div>
                    <div class="form-group">
                      <textarea type="long text" class="form-control form-control-user" id="demoAddress" aria-describedby="emailHelp" placeholder="Enter Address..."></textarea>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="demoPassword" placeholder="Enter Password" name="txtPassword">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" id="btnLogin" name="btnLogin">Register</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login.php">Have an Account !</a>
                  </div>
                  <div class="alert text-dark float-right w-100 text-center mt-3" role="alert" id="result"></div>
                </div>
              </div>
            </div>

            <div class="col-lg-1 mx-auto demo mb-2"><button class="btn btn-secondary btn-user btn-block" id="btnDemo">Demo</button></div>
            <script>
                $('#btnDemo').click(function(){
                    $('#demoEmail').val('test@gmail.com');
                    $('#demoName').val('Test User');
                    $('#demoTelephone').val('0112345678');
                    $('#demoAddress').val('22/22 that street, Maharagama');
                    $('#demoPassword').val('123456');
                });
            </script>
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


  <!-- Bootstrap core JavaScript-->
  <script src="../utils/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../utils/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../utils/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
