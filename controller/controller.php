<?php
session_start();

class Controlador {

    private $Model;

    function __construct(){
        $this->Model = new Model();
    }

    public function index(){
        include_once "./index.php";
    }

    public function isSesion(){
        return (isset($_SESSION["usuario"]));
    }

    public function authenticaoltion(){

        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $this->validateAccess($_POST["email"], $_POST["password"]);
        }
    }

    public function validateAccess($username, $password){

        $alerta = ['title' => '', 'body' => '', 'type' => '', 'location' => ''];

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $user = $this->Model->consultUser($username);

        if ($user == TRUE) {
            if (password_verify($password, $user[0]['password'])) {
                $_SESSION['usuario'] = $user[0];
            } else {
                $alerta['title'] = 'La contraseña no es válida.';
                $alerta['body']  = 'Favor de volver a intentar.';
                $alerta['type']  = 'warning';
            }
        } else {
            $alerta['title'] = 'Usuario no registrado';
            $alerta['body']  = 'No tienes acceso a la plataforma.';
            $alerta['type']  = 'error';
        }

        $this->showAlert($alerta);
    }

    public function redirection(){

        $file = ($_SESSION['usuario']['role_id'] == 2) ? "./view/home_worker.php" : "./view/dashboard.php";
        header("Location: {$file}");
    }

    /**** END OF THE LINE ***/

    /*** DASHBOARD-HOME-ADMIN  ***/

        public function Cards($rolID,$UserID){
            $cardcharge = '';

            if ($rolID == 1) {
                $cards = $this->Model->CardsAdmin();
                foreach ($cards as $card => $value){
                    $name  = '';
                    $color = '';
                    $icon  = '';
                    switch($card) {
                        case 'users':        $name = 'Usuarios';            $color = 'success';   $icon = 'fa-users';           break;
                        case 'users_admin':  $name = 'Admin';               $color = 'dark';    $icon = 'fa-user-cog';        break;
                        case 'lands':        $name = 'Total de Terrenos';   $color = 'warning';   $icon = 'fa-map-marked-alt';  break;
                        case 'towers':       $name = 'Total de Pozos';      $color = 'primary';   $icon = 'fa-monument';        break;
                    }
                    $cardcharge .='  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                        <div class="card">
                                            <div class="card-body p-3">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="numbers">
                                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">'.$name.'</p>
                                                            <h4 class="font-weight-bolder">
                                                            '.$value.'
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <div class="icon icon-shape bg-gradient-'.$color.' shadow-primary text-center rounded-circle">
                                                            <i class="fas '.$icon.' text-lg opacity-10" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';

                }
                
            }elseif ($UserID == 2) {
                $cards = $this->Model->CardsUser($UserID);
                foreach($cards as $card =>$value);
                $name  = '';
                $color = '';
                $icon  = '';
                $cardcharge .= '<div class="row">
                                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                        <div class="card">
                                            <div class="card-body p-3">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="numbers">
                                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Todays Money</p>
                                                            <h5 class="font-weight-bolder">
                                                            $53,000
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
            }else {
            echo ('https://img.buzzfeed.com/buzzfeed-static/static/2017-04/28/12/asset/buzzfeed-prod-fastlane-02/sub-buzz-14940-1493397252-2.jpg?downsize=700%3A%2A&output-quality=auto&output-format=auto');
            }

            return $cardcharge;
        }
            /*TABLE USERS*/
                public function roleUserFarmers() {
                    $data = '';
                    $dataRoleUsers = $this->Model->usersFarmersDashboard();
                    foreach ($dataRoleUsers as $key => $dataRoleUser) {
                        $rol = '';
                        $color = '';
                        switch ($dataRoleUser['role_name']) {
                            case 'farmer': $rol = "Socio";     $color = "bg-success";   break;
                        }

                        $data .='  <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto d-flex align-items-center">
                                                <a class="avatar">
                                                    <i class="fas fa-users text-primary text-lg opacity-10"></i>
                                                </a>
                                                </div>
                                                <div class="col ml-2">
                                                <h6 class="mb-0">
                                                    <a>'.$dataRoleUser['full_name'].'</a>
                                                </h6>
                                                <span class="badge badge-sm '.$color.'">'.$rol.'</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>';
                    }
                    return $data; 
                }
                public function roleUserAdmin() {
                    $data = '';
                    $dataRoleUsers = $this->Model->usersAdminDashboard();
                    foreach ($dataRoleUsers as $key => $dataRoleUser) {
                        $rol = '';
                        $color = '';
                        switch ($dataRoleUser['role_name']) {
                            case 'admin': $rol = "Administrador";     $color = "bg-warning";   break;
                        }

                        $data .='  <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            <div class="row align-items-center">
                                                <div class="col-auto d-flex align-items-center">
                                                <a class="avatar">
                                                    <i class="fas fa-user-cog text-dark text-lg opacity-10"></i>
                                                </a>
                                                </div>
                                                <div class="col ml-2">
                                                <h6 class="mb-0">
                                                    <a ">'.$dataRoleUser['full_name'].'</a>
                                                </h6>
                                                <span class="badge badge-sm '.$color.'">'.$rol.'</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>';
                    }
                    return $data; 
                }
            /*END OF THE TABLE USERS */

        public function tableTowers(){
            $data = '';
            $dataTowers = $this->Model->datatowers();
            foreach ($dataTowers as $key => $dataTower ) {
                $countLands = $this->Model->landForTowers($dataTower['id']);
                $status = '';
                $color = '';
                switch ($dataTower['status']) {
                    case 'ACTIVE':   $status = "ACTIVO";    $color = "success";     break;
                    case 'INACTIVE': $status = "INACTIVO";  $color = "warning";     break;
                    case 'DELETED':  $status = "ELIMINADO"; $color = "danger";      break;
                }

                $data .=' <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                <img src="../assets/img/icons/flags/BR.png" alt="Country flag">
                                </div>
                                <div class="ms-4">
                                <p class="text-xs font-weight-bold mb-0">Nombre:</p>
                                <h6 class="text-sm mb-0">'.$dataTower['name'].'</h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Terrenos:</p>
                                    <h6 class="text-sm mb-0">'.$countLands['total'].'</h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">Capacidad:</p>
                                    <h6 class="text-sm mb-0">'.number_format($dataTower['capacity'], 2, ".", ",").' Litros</h6>
                                </div>
                            </td>
                            <td class="align-middle text-sm">
                                <div class="col text-center">
                                    <p class="text-xs font-weight-bold mb-0">Estatus</p>
                                    <h6 class="text-'.$color.' text-sm mb-0">'.$status.'</h6>
                                </div>
                            </td> 
                        </tr>  
                        ';
            }
            return $data;
        }

    /*** END OF THE DASHBOARD-HOME-ADMIN  ***/
    
    /*** DASHBOARD HOME USER ***/
        /*LANDS USER */
            public function dataLandsUser($user_id){
                $info = '';
                
                $datalands = $this->Model->getUserLands($user_id);
                foreach ($datalands as $key => $dataland) {
                    $tower_name = "No se ha asignado una torre de agua.";
                    if (!is_null($dataland['tower_id'])) {
                       $names = $this->Model->TowerByID($dataland['tower_id']);
                       $tower_name =  $names[0]['name'];
                    }
                    $status = '';
        
                    switch ($dataland['status']) {
                        case 'ACTIVE':   $status = "ACTIVA";    $color = "success";  break;
                        case 'INACTIVE': $status = "INACTIVA";  $color = "warning";  break;
                        case 'DELETED':  $status = "ELIMINADA"; $color = "danger";   break;
                    }
        
                    $info .= '<div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <div class="avatar avatar-xl bg-gradient-success border-radius-md p-2">
                                                    <img src="../assets/img/icons/campo.png" alt="campo_log">
                                                </div>
                                                <div class="ms-3 my-auto">
                                                    <h6>Terreno</h6>
                                                    
                                                </div>
                                                <div class="ms-auto">
                                                    <div class="dropdown">
                                                        <button class="btn btn-link text-secondary ps-0 pe-2" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v text-lg" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3" aria-labelledby="navbarDropdownMenuLink">
                                                            <a data-id="'.$dataland['id'].'" class="dropdown-item updateUserLand"  >Actualizar</a>
                                                            <a data-id="'.$dataland['id'].'" class="dropdown-item deletedUserLand" >Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-sm mt-3">'.$dataland['address'].' </p>
                                            <hr class="horizontal dark">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-secondary text-sm font-weight-bold mb-0">Largo:  '.$dataland['wide'].' metros </p>
                                                    <p class="text-secondary text-sm font-weight-bold mb-0">Ancho: '.$dataland['length'].' metros</p>
                                                    <p class="text-secondary text-sm font-weight-bold mb-0">Estado: <samll class="text-'.$color.' text-sm font-weight-bold mb-0">'.$status.'</samll> </p>
                                                    <p class="text-secondary text-sm font-weight-bold mb-0">Pozo: '.$tower_name.'  </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> ';
                                
                }
                return $info;
                
            }

            public function RegisterUserLand($user_id) {
                $alert      = ['title' => '', 'body' => '', "type" => '', 'location' => ''];
                $array_post = $_POST;
                if ( isset($array_post['ins_user_land_length']) && isset($array_post['ins_user_land_wide']) && isset($array_post['ins_user_land_address']) && $user_id > 0 ) {
                    $values= [$user_id, $array_post['ins_user_land_length'], $array_post['ins_user_land_wide'],$array_post['ins_user_land_address'], 'ACTIVE'];
                    $resultInsert   = $this->Model->inserUserLands($values);
                    if ($resultInsert == true) {
                        $alert['title'] = 'Se registró exitosamente el Terreno.';
                        $alert['body']  = "Favor de validar con el Administrador";
                        $alert['type']  = "success";
                    } else {
                        $alert['title'] = 'ERROR';
                        $alert['body']  = "Intente registrar más tarde el Terreno";
                        $alert['type']  = "error";
                    }
                    $this->showAlert($alert);
                }
            }
            public function DeletedUserLand(){

                $alert  = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
                $array_post = $_POST;
                if (isset($array_post['d_user_land_id']) ) {
                    $date   = new DateTime();
                    $values = [ $date->format("Y-m-d H:i:s") ,$array_post['d_user_land_id'] ];
        
                    $resultInsert = $this->Model->DeletedLand($values);
                    if ($resultInsert == true) {
                        $alert['title']     = 'Felicidades';
                        $alert['body']      = "Terreno se elimino con exito";
                        $alert['type']      = "success";
                        $alert['location']  = "lands.php";
                    } else {
                        $alert['title'] = 'ERROR';
                        $alert['body']  = "Intente eliminar el Terreno más tarde";
                        $alert['type']  = "error";
                    }
        
                    $this->showAlert($alert);
                }
            }
            public function UpdateUserLand(){
                $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
                $array_post = $_POST;
                if (isset($array_post['upd_user_land_id']) && isset($array_post['upd_user_land_length']) && isset($array_post['upd_user_land_wide']) && isset($array_post['upd_user_land_address']) ) {         
                    $datos =[ $array_post['upd_user_land_length'], $array_post['upd_user_land_wide'],$array_post['upd_user_land_address'],$array_post['upd_user_land_id']];
                    $resultInsert = $this->Model->UpdateUserLand($datos);
                    if ($resultInsert == true) {
                        $alert['title']     = 'Felicidades';
                        $alert['body']      = "El Terreno se actualizo con exito";
                        $alert['type']      = "success";
                        $alert['location']  = "lands.php";
                    } else {
                        $alert['title'] = 'ERROR';
                        $alert['body']  = "Intente Actualizar los datos más tarde";
                        $alert['type']  = "error";
                    }
        
                    $this->showAlert($alert);
                }
            }

        /*END OF THE LANDS USER */
        /*PROFILE USER */
            public function UpdateUserProfile(){
                $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
                $array_post = $_POST;    
                if (isset($array_post['upd_user_id']) ) {
                    
                    $birthday   = date_format(date_create($array_post['upd_user_birthday_profile']),"Y-m-d");
                    $values     = [ $array_post['upd_user_first_names_profile'] , $array_post['upd_user_last_names_profile'],$array_post['upd_user_gener'],$birthday,
                    $array_post['upd_user_cellphone_profile'],$array_post['upd_user_email_profile'],$array_post['upd_user_id']];
                
                    $resultInsert = $this->Model->UpdateProfile($values);
                    if ($resultInsert == true) {
                        $alert['title']     = 'Felicidades';
                        $alert['body']      = "Tu perfil se actualizo con exito";
                        $alert['type']      = "success";
                        $alert['location']  = "user_profile.php";
                    } else {
                        $alert['title'] = 'ERROR';
                        $alert['body']  = "Intente actualizar los datos más tarde";
                        $alert['type']  = "error";
                    }
        
                    $this->showAlert($alert);
                }
            }
        /*END OF THE PROFILE USER */
        /*CALENDAR USER */
            public function DataUserCalendar(){

                $contents = $this->Model->DateCalendarUser();
                $json = json_encode($contents);
                return $json;
            }
        /*END OF THE CALENDAR USER */
    /*** END OF THE DASHBOARD HOME USER ***/

    /*RECORDS*/
        public function RegisterUser(){

            $alert = ['title' => '', 'body' => '', 'type' => '', 'location' => ''];

            if (isset($_POST['password']) && isset($_POST['email'])) {

                $result     = $this->Model->FindUserByEmail($_POST['email']);
                //empty: valida si la variable esta vacia, devuelve true o false.

                if (empty($result) == true) {
                    //Registrar usuario
                    $password       = password_hash($_POST['password'], PASSWORD_ARGON2I); // pasar la contraseña a un hash
                    $resultInsert   = $this->Model->insertUser([2, $_POST['email'], $password, $_POST['first_names'], $_POST['last_names'], 'ACTIVE']);

                    if ($resultInsert == true) {

                        $alert['title']     = 'Registro exitoso';
                        $alert['body']      = 'Ya puedes ingresar a la platafroma';
                        $alert['type']      = 'success';
                        $alert['location']  = 'login.php';
                    }
                } else {

                    $alert['title'] = 'ERROR';
                    $alert['body']  = 'El correro ya esta registrado';
                    $alert['type']  = 'error';
                }

                $this->showAlert($alert);
            }
        }

        public function RegisterFullUser(){

            $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
        
            if (isset($_POST['password']) && isset($_POST['email'])) {
                

                $exist  = $this->Model->FindUserByEmail($_POST['email']);

                if (empty($exist) == true) {

                    $password       = password_hash($_POST['password'], PASSWORD_ARGON2I); // pasar la contraseña a un hash
                    $resultInsert   = $this->Model->inserFulltUser([2, $_POST['email'], $password, $_POST['first_names'], $_POST['last_names'], $_POST['gener'], $_POST['birthday'],$_POST['cellphone'], 'ACTIVE']);

                    if ($resultInsert == true) {

                        $alert['title']     = strtoupper($_POST['first_names']) . ' ' . strtoupper($_POST['last_names']);
                        $alert['body']      = "Se registró exitosamente.";
                        $alert['type']      = "success";
                        $alert['location']  = "users.php";
                    } else {
                        $alert['title'] = 'ERROR';
                        $alert['body']  = "Intente registrar más tarde al usuario";
                        $alert['type']  = "error";
                    }
                } else {

                    $alert['title'] = 'ERROR';
                    $alert['body']  = "Ya existe un usuario registrado con ese correo";
                    $alert['type']  = "error";
                }

                $this->showAlert($alert);
            }
        }

        public function RegisterFullTower() {

            $alert      = ['title' => '', 'body' => '', "type" => '', 'location' => ''];

            if ( isset($_POST['name']) && isset($_POST['address']) && !isset($_POST['update_tower']) && !isset($_POST['tower_id'])  ) {
                $values= [$_POST['name'],$_POST['capacity'], $_POST['hours'], $_POST['address'], 'ACTIVE'];
                $resultInsert   = $this->Model->inserTowers($values);
                if ($resultInsert == true) {
                    $alert['title'] = 'Se registró exitosamente el Pozo.';
                    $alert['body']  = "Favor de validar con el Administrador";
                    $alert['type']  = "success";
                } else {
                    $alert['title'] = 'ERROR';
                    $alert['body']  = "Intente registrar más tarde el Pozo";
                    $alert['type']  = "error";
                }
                

                $this->showAlert($alert);
            }
        }

        public function RegisterFullLand() {
            $alert      = ['title' => '', 'body' => '', "type" => '', 'location' => ''];
                
            if ( isset($_POST['user_id']) && isset($_POST['tower_id']) && !isset($_POST['update_land']) && !isset($_POST['land_id']) ) {
                $values= [$_POST['user_id'],$_POST['tower_id'], $_POST['length'], $_POST['wide'],$_POST['address'], 'ACTIVE'];
                $resultInsert   = $this->Model->inserLands($values);
                if ($resultInsert == true) {
                    $alert['title'] = 'Se registró exitosamente el Terreno.';
                    $alert['body']  = "Favor de validar con el Administrador";
                    $alert['type']  = "success";
                } else {
                    $alert['title'] = 'ERROR';
                    $alert['body']  = "Intente registrar más tarde el Terreno";
                    $alert['type']  = "error";
                }
                

                $this->showAlert($alert);
            }
        }
        public function RegisterFullCalendar() {
            $alert      = ['title' => '', 'body' => '', "type" => '', 'location' => ''];
            $post = $_POST;
            if ( isset($post['irrigation_id']) && isset($post['calendar_title']) && isset($post['calendar_day']) && isset($post['calendar_hour_start']) && isset($post['calendar_hour_end']) && isset($post['calendar_description']) ) {
                $values= [$post['irrigation_id'],$post['day'], $post['hour_start'],$post['hour_end'],$post['title'],$post['description'],'ORANGE', 'REVIEW'];
                $resultInsert   = $this->Model->inserDateCalendar($values);
                if ($resultInsert == true) {
                    $alert['title'] = 'La cita seagendo exitosamente en el calendario.';
                    $alert['body']  = "Favor de validar con el Administrador";
                    $alert['type']  = "success";
                } else {
                    $alert['title'] = 'ERROR';
                    $alert['body']  = "Intente agendar más tarde el Terreno";
                    $alert['type']  = "error";
                }
                

                $this->showAlert($alert);
            }
        }
    

    /*** END ON THE RECORDS  ***/

    /*** DATA OF USERS, TOWERS AND LANDS  ***/
        public function DataUsers(){
            $info = '';
            $datauser = $this->Model->dataUsers();
            foreach ($datauser as $key => $datauser) {

                $status = '';
                $color = '';

                switch ($datauser['status']) {
                    case 'ACTIVE':   $status = "Activo";    $color = "success";  break;
                    case 'INACTIVE': $status = "Inactivo";  $color = "warning"; break;
                    case 'DELETED':  $status = "Eliminado"; $color = "danger"; break;
                }

                $info .= '<tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                        <img src="../assets/img/team-1.jpg" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">'. $datauser['full_name'] .'</h6>
                                        <p class="text-xs text-secondary mb-0">'. $datauser['email'] .'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="badge badge-sm bg-gradient-'.$color.'">'. $status .'</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">'.$datauser['created'].'</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="ms-auto text-center">
                                        <a data-id="'.$datauser['id'].'" class="btn btn-link text-danger px-3 mb-0 deletedUser">
                                            <i class="fas fa-user-times me-2"></i>
                                        </a>
                                        <a data-id="'.$datauser['id'].'" class="btn btn-link text-dark px-3 mb-0 updateUser">
                                            <i class="fas fa-user-edit text-success text-sm opacity-10" aria-hidden="true"></i>
                                        </a>   
                                    </div>  
                                </td>
                        </tr>';
            }
            
            return $info;
        }
        public function Datatowers() {
            $info = '';
            
            $datatowers = $this->Model->datatowers();
            foreach ($datatowers as $key => $datatower) {
                $status = '';

                switch ($datatower['status']) {
                    case 'ACTIVE':   $status = "ACTIVA";    $color = "success";  break;
                    case 'INACTIVE': $status = "INACTIVA";  $color = "warning";  break;
                    case 'DELETED':  $status = "ELIMINADA"; $color = "danger";   break;
                }

                $info .='<li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">Pozo: '.$datatower['name'].'</h6>
                                <span class="mb-2 text-xs">Dirección:<span class="text-dark font-weight-bold ms-sm-2">'.$datatower['ubication'].'</span></span>
                                <span class="mb-2 text-xs">Capacidad: <span class="text-dark ms-sm-2 font-weight-bold">'.$datatower['capacity'].' Litros</span></span>
                                <span class="mb-2 text-xs">Horas: <span class="text-dark ms-sm-2 font-weight-bold">'.$datatower['hours'].' Horas</span></span>
                                <span class="text-xs">Estatus: <span class="text-'.$color.' ms-sm-2 font-weight-bold">'.$status.'</span></span>
                            </div>
                            <div class="ms-auto text-end">
                                <a data-id="'.$datatower['id'].'" class="btn btn-link text-danger  px-3 mb-0 deleteTower"><i class="far fa-trash-alt me-2"></i>Eliminar</a>
                                <a data-id="'.$datatower['id'].'" class="btn btn-link text-success px-3 mb-0 updateTower"><i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>Actualizar</a>
                                
                            </div>
                        </li>';
            }
            return $info;
        }
        public function DataLands() {
            $info = '';

            $datalands = $this->Model->datalands();
            foreach ($datalands as $key => $dataland) {
                $status = '';
                // $tower_name = "No se ha asignado Pozo.";
                //         if (!is_null($dataland['tower_id'])) {
                //            $names = $this->Model->TowerByID($dataland['tower_id']);
                //            $tower_name =  $names[0]['name'];
                //         }

                switch ($dataland['status']) {
                    case 'ACTIVE':   $status = "ACTIVA";    $color = "success";  break;
                    case 'INACTIVE': $status = "INACTIVA";  $color = "warning";  break;
                    case 'DELETED':  $status = "ELIMINADA"; $color = "danger";   break;
                }

                $info .= '<tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                        <img src="../assets/img/team-1.jpg" class="avatar avatar-sm me-3" alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">'. $dataland['full_name'] .'</h6>
                                        <p class="text-xs text-'.$color.' mb-0">'. $status .'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                        <div class="d-flex px-4 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="mb-0 text-sm ">'.$dataland['length'].'mts de Largo</p>
                                                <p class="mb-0 text-sm">'.$dataland['wide'] .'mts de Ancho</p>
                                            </div>
                                        </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="d-flex px-4 py-2">
                                        <div class="d-flex flex-column justify-content-center">
                                            <span class="mb-2 text-sm">'.$dataland['name'].'</span>
                                            <p class="badge badge-sm bg-gradient-'.$color.'"">'. $status .'</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class=" badge badge-sm bg-gradient-'.$color.'">'. $status .'</span>
                                </td>
                                
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">'.$dataland['created'].'</span>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="ms-auto text-end">
                                        <a data-id="'.$dataland['id'].'" class="btn btn-link text-danger px-2 mb-1 deletedLand">
                                            <i class="far fa-trash-alt me-2"></i>
                                        </a>
                                        <a data-id="'.$dataland['id'].'" class="btn btn-link text-dark px-2 mb-1 updateLand">
                                            <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                                        </a>   
                                    </div>  
                                </td>
                            </tr>';
            }
            return $info;
            
        }
    /*** END ON THE DATA OF USERS, TORREZ AND LANDS ***/

    public function UsersByStatus(string $status = 'ACTIVE') {
        $options = '';
        $users = $this->Model->findUsersByStatus($status);

        foreach ($users as $key  =>  $user) {
            $options .= '<option value="' . $user['id'] . '">' . $user['full_name'] . '</option>';
        }
        return '<select class="form-control form-control-user" name="user_id" required>
                    <option selected disabled value="0">Selecciona el usuario</option>'. $options .'
                </select>';
    }

    public function TowersByStatus(string $status = 'ACTIVE') {
        $options = '';
        $towers = $this->Model->findTowersByStatus($status);

        foreach ($towers as $key  =>  $tower) {
            $options .= '<option value="' . $tower['id'] . '">' . $tower['name'] . '</option>';
        }
        return '<select class="form-control form-control-user" name="tower_id" required>
                    <option selected disabled value="0">Selecciona el Pozo</option>'. $options .'
                </select>';
    }
    public function GetTowerSelect($tower_id) {
        $options = '';
        $towers = $this->Model->findTowersByStatus('ACTIVE');

        foreach ($towers as $key  =>  $tower) {
            if ($tower_id === $tower['id']) {
                $options .= '<option value="' . $tower['id'] . '" selected>' . $tower['name'] . '</option>';
            }else {
                $options .= '<option value="' . $tower['id'] . '">' . $tower['name'] . '</option>';
            }
        }
        return '<select class="form-control form-control-user" name="tower_id" required>
                    <option selected disabled value="0">Selecciona el Pozo</option>'. $options .'
                </select>';
    }
    
    public function UserProfile($UserID){

        $payload = '';
        $profile   = $this->Model->GetProfileWorker($UserID);

        if ( !empty( $profile ) ) {

            foreach ($profile as $p) { 
                $gener = $p["gener"] == 'MAN' ? 'Hombre' : 'Mujer';
                $payload .= 
                        '
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Nombres</label>
                                    <div class="input-group">
                                        <input name="first_names" class="form-control "  type="text" value="'.$p['first_names'].'" disabled   />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Apellidos</label>
                                    <div class="input-group">
                                        <input name="last_names"class="form-control" type="text" value="'.$p['last_names'].'" disabled  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <label class="form-label mt-4">Genero</label>
                                <div class="input-group">
                                    <input name="gener"class="form-control" type="text" value="'.$gener.'" disabled  />
                                </div>
                                </div>
                                <div class="col-4">
                                <label class="form-label mt-4">Tel. Celular</label>
                                <div class="input-group">
                                    <input name="cellphone"class="form-control" type="number" value="'.$p['cellphone'].'" disabled  />
                                </div>
                                </div>
                                <div class="col-4">
                                <label class="form-label mt-4">Fecha de Nacimiento</label>
                                <div class="input-group">
                                    <input name="birthday"class="form-control" type="date" value="'.$p['birthday'].'" disabled  />
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label mt-4">Correo</label>
                                    <div class="input-group">
                                    <input   name="email" class="form-control"type="text" value="'.$p['email'].'" disabled   />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mt-4">Fecha de Registro</label>
                                    <div class="input-group">
                                    <input name="created" class="form-control"type="text" value="'.$p['created'].'" disabled   />
                                    </div>
                                </div>
                            </div>
                        ';
            }

        }else {
            
            $profile   = $this->Model->GetProfileAdmin($UserID);

            foreach ($profile as $p) { 
                $payload .= '
                <p class="text-uppercase text-sm">Infomación</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Nombres</label>
                      <input class="form-control" type="text" name="first_names" value="'.$p['first_names'].'">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Apellidos</label>
                      <input class="form-control" type="email" name="last_names" value="'.$p['last_names'].'">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Correo</label>
                      <input class="form-control" type="text" name="email" value="'.$p['email'].'">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Fecha de nacimiento</label>
                      <input class="form-control" type="date" name="birthday" value="'.$p['birthday'].'">
                    </div>
                  </div>
                </div>
                ';
            }
            
        }

        return $payload;
        
    }

    public function RolProfile($UserID){
        $name = ''; 
        $profile   = $this->Model->RolProfileWorker($UserID);
        foreach($profile as $p){
            
            $name .= '  <div class="col-sm-auto col-8 ">
                          <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">'.$p['full_name'].'</h5>
                            <p class="mb-0 font-weight-bold text-sm">'.$p['name'].'</p>
                            <p class="mb-0 font-weight-bold text-sm">'.$p['description'].'</p>
                          </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-3 mt-0 d-flex">
                            <button data-id="'.$p['id'].'" class="btn btn-success updateUserProfile"  type="submit" >Actualizar </button>
                        </div>         
            ';
            }

        return $name;
    }
   
    public function GetTower( $id ) {
        
        $tower = $this->Model->TowerByID( $id );

        if ( !empty( $tower ) ) {
            return $tower[0];
        }
        
        return null;
    }

    public function GetUser( $id ) {
        
        $user = $this->Model->UserById( $id );
        if ( !empty( $user ) ) {
            return $user[0];
        }
        return null;
    }

    public function GetLand( $id ) {
        
        $land = $this->Model->LandById( $id );
        if ( !empty( $land ) ) {
            return $land[0];
        }
        return null;
    }
 

    /*** UPDATE  ***/
    public function UpdateUser(){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
            
        if (isset($_POST['update_user']) && isset($_POST['user_id']) ) {
           
            $date       = new DateTime();
            $birthday   = date_format(date_create($_POST['birthday']),"Y-m-d");
            $values     = [ $_POST['first_names'] , $_POST['last_names'],$_POST['gener'], $birthday, $_POST['cellphone'],$_POST['email'],$date->format("Y-m-d H:i:s"),$_POST['user_id']];
          
            $resultInsert = $this->Model->UpdateUser($values);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "La informacion fue actualizada con exito";
                $alert['type']      = "success";
                $alert['location']  = "users.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente Actualizar los datos más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }  
    public function UpdateProfile(){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];
            $array_post = $_POST;
        if (isset($_POST['upd_profile_id']) ) {
           
            $birthday   = date_format(date_create($array_post['upd_birthday_profile']),"Y-m-d");
            $values     = [ $array_post['upd_first_names_profile'] , $array_post['upd_last_names_profile'],$array_post['upd_gener'],$birthday,
            $array_post['upd_cellphone_profile'],$array_post['upd_email_profile'],$array_post['upd_profile_id']];
          
            $resultInsert = $this->Model->UpdateProfile($values);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "La informacion fue actualizada con exito";
                $alert['type']      = "success";
                $alert['location']  = "profile.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente Actualizar los datos más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    public function UpdateLand(){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['update_land']) && isset($_POST['land_id']) ) {         
            $datos =[$_POST['user_id'],$_POST['tower_id'], $_POST['length'], $_POST['wide'],$_POST['address'],$_POST['update_land']];
            
            $resultInsert = $this->Model->UpdateLand($datos);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "El Terreno se actualizada con exito";
                $alert['type']      = "success";
                $alert['location']  = "lands.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente Actualizar los datos más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    public function UpdateTower(){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['update_tower']) && isset($_POST['tower_id']) ) {
            $datos =[$_POST['name'],$_POST['address'], $_POST['capacity'], $_POST['hours'],$_POST['tower_id']];
          
            $resultInsert = $this->Model->UpdateTower($datos);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "La informacion fue actualizada con exito";
                $alert['type']      = "success";
                $alert['location']  = "farms.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente Actualizar los datos más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    /*** END UPDATE ***/

    
    /***DELETED ***/
    public function DeletedTower(){

        $alert  = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['deleted_tower']) && isset($_POST['tower_id']) ) {

            $date   = new DateTime();
            $values = [ $date->format("Y-m-d H:i:s"),$_POST['tower_id'] ];

            $resultInsert = $this->Model->DeletedTower($values);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "El pozo se elimino con exito";
                $alert['type']      = "success";
                $alert['location']  = "towers.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente eliminar el pozo más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    public function DeletedLand(){

        $alert  = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['deleted_land']) && isset($_POST['land_id']) ) {
            $date   = new DateTime();
            $values = [ $date->format("Y-m-d H:i:s") ,$_POST['land_id'] ];

            $resultInsert = $this->Model->DeletedLand($values);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "El Terreno se elimino con exito";
                $alert['type']      = "success";
                $alert['location']  = "lands.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente eliminar el Terreno más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    public function DeletedUser(){

        $alert  = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['deleted_user']) && isset($_POST['user_id']) ) {

            $date   = new DateTime();
            $values = [ $date->format("Y-m-d H:i:s"),'DELETED' ,$_POST['user_id'] ];

            $resultInsert = $this->Model->DeletedUser($values);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades';
                $alert['body']      = "El usuario se elimino con exito";
                $alert['type']      = "success";
                $alert['location']  = "farms.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente eliminar la granja más tarde";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }
    /***END DELETED ***/


    public function FormuarioActualizarUsuario($user_id){
        $modal = '';
        $resultdb = $this->Model->findUserByid($user_id);
        foreach ($resultdb as $key  =>  $result) {
            $optionGenero = '';
            if( $result["gener"] === 'MAN'){
                $optionGenero .= '<option value="MAN" selected> Hombre </option>';
                $optionGenero .= '<option value="WOMAN"> Mujer </option>';
            }else{
                $optionGenero .= '<option value="MAN" > Hombre </option>';
                $optionGenero .= '<option value="WOMAN" selected> Mujer </option>';
            }
            $modal = '<div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 ">
                                <form class="user" method="POST" >
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" name="first_name" placeholder="Nombres" value="' . $result['first_names'] . '">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" name="last_names" placeholder="Apellido" value="' . $result['last_names'] . '">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input class="form-control form-control-user" type="date" name="birthday" value="' . $result['birthday'] . '" min="1900-01-01" max="2030-12-31">
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="form-control form-control-user" name="gener" placeholder="Genero" required>
                                                <option disabled>Genero</option>
                                                '.$optionGenero.'
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <input type="text" class="form-control form-control-user" name="cellphone" placeholder="Numero de Celular" value="' . $result['cellphone'] . '">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="email" class="form-control form-control-user" name="email" placeholder="Correo" value="' . $result['email'] . '">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        
                                    </div>
                                        
                                </form>
                            </div>
                        </div>
                    </div>';
        }
        return $modal;
    }
  
    public function ActualizarUsuario($User){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['first_name']) && isset($_POST['last_names']) && isset($_POST['birthday']) && isset($_POST['gener']) && isset($_POST['cellphone'])) {

            // var_dump("<pre>");
            // print_r($_POST); 
            //  print_r($User['id']);
            // exit;
            $birthday = date_format(date_create($_POST['birthday']),"Y-m-d");
            
            $datos =[$_POST['first_name'], $_POST['last_names'], $_POST['gener'], $birthday,$_POST['cellphone'],$User['id']];
          
            $resultInsert = $this->Model->ActualizarDatosUser($datos);
            if ($resultInsert == true) {
                $alert['title']     = 'Felicidades ' . $datos[0] . ' ' . $datos[1];
                $alert['body']      = "Tu Datos fueron Actualizados con exito";
                $alert['type']      = "success";
                $alert['location']  = "profile.php";
            } else {
                $alert['title'] = 'ERROR';
                $alert['body']  = "Intente Actualizar más tarde tus Datos";
                $alert['type']  = "error";
            }

            $this->showAlert($alert);
        }
    }

    public function ActualizarContraseña($userID){
        $alert      = ['title' => '', 'body' => "", "type" => '', 'location' => ''];

        if (isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['repitpassword'])) {
            
            if ($_POST['newpassword'] == $_POST['repitpassword']) {

                $user = $this->Model->findUserByid($userID);
                
                if (password_verify($_POST['newpassword'], $user[0]['password'])) {
                    $alert['title'] = 'ERROR';
                    $alert['body']  = "La contraseña nuevano puedeser igual a la contraseña actual";
                    $alert['type']  = "waring";
                }else{
                    if (password_verify($_POST['password'], $user[0]['password'])) {
                        $password       = password_hash($_POST['newpassword'], PASSWORD_ARGON2I); // pasar la contraseña a un hash 
                        $resultado =$this->Model->actulizarContraseña([$password,$userID]);
                        if ($resultado == true) {
                            $alert['title'] = 'Actualizacion Exitosa!';
                            $alert['body']  = "Tu contraseña fue actualizada";
                            $alert['type']  = "success";
                        }else{
                            $alert['title'] = 'ERROR';
                            $alert['body']  = "No se pudo actualizar tu contraseña intenta mas tarde";
                            $alert['type']  = "error";
                        }
                    }else{
                        $alert['title'] = 'la contraseña incorrecta';
                        $alert['body']  = "Verifique que la contraseña sea la misma con la que inicias sesion";
                        $alert['type']  = "waring";
                    }
                }

            }else{
                
                $alert['title'] = 'La Nueva contraseña no coencide';
                $alert['body']  = "Verifique que las contraseñas esten escritas correctamente ";
                $alert['type']  = "waring";
            }

            $this->showAlert($alert);
        }
    }

    
    private function showAlert($alerta) {

        $alert = '';

        $alert .= '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        $alert .= '<script type="text/javascript">';

        $alert .= 'setTimeout(function () { 
            Swal.fire(
                "' . $alerta['title'] . '",
                "' . $alerta['body'] . '",
                "' . $alerta['type'] . '",
            ); }, 100)';
        $alert .= '</script>';

        /*if( $alerta['location'] != '' ){
            //sleep(30);
            $alert .="<script> setTimeout(window.location = '{$alerta['location']}' , 2000);</script>";
        }*/
        echo $alert;
    }
}


