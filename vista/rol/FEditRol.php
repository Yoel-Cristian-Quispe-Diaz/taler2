<!-- FEditRol.php -->

<?php


require_once "../../controlador/rolControlador.php";
require_once "../../modelo/rolModelo.php";

$id = $_GET["id"];
$rol = ControladorRol::ctrInfoRol($id);




?>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="FEditRol">
        <div class="form-group">
            <label for="nombre">Nombre del Rol</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $rol['nombre']; ?>" required>
        </div>
        <input type="hidden" name="id_rol" value="<?php echo $id; ?>">
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary" onclick="editRol()">Actualizar</button>
</div>
