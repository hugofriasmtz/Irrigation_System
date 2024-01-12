<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();
    if (($_POST['land_id'] )) {
        $land = $controller->GetLand(($_POST['land_id']));

        if ( !is_null($land) ) {
            
            $payload = '
            <form class="d-flex p-1" method="POST">
              <input type="hidden" name="upd_user_land_id" value="' . $land['id'] . '">
                <div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Largo</label>
                          <input class="form-control" type="text"  name="upd_user_land_length" value="'.$land['length'].'">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Ancho</label>
                          <input class="form-control" type="text"  name="upd_user_land_wide" value="'.$land['wide'].'">
                        </div>
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Ubicación</label>
                        <textarea  class="form-control" type="text"  placeholder="Ubicación" name="upd_user_land_address">'.$land['address'].' </textarea >
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </div>
            </form>
            
            ';

            echo $payload;

        }else {

        }
        
    }

?>