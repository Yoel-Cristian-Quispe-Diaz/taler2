// Función para abrir el modal y cargar el formulario para registrar un nuevo rol
function MNuevoRol(){
  $("#modal-default").modal("show");
 
  var obj="";
  $.ajax({
     type: "POST",
     url: "vista/rol/FNuevoRol.php",  // Este archivo contendría el formulario para crear un rol
     data: obj,
     success: function(data) {
         $("#content-default").html(data);
     }
  });
}

// Función para registrar un nuevo rol
function regRol(){
  var formData = new FormData($("#FRegRol")[0]);
  
  $.ajax({
     type: "POST",
     url: "controlador/rolControlador.php?ctrRegRol",  // Controlador para gestionar los roles
     data: formData,
     cache: false,
     contentType: false,
     processData: false,
     success: function(data) {
          if(data === "ok"){
              Swal.fire({
                  icon: 'success',
                  title: "Rol Registrado",
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

// Función para abrir el modal y cargar el formulario de edición de rol
function MEditRol(id){
  $("#modal-default").modal("show");
 
  var obj = "";
  $.ajax({
     type: "POST",
     url: "vista/rol/FEditRol.php?id=" + id,  // Formulario para editar un rol
     data: obj,
     success: function(data) {
         $("#content-default").html(data);
     }
  });
}

// Función para editar el rol
function editRol(){
  var formData = new FormData($("#FEditRol")[0]);

  $.ajax({
     type: "POST",
     url: "controlador/rolControlador.php?ctrEditRol",  // Controlador para editar roles
     data: formData,
     cache: false,
     contentType: false,
     processData: false,
     success: function(data) {
          if(data === "ok"){
              Swal.fire({
                  icon: 'success',
                  title: "Rol Actualizado",
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

// Función para eliminar un rol
function MEliRol(id){
  var obj = { id: id };

  Swal.fire({
      title: "¿Estás seguro de eliminar este rol?",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: 'Confirmar',
      denyButtonText: 'Cancelar'
  }).then((result) => {
      if(result.isConfirmed){
          $.ajax({
              type: "POST",
              url: "controlador/rolControlador.php?ctrEliRol",  // Controlador para eliminar roles
              data: obj,
              success: function(data) {
                  if(data === "ok"){
                      location.reload();
                  } else {
                      Swal.fire({
                          icon: 'error',
                          showConfirmButton: false,
                          title: 'Error',
                          text: 'El rol no puede ser eliminado',
                          timer: 1000
                      });
                  }
              }
          });
      }
  });
}
