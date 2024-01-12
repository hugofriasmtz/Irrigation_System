<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();

    if ( isset($_POST['land_id'])  ) {
        $land = $controller->GetLand($_POST['land_id']);
        if ( !is_null( $land ) ) {
            
            $payload = '
            <form class="d-flex p-1" method="POST">
                <div>
                    <input type="hidden" name="land_id" value="'.$land['id'].'">
                    <input type="hidden" name="deleted_land" value="'.$land['id'].'">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h5 class="display-4">El terreno de '.$land['user_id'].'</h5>
                            <p class="lead mb-0 text-sm">Con medidad '.$land['length'].' Largo</p>
                            <p class="lead mb-0 text-sm">Con medidad '.$land['wide'].' Ancho</p>
                            <p class="lead text text-danger ">Sera Eliminado.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </form>
            ';

            echo $payload;

        }else {
            echo "No se puede eliminar El terreno, comunicarse con el administrador";
        }
        
    }



?>