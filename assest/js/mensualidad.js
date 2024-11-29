
function MNuevaMensualidad(){
    $("#modal-default").modal("show");

    var obj = "";
    $.ajax({
       type: "POST",
       url: "vista/mensualidad/FNuevaMensualidad.php",
       data: obj,
       success: function(data) {
           $("#content-default").html(data);
       }
    });
}

function regMensualidad(){
    var formData = new FormData($("#FRegMensualidad")[0]);

    $.ajax({
       type: "POST",
       url: "controlador/mensualidadControlador.php?ctrRegMensualidad",
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       success: function(data) {
           if(data == "ok") {
               Swal.fire({
                   icon: 'success',
                   title: "Registro Exitoso",
                   showConfirmButton: false,
                   timer: 1000
               });

               setTimeout(function(){
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

function MEditMensualidad(id){
    $("#modal-default").modal("show");

    var obj = "";
    $.ajax({
       type: "POST",
       url: "vista/mensualidad/FEditMensualidad.php?id=" + id,
       data: obj,
       success: function(data) {
           $("#content-default").html(data);
       }
    });
}

function editMensualidad(){
    var formData = new FormData($("#FEditMensualidad")[0]);

    $.ajax({
       type: "POST",
       url: "controlador/mensualidadControlador.php?ctrEditMensualidad",
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       success: function(data) {
           if(data == "ok") {
               Swal.fire({
                   icon: 'success',
                   showConfirmButton: false,
                   title: "Mensualidad Actualizada",
                   timer: 1000
               });

               setTimeout(function(){
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

function MEliMensualidad(id){
    var obj = { id: id };

    Swal.fire({
        title: "¿Estás seguro de eliminar esta mensualidad?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirmar',
        denyButtonText: 'Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                type: "POST",
                url: "controlador/mensualidadControlador.php?ctrEliMensualidad",
                data: obj,
                success: function(data) {
                    if(data == "ok"){
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            showConfirmButton: false,
                            title: 'Error',
                            text: 'La mensualidad no puede ser eliminada',
                            timer: 1000
                        });
                    }
                }
            });
        }
    });
}
