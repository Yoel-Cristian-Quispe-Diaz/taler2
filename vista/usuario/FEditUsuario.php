<?php

require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

$id = $_GET["id"];
$usuario = ControladorUsuario::ctrInfoUsuario($id);

?>
<form action="" id="FEditUsuario">
  <div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Login Usuario</label>
      <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario["usuario"]; ?>" readonly>
      <input type="hidden" name="idUsuario" value="<?php echo $usuario["id_usuario"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Contraseña</label>
      <input type="password" class="form-control" name="password" id="password" value="<?php echo $usuario["password"]; ?>">
    </div>
    <div class="form-group">
      <label for="">Repetir Contraseña</label>
      <input type="password" class="form-control" name="vrPassword" id="vrPassword" value="<?php echo $usuario["password"]; ?>">
      <input type="hidden" value="<?php echo $usuario["password"]; ?>" name="passActual">
    </div>
    <div class="form-group">
      <label for="">Rol</label>
      <select name="rol" id="rol" class="form-control">
        <?php
        require_once "../../controlador/rolControlador.php";
        require_once "../../modelo/rolModelo.php";

        $rol = ControladorRol::ctrInfoRoles();
        foreach ($rol as $key => $value) {
          $selected = ($value["id_rol"] == $usuario["id_rol"]) ? 'selected' : '';
          echo '<option value="' . $value["id_rol"] . '" ' . $selected . '>' . $value["nombre"] . '</option>';
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="">Estado</label>
      <div class="row">
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="estadoActivo" name="estado"
              <?php if ($usuario["estado_usuario"] == 1): ?>checked<?php endif; ?> value="1">
            <label for="estadoActivo" class="custom-control-label">Activo</label>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="estadoInactivo" name="estado"
              <?php if ($usuario["estado_usuario"] == 0): ?>checked<?php endif; ?> value="0">
            <label for="estadoInactivo" class="custom-control-label">Inactivo</label>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editUsuario()
      }
    });
    $('#FEditUsuario').validate({
      rules: {
        password: {
          required: true,
          minlength: 3
        },
        vrPassword: {
          required: true,
          minlength: 3,
          equalTo: "#password" // Verifica que ambas contraseñas coincidan
        },
      },

      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>