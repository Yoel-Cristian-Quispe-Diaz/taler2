<?php
require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

require_once "../../controlador/socioControlador.php";
require_once "../../modelo/socioModelo.php";

require_once "../../controlador/mensualidadControlador.php";
require_once "../../modelo/mensualidadModelo.php";

$id = $_GET["id"];
$mensualidad = ControladorMensualidad::ctrInfoMensualidad($id);
$socios = ControladorSocio::ctrInfoSocios();
$usuarios = ControladorUsuario::ctrInfoUsuarios();

?>


<form action="" id="FEditMensualidad">
    <div class="modal-header">
        <h4 class="modal-title">Editar Mensualidad</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id_cuota" value="<?php echo $mensualidad['id_cuota']; ?>">
        <div class="form-group">
            <label for="">Monto</label>
            <input type="text" class="form-control" name="monto" id="monto" value="<?php echo $mensualidad['monto']; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Fecha de Pago</label>
            <input type="date" class="form-control" name="fecha_pago" id="fecha_pago" value="<?php echo $mensualidad['fecha_pago']; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $mensualidad['descripcion']; ?>" required>
        </div>

        <div class="form-group">
    <label for="">Socio</label>
    <select name="id_socio" id="id_socio" class="form-control" required>
        <!-- Mostrar el socio asociado actualmente -->
        <option value="<?php echo $mensualidad['id_socio']; ?>" selected>
            <?php 
            $socioActual = ControladorSocio::ctrInfoSocio($mensualidad['id_socio']);
            echo $socioActual['nombre']; 
            ?>
        </option>
        <!-- Mostrar los demás socios como opciones adicionales -->
        <?php foreach ($socios as $socio): ?>
            <?php if ($socio['id_socio'] != $mensualidad['id_socio']): // Evitar mostrar el socio actual nuevamente ?>
                <option value="<?php echo $socio['id_socio']; ?>">
                    <?php echo $socio['nombre']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="">Usuario Asociado</label>
    <select name="id_usuario" id="id_usuario" class="form-control" required>
        <!-- Mostrar el usuario asociado actualmente -->
        <option value="<?php echo $mensualidad['id_usuario']; ?>" selected>
            <?php 
            $usuarioActual = ControladorUsuario::ctrInfoUsuario($mensualidad['id_usuario']);
            echo $usuarioActual['usuario']; 
            ?>
        </option>
        <!-- Mostrar los demás usuarios como opciones adicionales -->
        <?php foreach ($usuarios as $usuario): ?>
            <?php if ($usuario['id_usuario'] != $mensualidad['id_usuario']): // Evitar mostrar el usuario actual nuevamente ?>
                <option value="<?php echo $usuario['id_usuario']; ?>">
                    <?php echo $usuario['usuario']; ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
</div>
       

        <div class="form-group">
            <label for="">Socio Asociado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="1" <?php echo ($mensualidad['estado'] == 'pagado') ? 'selected' : ''; ?>>Pagado</option>
                <option value="2" <?php echo ($mensualidad['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                <option value="3" <?php echo ($mensualidad['estado'] == 'atrasado') ? 'selected' : ''; ?>>Atrasado</option>
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
                editMensualidad();
            }
        });
        $('#FEditMensualidad').validate({
            rules: {
                monto: {
                    required: true,
                    number: true
                },
                fecha_pago: {
                    required: true
                },
                descripcion: {
                    required: true
                },
                id_usuario: {
                    required: true
                },
                id_socio: {
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