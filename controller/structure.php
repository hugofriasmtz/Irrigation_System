<?php

/* Estructura general de la pataforma*/

class Structure
{

  public function WorkerMenu()
  {
    return '<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./home_worker.php" >
        <i class="fas fa-water class="navbar-brand-icon h-100"></i>
        <span class="ms-2 font-weight-bold">Sistema de Irrigación </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./home_worker.php">
            <div class="  icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-chart-line text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Inicio</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_calendar.php">
            <div class="  icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
               <i class="fas fa-calendar-alt text-sucundary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Calendario</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_lands.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-map-marked-alt text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Terrenos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-user-cog text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Perfil</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./sing_off.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-power-off text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Salir</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>';
  }

  public function Usermenu()
  {
    return '
            <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
              <div class="sidenav-header">
                <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
                <a class="navbar-brand m-0" href="./dashboard.php" >
                  <i class="fas fa-water class="navbar-brand-icon h-100"></i>
                  <span class="ms-2 font-weight-bold">Sistema de Irrigación </span>
                </a>
              </div>
              <hr class="horizontal dark mt-0">
              <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="./dashboard.php">
                      <div class="  icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chart-line text-info text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./users.php">
                      <div class="  icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="fas fa-users text-success text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Usuarios</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./calendar.php">
                      <div class="  icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                         <i class="fas fa-calendar-alt text-sucundary text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Calendario</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./towers.php">
                      <div class="icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-monument text-primary text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Pozos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./lands.php">
                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-map-marked-alt text-warning text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Terrenos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./profile.php">
                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="fas fa-user-cog text-dark text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Perfil</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./sing_off.php">
                      <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-power-off text-danger text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Salir</span>
                    </a>
                  </li>
                </ul>
              </div>
            </aside>';
  }

  public function Footer()
  {
    return ' <footer class="footer pt-3  ">
                      <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                          <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                              for a better web.
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                              </li>
                              <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                  </footer>';
  }
}
