<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ThatsMySpot - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="utils/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="utils/jquery/jquery.min.js"></script>
    <script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="utils/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="utils/chart.js/Chart.min.js"></script>
</head>

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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Usage and Earnings Overview</h1>
                    </div>
                    <?php
                          include('script/view/parking.view.php');
                          $parking = new ParkingLogView();
                    ?>
                  <!-- Content Row -->

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overall</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="earningsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Usage Overall</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="countChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $namePlaceArray = array();
                        include('script/view/place.view.php');
                        $place = new PlaceView();
                        $result = $place->viewPlaceRaw();
                        $none = "";
                        if($result==false){
                          $none = '<div class="alert alert-danger text-center mt-4" role="alert">No Data Currently Available</div>';
                        }else{
                          while($row = mysqli_fetch_assoc($result)){?>
                          <script>
                          var <?php echo $row['namePlace']?>months = [];
                          var <?php echo $row['namePlace']?>amount = []; 
                          var <?php echo $row['namePlace']?>count = [];                  
                          </script>
                          <?php
                              array_push($namePlaceArray,$row['namePlace']);
                              $result2 = $parking->viewAmountByMonthLocation($row['namePlace']);
                              if($result2==false){
                                $none = '';
                              }else{
                                while($row2 = mysqli_fetch_assoc($result2)){
                        ?>
                                    <script>
                                      <?php echo $row2['place']?>months.push("<?php echo $row2['month'];?>");
                                      <?php echo $row2['place']?>amount.push( <?php echo $row2['amount']; ?> ); 
                                      <?php echo $row2['place']?>count.push( <?php echo $row2['count']; ?> );
                                    </script>
                        
                                <?php }?>
                    <div class="row">
                        
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['namePlace']?> Earnings Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="<?php echo $row['namePlace']?>earningsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['namePlace']?> Usage Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="<?php echo $row['namePlace']?>countChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        // Set new default font family and font color to mimic Bootstrap's default styling
                        Chart.defaults.global.defaultFontFamily = 'Nunito','-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                        Chart.defaults.global.defaultFontColor = '#858796';

                        // Area Chart
                        var <?php echo $row['namePlace']?>ctxx = document.getElementById("<?php echo $row['namePlace']?>earningsChart");
                        var <?php echo $row['namePlace']?>ctyy = document.getElementById("<?php echo $row['namePlace']?>countChart");
                        var earningsChart = new Chart(<?php echo $row['namePlace']?>ctxx, {
                            type: 'line',
                            data: {
                                labels: <?php echo $row['namePlace']?>months,
                                datasets: [{
                                    label: "Earnings",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                                    borderColor: "rgba(78, 115, 223, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                    pointBorderColor: "rgba(78, 115, 223, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: <?php echo $row['namePlace']?>amount,
                                }],
                            },
                            options: {
                                maintainAspectRatio: false,
                                layout: {
                                    padding: {
                                        left: 10,
                                        right: 25,
                                        top: 25,
                                        bottom: 0
                                    }
                                },
                                scales: {
                                    xAxes: [{
                                        time: {
                                            unit: 'date'
                                        },
                                        gridLines: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        ticks: {
                                            maxTicksLimit: 7
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            maxTicksLimit: 5,
                                            padding: 10,
                                            // Include a dollar sign in the ticks
                                            callback: function(value, index, values) {
                                                return 'Rs.' + (value);
                                            }
                                        },
                                        gridLines: {
                                            color: "rgb(234, 236, 244)",
                                            zeroLineColor: "rgb(234, 236, 244)",
                                            drawBorder: false,
                                            borderDash: [2],
                                            zeroLineBorderDash: [2]
                                        }
                                    }],
                                },
                                legend: {
                                    display: false
                                },
                                tooltips: {
                                    backgroundColor: "rgb(255,255,255)",
                                    bodyFontColor: "#858796",
                                    titleMarginBottom: 10,
                                    titleFontColor: '#6e707e',
                                    titleFontSize: 14,
                                    borderColor: '#dddfeb',
                                    borderWidth: 1,
                                    xPadding: 15,
                                    yPadding: 15,
                                    displayColors: false,
                                    intersect: false,
                                    mode: 'index',
                                    caretPadding: 10,
                                    callbacks: {
                                        label: function(tooltipItem, chart) {
                                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                            return datasetLabel + ': Rs.' + (tooltipItem.yLabel);
                                        }
                                    }
                                }
                            }
                        });
                        var myBarChart = new Chart(<?php echo $row['namePlace']?>ctyy, {
                        type: 'bar',
                        data: {
                          labels: <?php echo $row['namePlace']?>months,
                          datasets: [{
                            label: "Count",
                            backgroundColor: "#4e73df",
                            hoverBackgroundColor: "#2e59d9",
                            borderColor: "#4e73df",
                            data: <?php echo $row['namePlace']?>count,
                          }],
                        },
                        options: {
                          maintainAspectRatio: false,
                          layout: {
                            padding: {
                              left: 10,
                              right: 25,
                              top: 25,
                              bottom: 0
                            }
                          },
                          scales: {
                            xAxes: [{
                              time: {
                                unit: 'month'
                              },
                              gridLines: {
                                display: false,
                                drawBorder: false
                              },
                              ticks: {
                                maxTicksLimit: 6
                              },
                              maxBarThickness: 25,
                            }],
                            yAxes: [{
                              ticks: {
                                min: 0,
                                //max: 15000,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                  return '' + (value);
                                }
                              },
                              gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                              }
                            }],
                          },
                          legend: {
                            display: false
                          },
                          tooltips: {
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                            callbacks: {
                              label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ':' + (tooltipItem.yLabel);
                              }
                            }
                          },
                        }
                      });
                        </script>   
                    </div>
                    <?php
                        }
                      }
                    }echo $none;?>

                    <script>
                        var months = [];
                        var amount = []; 
                        var count = [];
                        <?php
                        $result = $parking ->viewAmountByMonth();
                        $none = "";
                        if ($result == false) {
                            $none = '<div class="alert alert-danger float-right w-100 text-center mt-4" role="alert">No Places Added</div>';
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                months.push("<?php echo $row['month'];?>");
                                amount.push( <?php echo $row['amount']; ?> ); 
                                count.push( <?php echo $row['count']; ?> ); 
                        <?php
                            }
                        }?>
                    </script>

                      <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Earnings Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="AllearningsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">All Usage Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="AllcountChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                        // Set new default font family and font color to mimic Bootstrap's default styling
                        Chart.defaults.global.defaultFontFamily = 'Nunito','-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                        Chart.defaults.global.defaultFontColor = '#858796';

                        // Area Chart
                        var ctxx = document.getElementById("AllearningsChart");
                        var ctyy = document.getElementById("AllcountChart");
                        var earningsChart = new Chart(ctxx, {
                            type: 'line',
                            data: {
                                labels: months,
                                datasets: [
                                  <?php 
                                  foreach ($namePlaceArray as $value){
                                    $c1 =  (rand(0,300));
                                    $c2 =  (rand(0,200));
                                    $c3 =  (rand(0,300));?>
                                  {
                                    label: "<?php echo $value?> Earnings",
                                    lineTension: 0.3,
                                    backgroundColor: "rgba(78, 115, 227, 0.05)",
                                    borderColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                                    pointRadius: 3,
                                    pointBackgroundColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                                    pointBorderColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                                    pointHoverRadius: 3,
                                    pointHoverBackgroundColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                                    pointHoverBorderColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                                    pointHitRadius: 10,
                                    pointBorderWidth: 2,
                                    data: <?php echo $value?>amount,
                                },
                              <?php }?>
                              ],
                            },
                            options: {
                                maintainAspectRatio: false,
                                layout: {
                                    padding: {
                                        left: 10,
                                        right: 25,
                                        top: 25,
                                        bottom: 0
                                    }
                                },
                                scales: {
                                    xAxes: [{
                                        time: {
                                            unit: 'date'
                                        },
                                        gridLines: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        ticks: {
                                            maxTicksLimit: 7
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            maxTicksLimit: 5,
                                            padding: 10,
                                            // Include a dollar sign in the ticks
                                            callback: function(value, index, values) {
                                                return 'Rs.' + (value);
                                            }
                                        },
                                        gridLines: {
                                            color: "rgb(234, 236, 244)",
                                            zeroLineColor: "rgb(234, 236, 244)",
                                            drawBorder: false,
                                            borderDash: [2],
                                            zeroLineBorderDash: [2]
                                        }
                                    }],
                                },
                                legend: {
                                    display: true
                                },
                                tooltips: {
                                    backgroundColor: "rgb(255,255,255)",
                                    bodyFontColor: "#858796",
                                    titleMarginBottom: 10,
                                    titleFontColor: '#6e707e',
                                    titleFontSize: 14,
                                    borderColor: '#dddfeb',
                                    borderWidth: 1,
                                    xPadding: 15,
                                    yPadding: 15,
                                    displayColors: false,
                                    intersect: false,
                                    mode: 'index',
                                    caretPadding: 10,
                                    callbacks: {
                                        label: function(tooltipItem, chart) {
                                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                            return datasetLabel + ': Rs.' + (tooltipItem.yLabel);
                                        }
                                    }
                                }
                            }
                        });
                        var myBarChart = new Chart(ctyy, {
                        type: 'bar',
                        data: {
                          labels:months,
                          datasets: [
                            <?php foreach ($namePlaceArray as $value){
                              $c1 =  (rand(0,100));
                              $c2 =  (rand(0,200));
                              $c3 =  (rand(0,200));?>
                            {
                            label: "<?php echo $value?> Count",
                            backgroundColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                            //hoverBackgroundColor: "#2e59d9",
                            borderColor: "rgba(<?php echo $c1?>, <?php echo $c2?>, <?php echo $c3?>, 1)",
                            data: <?php echo $value?>count,
                            },
                        <?php }?>
                        ],
                        },
                        options: {
                          maintainAspectRatio: false,
                          layout: {
                            padding: {
                              left: 10,
                              right: 25,
                              top: 25,
                              bottom: 0
                            }
                          },
                          scales: {
                            xAxes: [{
                              time: {
                                unit: 'month'
                              },
                              gridLines: {
                                display: false,
                                drawBorder: false
                              },
                              ticks: {
                                maxTicksLimit: 6
                              },
                              maxBarThickness: 25,
                            }],
                            yAxes: [{
                              ticks: {
                                min: 0,
                                //max: 15000,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                  return '' + (value);
                                }
                              },
                              gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                              }
                            }],
                          },
                          legend: {
                            display: true
                          },
                          tooltips: {
                            titleMarginBottom: 10,
                            titleFontColor: '#6e707e',
                            titleFontSize: 14,
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                            callbacks: {
                              label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ':' + (tooltipItem.yLabel);
                              }
                            }
                          },
                        }
                      });
                        </script>   
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <?php include("footer.php")?>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito','-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Area Chart
    var ctx = document.getElementById("earningsChart");
    var cty = document.getElementById("countChart");
    var earningsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: amount,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return 'Rs.' + (value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rs.' + (tooltipItem.yLabel);
                    }
                }
            }
        }
    });
  var myBarChart = new Chart(cty, {
  type: 'bar',
  data: {
    labels: months,
    datasets: [{
      label: "Count",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: count,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          //max: 15000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + (value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ':' + (tooltipItem.yLabel);
        }
      }
    },
  }
});
    </script>

</body>

</html>