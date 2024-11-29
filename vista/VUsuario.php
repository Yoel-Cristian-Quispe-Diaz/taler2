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
          <h3 class="card-title">Lista de usuarios registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Último acceso</th>
                <th>Fecha de registro</th>
                <td>
                  <button class="btn btn-primary" style="width: 100%;" onclick="MNuevoUsuario()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $usuarios = ControladorUsuario::ctrInfoUsuarios();
              foreach ($usuarios as $value) {
              ?>
                <tr>
                  <td><?php echo $value["id_usuario"]; ?></td>
                  <td><?php echo $value["usuario"]; ?></td>
                  <?php
                  $rol = ControladorRol::ctrInfoRol($value["rol"]);
                  ?>
                  <td>
                    <?php
                    // Verificar si el rol existe en el array de roles antes de imprimir
                    echo $rol["nombre"];
                    ?>
                  </td>
                  <td>
                    <?php if ($value["estado_usuario"] == 1) { ?>
                      <span class="badge badge-success">Activo</span>
                    <?php } else { ?>
                      <span class="badge badge-danger">Inactivo</span>
                    <?php } ?>
                  </td>
                  <td><?php echo $value["ultimo_login"]; ?></td>
                  <td><?php echo $value["fecha_registro"]; ?></td>
                  <td>
                    <center>
                      <div class="btn-group">
                        <!-- <button class="btn btn-info" onclick="MVerFactura(<?php echo $value["id_usuario"]; ?>)">
                        <i class="fas fa-eye"></i> -->
                        <button class="btn btn-success" onclick="MEditUsuario(<?php echo $value["id_usuario"]; ?>)">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger" onclick="MEliUsuario(<?php echo $value["id_usuario"]; ?>)">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                    </center>

                  </td>
                </tr>
              <?php } ?>
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