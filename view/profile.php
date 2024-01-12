<?php
 include_once "../model/database.php";
 include_once "../model/model.php";
 include_once "../controller/controller.php";
 include_once "../controller/structure.php";
 $structure = new Structure();
 $admin = new Controlador();
  if (!$admin->isSesion()) {
      header('location:../');
  }
  $user     = $_SESSION['usuario'];
  $userID   = $user['id'];
  $userName = $user['first_names'] . ' ' . $user['last_names'];
  $admin->UpdateUserProfile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>
    Perfil | 
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

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <?php
  
    if ( $_SESSION['usuario']['role_id'] == 2 ) {
        echo $structure->WorkerMenu(); 
    }else {
        echo $structure->UserMenu(); 
    }
  ?>
 
    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
          <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" >Pages</a></li>
                  <li class="breadcrumb-item text-sm text-white active" aria-current="page">Perfil</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Información del Usuaio</h6>
              </nav>
            </div>
          </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
          <div class="row mb-5">
            <div class="col-lg-9 mt-lg-0 mt-4">
              <div class="card card-body" >
                <div class="row ">
                  <div class="col-sm-auto col-4">
                      <div class="avatar avatar-xl position-relative">
                          <img src="../assets/img/team-3.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm"/>
                      </div>
                  </div>
                     <?php  echo $admin->RolProfile( $userID ); ?>
                </div>
              </div>
              <div class="card mt-4" id="basic-info">
                <div class="card-header">
                  <h5>Perfil</h5>
                </div>
                <div class="card-body pt-0">
                  <?php  echo $admin->UserProfile( $userID ); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <div class="modal fade" id="updateUserProfile" tabindex="-1" aria-labelledby="updateUserProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="updateUserProfileLabel">Actualizar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="update_user_profile"></div>
            </div>
        </div>
    </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script type="text/javascript">
    $(document).on("click", ".updateUserProfile", function () {
      var user_id = $(this).data('id');
      $.ajax({
        url:  'modals/update_user_profile.php',
        type: 'POST',
        data: {user_id:user_id},
          success: function (data) {
            $("#update_user_profile").html(data);
            $('#updateUserProfile').modal('show');
          }
        })

    });
  </script>
  
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>