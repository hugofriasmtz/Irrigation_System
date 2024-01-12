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

  $admin->RegisterFullUser();
  $admin->UpdateUser();
  $admin->DeletedUser();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <title>
    Registar Usuarios | Control de Agua
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
    <?php  echo $structure->UserMenu(); ?>
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
                    <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white" >Página</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Users</li>
                </ol>
                <h6 class="font-weight-bolder mb-0 text-white">Usuarios</h6>
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

    <div class="container-fluid py-8">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
              <h6>Usuarios</h6>
              <a class="btn btn-icon btn-dark" data-bs-toggle="modal" data-bs-target="#createUser">
                Nuevo Usuario <i class="fas fa-user-plus"></i>  
              </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table p-0">
                <table class="table align-items-center mb-0">
                  
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estatus</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de Registro</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $admin->DataUsers(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createUserLabel">Registro de Usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
              <form class="d-flex p-3" method="POST">
                <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" name="first_names">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                            <input class="form-control" type="text" placeholder="Apellido" name="last_names">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Fecha de nacimiento</label>
                            <input class="form-control" type="date" placeholder="21/01/2003" name="birthday">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Telefono Celular</label>
                            <input class="form-control" type="text" placeholder="238000000" name="cellphone">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label" >Correo</label>
                            <input class="form-control" type="text" placeholder="nombre@dominio.com" name="email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label" >Contraseña</label>
                            <input class="form-control" type="password" placeholder="*******" name="password">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Genero</label>
                              <select class="form-control form-control-user"  name="gener" placeholder="Genero" required>
                                <option selected disabled> Selecciona Genero</option>
                                <option value="WOMAN">Mujer</option>
                                <option value="MAN">Hombre</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg">Registar</button>
                      </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="updateUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="updateUserLabel">Actualizar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="update_user"></div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletedUser" tabindex="-1" aria-labelledby="deletedUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="deletedUserLabel">¿Quiere eliminar este usuario?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="deleted_user"></div>
            </div>
        </div>
    </div>

  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/datatables.js"></script>
  <script src="../assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="../assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable", {
      searchable: true,
      fixedHeight: true
    });
</script>
  <script type="text/javascript">

    $(document).on("click", ".updateUser", function () {
      var user_id = $(this).data('id');
      $.ajax({
        url:  'modals/update-user.php',
        type: 'POST',
        data: {user_id:user_id},
        success: function (data) {
          $("#update_user").html(data);
          $('#updateUser').modal('show');
        }
      })

    });

    $(document).on("click", ".deletedUser", function () {
      var user_id = $(this).data('id');
      $.ajax({
        url:  'modals/deleted-user.php',
        type: 'POST',
        data: {user_id:user_id},
        success: function (data) {
          $("#deleted_user").html(data);
          $('#deletedUser').modal('show');
        }
      })

    });



    </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>


