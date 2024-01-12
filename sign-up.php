<?php
include_once "./model/database.php";
include_once "./model/model.php";
include_once "./controller/controller.php";
$usuario = new Controlador();
$usuario->RegisterUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <title>
    Sing In | Irrigation System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content mt-0 ">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h4 class="font-weight-bolder">Registarte </h4>
                  <p class="mb-0">Es rápido y Fácil</p>
                </div>
                <div class="card-body pb-5">
                  <form class="user" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Nombres</label>
                          <input class="form-control" type="text" placeholder="Nombres" name="first_names" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Apellidos</label>
                          <input class="form-control" type="text" placeholder="Apellidos" name="last_names" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Correo</label>
                          <input class="form-control" type="email" placeholder="Nombre" name="email" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Contraseña</label>
                          <input class="form-control" type="password" placeholder="Nombre" name="password" required>
                        </div>
                      </div>
                      <div class="card-body pb-0 text-left">
                          <div class="form-check form-check-info text-left">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                            <label class="form-check-label" for="flexCheckDefault">
                             Acepto los <a href="#" class="text-dark font-weight-bolder">Términos y Condiciones</a>
                            </label>
                          </div>
                        </div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button type="submit" class="btn btn-primary w-50 mt-3 mb-5">Registarme </button>
                      </div> 
                    </div>
                  </form>
                  <div class="card-footer text-center pt-0 px-sm-4 px-1">
                    <p class="mb-4 mx-auto">
                      ¿Ya tienes una cuenta?
                      <a href="./sign-in.php" class="text-primary font-weight-bold">Iniciar sesión</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-6 px-10 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./assets/img/form/Sing-in-amico.png'); background-size: cover;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script src="./assets/js/plugins/dragula/dragula.min.js"></script>
  <script src="./assets/js/plugins/jkanban/jkanban.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>


  <script src="./assets/js/argon-dashboard.min.js?v=2.0.5"></script>
   <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon="{&quot;rayId&quot;:&quot;7d09813ceebbea6c&quot;,&quot;version&quot;:&quot;2023.4.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;1b7cbb72744b40c580f8633c6b62637e&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script> 

</body>

</html>