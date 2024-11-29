<!-- FNuevoRol.php -->

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="FRegRol">
        <div class="form-group">
            <label for="nombre">Nombre del Rol</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary" onclick="regRol()">Registrar</button>
</div>
