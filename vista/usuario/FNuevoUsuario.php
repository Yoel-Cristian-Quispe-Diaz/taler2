<form action="" id="FRegUsuario">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Usuario</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="">Login Usuario</label>
      <input type="text" class="form-control" name="usuario" id="usuario">
    </div>
    <div class="form-group">
      <label for="">Contraseña</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
      <label for="">Repetir Contraseña</label>
      <input type="password" class="form-control" name="vrPassword" id="vrPassword">
    </div>
    <div class="form-group">
      <label for="">Rol</label>
      <select name="rol" id="rol" class="form-control">
<?php
require_once "../../controlador/rolControlador.php";
require_once "../../modelo/rolModelo.php";
$rol = ControladorRol::ctrInfoRoles();
foreach ($rol as $key => $value) {
  echo '<option value="' . $value["id_rol"] . '">' . $value["nombre"] . '</option>';
}
?>

      </select>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      regUsuario()
    }
  });
  $('#FRegUsuario').validate({
    rules: {
      usuario: {
        required: true,
        minlength: 3
      },
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
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
