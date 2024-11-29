<?php
require_once "../../controlador/usuarioControlador.php";
require_once "../../modelo/usuarioModelo.php";

require_once "../../controlador/socioControlador.php";
require_once "../../modelo/socioModelo.php";

$socios = ControladorSocio::ctrInfoSocios();
$usuarios = ControladorUsuario::ctrInfoUsuarios();

?>


<form action="" id="FRegVehiculo">
    <div class="modal-header">
        <h4 class="modal-title">Registro de Vehículo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" id="color" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" id="marca" required>
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" class="form-control" name="capacidad" id="capacidad" required>
        </div>
        <div class="form-group">
            <label for="id_socio">Socio</label>
            <select name="id_socio" id="id_socio" class="form-control" required>
                <!-- Cargar socios dinámicamente -->
                <?php foreach ($socios as $socio): ?>
                    <option value="<?php echo $socio['id_socio']; ?>"><?php echo $socio['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" name="anio" id="anio" min="1900" max="<?php echo date('Y'); ?>" required>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" name="placa" id="placa" required>
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
                regVehiculo();
            }
        });
        $('#FRegVehiculo').validate({
            rules: {
                color: {
                    required: true
                },
                marca: {
                    required: true
                },
                capacidad: {
                    required: true,
                    number: true,
                    min: 1
                },
                estado: {
                    required: true
                },
                id_socio: {
                    required: true
                },
                anio: {
                    required: true,
                    number: true,
                    min: 1900,
                    max: new Date().getFullYear()
                },
                placa: {
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
