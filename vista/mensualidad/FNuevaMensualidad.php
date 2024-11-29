<?php
require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

require_once "../../controlador/socioControlador.php";
require_once "../../modelo/socioModelo.php";

$socios = ControladorSocio::ctrInfoSocios();
$usuarios = ControladorUsuario::ctrInfoUsuarios();

?>


<form action="" id="FRegMensualidad">
    <div class="modal-header">
        <h4 class="modal-title">Registro Nueva Mensualidad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Monto</label>
            <input type="text" class="form-control" name="monto" id="monto" required>
        </div>
        <div class="form-group">
            <label for="">Fecha de Pago</label>
            <input type="date" class="form-control" name="fecha_pago" id="fecha_pago" required>
        </div>
        <div class="form-group">
            <label for="">Descripción</label>
            <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Socio</label>
            <select name="id_socio" id="id_socio" class="form-control" required>
                <!-- Cargar socios dinámicamente desde la base de datos -->
                <?php foreach ($socios as $socio): ?>
                    <option value="<?php echo $socio['id_socio']; ?>"><?php echo $socio['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Usuario Asociado</label>
            <select name="id_usuario" id="id_usuario" class="form-control" required>

                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['usuario']; ?></option>
                <?php endforeach; ?>
            </select>
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
                regMensualidad();
            }
        });
        $('#FRegMensualidad').validate({
            rules: {
                monto: {
                    required: true,
                    number: true
                },
                fecha_pago: {
                    required: true
                },
                id_socio: {
                    required: true
                },
                descripcion: {
                    required: true
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>