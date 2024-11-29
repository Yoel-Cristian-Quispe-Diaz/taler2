<?php
require_once "../../controlador/socioControlador.php";
require_once "../../modelo/socioModelo.php";

require_once "../../controlador/vehiculoControlador.php";
require_once "../../modelo/vehiculoModelo.php";

$id = $_GET["id"];
$vehiculo = ControladorVehiculo::ctrInfoVehiculo($id);
$socios = ControladorSocio::ctrInfoSocios();
?>

<form action="" id="FEditVehiculo">
    <div class="modal-header"
        <h4 class="modal-title">Editar Vehículo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="id_vehiculo" value="<?php echo $vehiculo['id_vehiculo']; ?>">
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" id="color" value="<?php echo $vehiculo['color']; ?>" >
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" name="marca" id="marca" value="<?php echo $vehiculo['marca']; ?>" >
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" class="form-control" name="capacidad" id="capacidad" value="<?php echo $vehiculo['capacidad']; ?>" >
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="1" <?php echo ($vehiculo['estado'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                <option value="0" <?php echo ($vehiculo['estado'] == 'Inactivo') ? 'selected' : ''; ?>>Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_socio">Socio Asociado</label>
            <select name="id_socio" id="id_socio" class="form-control" required>
                <option value="<?php echo $vehiculo['id_socio']; ?>" selected>
                    <?php 
                    $socioActual = ControladorSocio::ctrInfoSocio($vehiculo['id_socio']);
                    echo $socioActual['nombre'];
                    ?>
                </option>
                <?php foreach ($socios as $socio): ?>
                    <?php if ($socio['id_socio'] != $vehiculo['id_socio']): ?>
                        <option value="<?php echo $socio['id_socio']; ?>">
                            <?php echo $socio['nombre']; ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="anio">Año</label>
            <input type="number" class="form-control" name="anio" id="anio" value="<?php echo $vehiculo['anio']; ?>" min="1900" max="<?php echo date('Y'); ?>" required>
        </div>
        <div class="form-group">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" name="placa" id="placa" value="<?php echo $vehiculo['placa']; ?>" required>
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
                editVehiculo();
            }
        });
        $('#FEditVehiculo').validate({
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
