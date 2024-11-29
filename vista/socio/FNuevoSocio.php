<form action="" id="FRegSocio">
    <div class="modal-header">
        <h4 class="modal-title">Registro Nuevo Socio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label for="">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" required>
        </div>
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" required>
        </div>
        <div class="form-group">
            <label for="">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" required>
        </div>
        <div class="form-group">
            <label for="">Fecha de Ingreso</label>
            <input type="date" class="form-control" name="fecha_de_ingreso" id="fecha_de_ingreso" required>
        </div>
        <div class="form-group">
            <label for="">Sexo</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoMasculino" value="Masculino" checked>
                <label class="form-check-label" for="sexoMasculino">
                    Masculino
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoFemenino" value="Femenino">
                <label class="form-check-label" for="sexoFemenino">
                    Femenino
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="">Categoría de Licencia</label>
            <select name="categoria_licencia" id="categoria_licencia" class="form-control" required>
                <option value="A">Categoría A</option>
                <option value="B">Categoría B</option>
                <option value="C">Categoría C</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" class="form-control" name="id_usuario" id="id_usuario" required>
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
                regSocio();
            }
        });
        $('#FRegSocio').validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 3
                },
                apellido: {
                    required: true,
                    minlength: 3
                },
                telefono: {
                    required: true,
                    minlength: 7
                },
                fecha_de_ingreso: {
                    required: true
                },
                sexo: {
                    required: true
                },
                categoria_licencia: {
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