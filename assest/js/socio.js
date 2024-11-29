// Función para abrir el modal y cargar el formulario para registrar un nuevo socio
function MNuevoSocio(){
    $("#modal-default").modal("show");
  
    var obj = "";
    $.ajax({
       type: "POST",
       url: "vista/socio/FNuevoSocio.php",  // Este archivo contendría el formulario para crear un socio
       data: obj,
       success: function(data) {
           $("#content-default").html(data);
       }
    });
  }

  function regSocio(){
    var formData = new FormData($("#FRegSocio")[0]);
    
    $.ajax({
       type: "POST",
       url: "controlador/socioControlador.php?ctrRegSocio",
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       success: function(data) {

            
            if(data === "ok"){
                Swal.fire({
                    icon: 'success',
                    title: "Socio Registrado",
                    showConfirmButton: false,
                    timer: 1000
                });
  
                setTimeout(function(){
                    location.reload();
                }, 1200);
            } else {
                // Handle validation errors
                if (response.status === "error") {
                    Swal.fire({
                        title: "Error de Validación",
                        html: response.messages.join("<br>"),
                        icon: 'error'
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            }
        }
    });
}
  // Función para abrir el modal y cargar el formulario de edición de socio
  function MEditSocio(id){
    $("#modal-default").modal("show");
  
    var obj = "";
    $.ajax({
       type: "POST",
       url: "vista/socio/FEditSocio.php?id=" + id,  // Formulario para editar un socio
       data: obj,
       success: function(data) {
           $("#content-default").html(data);
       }
    });
  }
  
  // Función para editar el socio
  function editSocio(){
    var formData = new FormData($("#FEditSocio")[0]);
  
    $.ajax({
       type: "POST",
       url: "controlador/socioControlador.php?ctrEditSocio",  // Controlador para editar socios
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
       success: function(data) {
            if(data === "ok"){
                Swal.fire({
                    icon: 'success',
                    title: "Socio Actualizado",
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
  
  // Función para eliminar un socio
  function MEliSocio(id){
    var obj = { id: id };
  
    Swal.fire({
        title: "¿Estás seguro de eliminar este socio?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirmar',
        denyButtonText: 'Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                type: "POST",
                url: "controlador/socioControlador.php?ctrEliSocio",  // Controlador para eliminar socios
                data: obj,
                success: function(data) {
                    if(data === "ok"){
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            showConfirmButton: false,
                            title: 'Error',
                            text: 'El socio no puede ser eliminado',
                            timer: 1000
                        });
                    }
                }
            });
        }
    });
  }
  