<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Mensualidades</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Cuota</th>
                <th>Monto</th>
                <th>Fecha de Pago</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Socio</th>
                <th>Estado</th>
                <td>
                  <button class="btn btn-primary" style="width: 100%;" onclick="MNuevaMensualidad()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $mensualidad = ControladorMensualidad::ctrInfoMensualidades();
              foreach ($mensualidad as $value) {
              ?>
                <tr>
                  <td> <?php echo $value["id_cuota"]; ?> </td>
                  <td> <?php echo $value["monto"]; ?> </td>
                  <td> <?php echo $value["fecha_pago"]; ?> </td>
                  <td> <?php echo $value["descripcion"]; ?> </td>

                  <?php
                  $usuario = ControladorUsuario::ctrInfoUsuario($value["id_usuario"]);
                  ?>
                  <td>
                    <?php
                    // Verificar si el usuario existe en el array de usuarios antes de imprimir
                    echo $usuario["usuario"]; // Cambia "usuario" por el campo que quieras mostrar, como "nombre"
                    ?>
                  </td>



                  <?php
                  $socio = ControladorSocio::ctrInfoSocio($value["id_socio"]);
                  ?>
                  <td>
                    <?php
                    // Verificar si el socio existe en el array de socios antes de imprimir
                    echo $socio["nombre"];
                    ?>
                  </td>

                  <td>
                    <?php
                    // Colorear estado según su valor
                    switch ($value["estado"]) {
                      case "1":
                        echo '<span class="badge badge-success">Pagado</span>';
                        break;
                      case "2":
                        echo '<span class="badge badge-warning">Pendiente</span>';
                        break;
                      case "3":
                        echo '<span class="badge badge-danger">Vencido</span>';
                        break;
                      default:
                        echo '<span class="badge badge-secondary">' . $value["estado"] . '</span>';
                    }
                    ?>
                  </td>

                  <td>
                    <center>
                      <div class="btn-group">
                        <!-- <button class="btn-info" onclick="MVerMensualidad(<?php echo $value["id_cuota"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button> -->

                        <button class="btn-success" onclick="MEditMensualidad(<?php echo $value["id_cuota"]; ?>)">
                          <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn-danger" onclick="MEliMensualidad(<?php echo $value["id_cuota"]; ?>)">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </center>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->