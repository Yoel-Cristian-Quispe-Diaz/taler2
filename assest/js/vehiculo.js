function MNuevoVehiculo() {
    $("#modal-default").modal("show");

    var obj = "";
    $.ajax({
        type: "POST",
        url: "vista/vehiculo/FNuevoVehiculo.php",
        data: obj,
        success: function(data) {
            $("#content-default").html(data);
        }
    });
}

function regVehiculo() {
    var formData = new FormData($("#FRegVehiculo")[0]);

    $.ajax({
        type: "POST",
        url: "controlador/vehiculoControlador.php?ctrRegVehiculo",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data == "ok") {
                Swal.fire({
                    icon: 'success',
                    title: "Registro Exitoso",
                    showConfirmButton: false,
                    timer: 1000
                });

                setTimeout(function() {
                    location.reload();
                }, 1200);
            } else {
                Swal.fire({
                    title: "Error",
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        }
    });
}

function MEditVehiculo(id) {
    $("#modal-default").modal("show");

    var obj = "";
    $.ajax({
        type: "POST",
        url: "vista/vehiculo/FEditVehiculo.php?id=" + id,
        data: obj,
        success: function(data) {
            $("#content-default").html(data);
        }
    });
}

function editVehiculo() {
    var formData = new FormData($("#FEditVehiculo")[0]);

    $.ajax({
        type: "POST",
        url: "controlador/vehiculoControlador.php?ctrEditVehiculo",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data == "ok") {
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: "Vehículo Actualizado",
                    timer: 1000
                });

                setTimeout(function() {
                    location.reload();
                }, 1200);
            } else {
                Swal.fire({
                    title: "Error",
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        }
    });
}

function MEliVehiculo(id) {
    var obj = { id: id };

    Swal.fire({
        title: "¿Estás seguro de eliminar este vehículo?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirmar',
        denyButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "controlador/vehiculoControlador.php?ctrEliVehiculo",
                data: obj,
                success: function(data) {
                    console.log(data);
                    if (data == "ok") {
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            showConfirmButton: false,
                            title: 'Error',
                            text: 'El vehículo no puede ser eliminado',
                            timer: 1000
                        });
                    }
                }
            });
        }
    });
}
