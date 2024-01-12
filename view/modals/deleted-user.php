<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();

    if ( isset($_POST['user_id'])  ) {

        $user = $controller->GetUser($_POST['user_id']);

        if ( !is_null( $user ) ) {

            $full_name = trim($user['first_names'] .' '. $user['last_names']);
            
            $payload = '
            <form class="d-flex p-3" method="POST">
            <div class="card-body">
                <div class="row">
                    <div>
                        <input type="hidden" name="user_id" value="'.$user['id'].'">
                        <input type="hidden" name="deleted_user" value="'.$user['id'].'">
                        <div class="container">
                            <h4 class="display-8">El usuario '.$full_name.'</h4>
                            <h5 class="text-danger"> Sera eliminado.</h5>
                        </div>
                        
                    </div>
                    <div class="p-2 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
            </form>
            ';

            echo $payload;

        }else {
            echo "No se puede eliminar este usuario, comunicarse con el administrador";
        }
        
    }




?>