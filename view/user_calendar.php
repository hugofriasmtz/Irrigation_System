<?php
include_once "../model/database.php";
include_once "../model/model.php";
include_once "../controller/structure.php";
include_once "../controller/controller.php";
$structure = new Structure();
$admin     = new Controlador();
$admin->RegisterFullLand();
$admin->UpdateLand();
$admin->DeletedLand();

if (!$admin->isSesion()) {
    header('location:../');
}

?>
<!DOCTYPE html>
<html lang="en-mx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <title>
        Calendario | Control de Agua
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/kitcss/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <!-- Full Calendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
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
                        <li class="breadcrumb-item text-sm text-white"><a class="opacity-5 text-white">Pagina</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Calendario</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0 text-white">Calendario</h6>
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
            <div class="row mb-lg-7">
                <div class="col-xl-9">
                    <div class="card card-calendar">
                        <div class="card card-calendar">
                            <div class="card-body p-4">
                                <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 mt-xl-0 mt-4">
                            <div class="card">
                                <div class="card-header p-3 pb-0">
                                    <h6 class="mb-0">Opciones </h6>
                                </div>
                                <div class="card-body border-radius-lg p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-danger-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fas fa-check text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Disponible</h6>
                                                <span class="text-sm">Puedes ocuparlo</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-primary-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fas fa-clock text-lg text-warning text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Revición</h6>
                                                <span class="text-sm">Cita en aprobación</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-primary-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fas fa-times text-lg text-danger text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Ocupado</h6>
                                                <span class="text-sm">Elige otro día</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fas fa-stopwatch text-lg text-info text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Horas extras</h6>
                                                <span class="text-sm">Socio compro horas</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-warning-soft shadow text-center border-radius-md shadow-none">
                                                <i class="fas fa-upload text-lg text-dark text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Problemas</h6>
                                                <span class="text-sm">El sistema se esta Actualizando</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-6 mt-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <a href="">
                                        <i class="fa fa-calendar-plus text-secondary mb-2" aria-hidden="true"></i>
                                        <h5 class=" text-secondary"> Agendar </h5>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Inicio:</strong> <span id="modalStart"></span></p>
                        <p><strong>Fin:</strong> <span id="modalEnd"></span></p>
                        <p><strong>Motivo:</strong> <span id="modalDescripcion"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Agregar</button>
                        <button type="button" class="btn btn-success">Modificar</button>
                        <button type="button" class="btn btn-danger">Borrar</button>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div class="modal-body" id="event_id"></div>
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

    <!-- Full Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                url: 'modals/date_json.php',
                type: 'GET',
                success: function(data) {

                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: "es-mx",
                        headerToolbar: {
                            left: 'next today',
                            center: 'title',
                            right: 'dayGridMonth timeGridWeek timeGridDay'
                        },
                        events: data,

                        eventClick: function(events, jsEvent, view) {
                            start_end = new Date(events.event.start).toISOString()
                            soccer = new Date(start_end);

                            console.log(events.event.start);
                            console.log(events.event.end);
                            //console.log(moment(events.event.start).format('YYYY-MM-DD HH:mm:ss'));
                            //console.log(moment(events.event.end).format('YYYY-MM-DD HH:mm:ss'));
                            console.log(events.event.extendedProps.descripcion);

                            $('#modalTitle').text(events.event.title);
                            $('#modalStart').text(moment(events.event.start).format('YYYY-MM-DD HH:mm:ss'));
                            $('#modalEnd').text(moment(events.event.end).format('YYYY-MM-DD HH:mm:ss'));
                            $('#modalDescripcion').text(events.event.extendedProps.descripcion);
                            $('#eventModal').modal('show');
                        }

                    });

                    calendar.render();
                }
            })

            console.log(events_db);

        });
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js"></script>
</body>

</html>