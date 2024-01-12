<?php
    include_once "../../model/database.php";
    include_once "../../model/model.php";
    include_once "../../controller/structure.php";
    include_once "../../controller/controller.php";
    $controller = new Controlador();

    if ( isset($_POST['user_id'])  ) {
        $user = $controller->GetUser($_POST['user_id']);
        $optionGenero = '';
            if( $user["gener"] === 'MAN'){
                $optionGenero .= '<option value="MAN" selected> Hombre </option>';
                $optionGenero .= '<option value="WOMAN"> Mujer </option>';
            }else{
                $optionGenero .= '<option value="MAN" > Hombre </option>';
                $optionGenero .= '<option value="WOMAN" selected> Mujer </option>';
            }
        if ( !is_null($user) ) {
            $payload = '  <form class="d-flex p-3" method="POST">
                            <div class="card-body">
                                <div class="row">
                                  <input type="hidden" name="update_user" value="'.$user['id'].'">
                                  <input type="hidden" name="upd_user_id" value="'.$user['id'].'">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Nombre</label>
                                      <input class="form-control" type="text" placeholder="Nombres" name="upd_user_first_names_profile" value="'.$user['first_names'].'">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Apellidos</label>
                                      <input class="form-control" type="text" placeholder="Apellidos" name="upd_user_last_names_profile" value="'.$user['last_names'].'">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Fecha de nacimiento</label>
                                      <input class="form-control" type="date" placeholder="21/01/2003" name="upd_user_birthday_profile" value="'.$user['birthday'].'">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Telefono Celular</label>
                                      <input class="form-control" type="text" placeholder="238-000-00-00" name="upd_user_cellphone_profile" value="'.$user['cellphone'].'">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label" >Correo</label>
                                      <input class="form-control" type="text" placeholder="nombre@dominio.com" name="upd_user_email_profile" value="' .$user['email'].'">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="example-text-input" class="form-control-label">Genero</label>
                                        <select class="form-control form-control-user" name="upd_user_gener" required>
                                          <option selected disabled> Selecciona Genero</option>
                                          '.$optionGenero.'
                                        </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-success">Actualizar</button> 
                                </div>
                              </div>
                          </form>
                       ';

            echo $payload;

        }else {
            # code...
        }
        
    }

?>