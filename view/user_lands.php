<?php
include_once "../model/database.php";
include_once "../model/model.php";
include_once "../controller/structure.php";
include_once "../controller/controller.php";
$structure = new Structure();
$admin     = new Controlador();
$user_session     = $_SESSION['usuario'];
$user_session_id   = $user_session['id'];
$admin->RegisterUserLand($user_session_id);
$admin->UpdateUserLand();
$admin->DeletedUserLand();


if (!$admin->isSesion()) {
    header('location:../');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <title>
        Terrenos | Control de Agua
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
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('../assets/img/wallpaper/plantas.png'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <!-- <div class="min-height-300 bg-primary position-absolute w-100"></div> -->
    <?php echo $structure->WorkerMenu(); ?>
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Lands</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0 text-white">Terrenos</h6>
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

            <div class="row mt-lg-4 mt-2">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                            <a data-bs-toggle="modal" data-bs-target="#modelUserLand">
                                <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                <h5 class=" text-secondary"> Nuevo Terreno </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php echo $admin->dataLandsUser($user_session_id); ?>
            </div>

        </div>

        <div class="modal fade" id="modelUserLand" tabindex="-1" aria-labelledby="modelUserLandLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelUserLandLabel">Registrar Terreno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <form class="d-flex p-3" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Medidas</label>
                                        <input class="form-control" type="text" placeholder="Largo" name="ins_user_land_length">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Medidas</label>
                                        <input class="form-control" type="text" placeholder="ancho" name="ins_user_land_wide">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ubicación</label>
                                        <textarea class="form-control" type="text" placeholder="Ubicación" name="ins_user_land_address"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="p-1 d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success">Registar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateUserLand" tabindex="-1" aria-labelledby="updateUserLandLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title" id="updateUserLandLabel">Actualizar Terreno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="update_Userland"></div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deletedUserLand" tabindex="-1" aria-labelledby="deletedUserLandLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h5 class="modal-title" id="deletedUserLandLabel">Solicitud de elimiar terreno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        
                    </div>
                    <div class="modal-body" id="deleted_Userland"></div>
                </div>
            </div>
        </div>

    </main>

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
        $(document).on("click", ".updateUserLand", function() {
            var land_id = $(this).data('id');
            $.ajax({
                url: 'modals/update_user_land.php',
                type: 'POST',
                data: {
                    land_id: land_id
                },
                success: function(data) {
                    $("#update_Userland").html(data);
                    $('#updateUserLand').modal('show');
                }
            })

        });

        $(document).on("click", ".deletedUserLand", function() {
            var land_id = $(this).data('id');
            $.ajax({
                url: 'modals/deleted_user_land.php',
                type: 'POST',
                data: {
                    land_id: land_id
                },
                success: function(data) {
                    $("#deleted_Userland").html(data);
                    $('#deletedUserLand').modal('show');
                }
            })

        });
    </script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>