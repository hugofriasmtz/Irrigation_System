<?php
include_once "../model/database.php";
include_once "../model/model.php";
include_once "../controller/structure.php";
include_once "../controller/controller.php";
$structure = new Structure();
$admin     = new Controlador();

if (!$admin->isSesion()) {
  header('location:../');
}
$user     = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html lang="es-mx">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">

  <title>
    Inicio |
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <?php echo $structure->Usermenu(); ?>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-white">
              <a class="text-white" href="javascript:;">
                <i class="ni ni-box-2"></i>
              </a>
            </li>
            <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white">Página</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0 text-white">Dashboard</h6>
        </nav>
        <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
          <a href="javascript:;" class="nav-link p-0 text-white">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        </div>
      </div>

    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <?php echo $admin->Cards($user['role_id'], $user['id']); ?>
      </div>
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Información de Pozos</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <?php echo $admin->tableTowers(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="card h-100 ">
            <div class="card-header">
              <h5 class="mb-0 text-capitalize">Usuarios Socios</h5>
            </div>
            <div class="card-body pt-0">
              <?php echo $admin->roleUserFarmers(); ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100 ">
            <div class="card-header">
              <h5 class="mb-0 text-capitalize">Progress track</h5>
            </div>
            <div class="card-body pt-0">
              <ul class="list-group list-group-flush">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto d-flex align-items-center">
                      <a href="javascript:;" class="avatar">
                      <img class="border-radius-lg" alt="Image placeholder" src="../assets/img/team-1.jpg">
                      </a>
                    </div>
                    <div class="col ml-2">
                      <h6 class="mb-0">
                      <a href="javascript:;">John Michael</a>
                      </h6>
                      <small class="text-xs">09:30 AM</small>
                      <small class="text-xs">09:30 AM</small>
                    </div>
                    
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div> 
      </div>
      <div class="row mt-4">

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="card h-100 ">
            <div class="card-header">
              <h5 class="mb-0 text-capitalize">Usuarios Admin</h5>
            </div>
            <div class="card-body pt-0">
              <?php echo $admin->roleUserAdmin(); ?>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4">
          <div class="card h-100 ">
            <div class="card-header">
              <h5 class="mb-0 text-capitalize">Progress track</h5>
            </div>
            <div class="card-body pt-0">
              <ul class="list-group list-group-flush list">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <a href="javascript:;" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="../assets/img/small-logos/logo-jira.svg">
                      </a>
                    </div>
                    <div class="col">
                      <h6>React Material Dashboard</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <a href="javascript:;" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="../assets/img/small-logos/logo-invision.svg">
                      </a>
                    </div>
                    <div class="col">
                      <h6>Argon Design System</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <a href="javascript:;" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="../assets/img/small-logos/logo-spotify.svg">
                      </a>
                    </div>
                    <div class="col">
                      <h6>VueJs Now UI Kit PRO</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <a href="javascript:;" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="../assets/img/small-logos/logo-atlassian.svg">
                      </a>
                    </div>
                    <div class="col">
                      <h6>Soft UI Dashboard</h6>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>  -->
      </div>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card z-index-2">
            <div class="card-header p-3 pb-0">
              <h6>Bar chart</h6>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script src="../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../assets/js/plugins/jkanban/jkanban.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>

  <script>
    // Line chart
    var ctx1 = document.getElementById("myChart")

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Organic Search",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#5e72e4",
            borderColor: "#5e72e4",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6
          },
          {
            label: "Referral",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
          {
            label: "Direct",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 2,
            pointBackgroundColor: "#17c1e8",
            borderColor: "#17c1e8",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [40, 80, 70, 90, 30, 90, 140, 130, 200],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 10,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    // Line chart with gradient
    var ctx2 = document.getElementById("line-chart-gradient").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 10,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    // Doughnut chart
    var ctx3 = document.getElementById("doughnut-chart").getContext("2d");

    new Chart(ctx3, {
      type: "doughnut",
      data: {
        labels: ['Creative Tim', 'Github', 'Bootsnipp', 'Dev.to', 'Codeinwp'],
        datasets: [{
          label: "Projects",
          weight: 9,
          cutout: 60,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#2152ff', '#3A416F', '#f53939', '#a8b8d8', '#5e72e4'],
          data: [15, 20, 12, 60, 20],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });

    // Pie chart
    var ctx4 = document.getElementById("pie-chart").getContext("2d");

    new Chart(ctx4, {
      type: "pie",
      data: {
        labels: ['Facebook', 'Direct', 'Organic', 'Referral'],
        datasets: [{
          label: "Projects",
          weight: 9,
          cutout: 0,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#17c1e8', '#5e72e4', '#3A416F', '#a8b8d8'],
          data: [15, 20, 12, 60],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });

    // Bar chart
    var ctx5 = document.getElementById("bar-chart").getContext("2d");

    new Chart(ctx5, {
      type: "bar",
      data: {
        labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
        datasets: [{
          label: "Sales by age",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: '#3A416F',
          data: [15, 20, 12, 60, 20, 15],
          fill: false,
          maxBarThickness: 35
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: true,
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });

    // Bar chart horizontal
    var ctx6 = document.getElementById("bar-chart-horizontal").getContext("2d");

    new Chart(ctx6, {
      type: "bar",
      data: {
        labels: ['16-20', '21-25', '26-30', '31-36', '36-42', '42+'],
        datasets: [{
          label: "Sales by age",
          weight: 5,
          borderWidth: 0,
          borderRadius: 4,
          backgroundColor: '#3A416F',
          data: [15, 20, 12, 60, 20, 15],
          fill: false
        }],
      },
      options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: true,
              drawTicks: true,
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });

    // Mixed chart
    var ctx7 = document.getElementById("mixed-chart").getContext("2d");

    new Chart(ctx7, {
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            type: "bar",
            label: "Organic Search",
            weight: 5,
            tension: 0.4,
            borderWidth: 0,
            pointBackgroundColor: "#3A416F",
            borderColor: "#3A416F",
            backgroundColor: '#3A416F',
            borderRadius: 4,
            borderSkipped: false,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 10,
          },
          {
            type: "line",
            label: "Referral",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            pointBackgroundColor: "#5e72e4",
            borderColor: "#5e72e4",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            fill: true,
          }
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 10,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    // Bubble chart
    var ctx8 = document.getElementById("bubble-chart").getContext("2d");

    new Chart(ctx8, {
      type: "bubble",
      data: {
        labels: ['0', '10', '20', '30', '40', '50', '60', '70', '80', '90'],
        datasets: [{
            label: 'Dataset 1',
            data: [{
              x: 100,
              y: 0,
              r: 10
            }, {
              x: 60,
              y: 30,
              r: 20
            }, {
              x: 40,
              y: 350,
              r: 10
            }, {
              x: 80,
              y: 80,
              r: 10
            }, {
              x: 20,
              y: 30,
              r: 15
            }, {
              x: 0,
              y: 100,
              r: 5
            }],
            backgroundColor: '#5e72e4',
          },
          {
            label: 'Dataset 2',
            data: [{
              x: 70,
              y: 40,
              r: 10
            }, {
              x: 30,
              y: 60,
              r: 20
            }, {
              x: 10,
              y: 300,
              r: 25
            }, {
              x: 60,
              y: 200,
              r: 10
            }, {
              x: 50,
              y: 300,
              r: 15
            }, {
              x: 20,
              y: 350,
              r: 5
            }],
            backgroundColor: '#3A416F',
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 10,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    // Radar chart
    var ctx9 = document.getElementById("radar-chart").getContext("2d");

    new Chart(ctx9, {
      type: "radar",
      data: {
        labels: ["English", "Maths", "Physics", "Chemistry", "Biology", "History"],
        datasets: [{
          label: "Student A",
          backgroundColor: "rgba(58,65,111,0.2)",
          data: [65, 75, 70, 80, 60, 80],
          borderDash: [5, 5],
        }, {
          label: "Student B",
          backgroundColor: "rgba(203,12,159,0.2)",
          data: [54, 65, 60, 70, 70, 75]
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });

    // Radar chart
    var ctx10 = document.getElementById("polar-chart").getContext("2d");

    new Chart(ctx10, {
      type: "polarArea",
      data: {
        labels: [
          'Red',
          'Green',
          'Yellow',
          'Grey',
          'Blue'
        ],
        datasets: [{
          label: 'My First Dataset',
          data: [11, 16, 7, 3, 14],
          backgroundColor: ['#17c1e8', '#5e72e4', '#3A416F', '#a8b8d8', '#82d616'],
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false,
          }
        }
      }
    });
  </script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon="{&quot;rayId&quot;:&quot;7ca07b60ebe83178&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;1b7cbb72744b40c580f8633c6b62637e&quot;,&quot;si&quot;:100}" crossorigin="anonymous">
  </script>

  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>