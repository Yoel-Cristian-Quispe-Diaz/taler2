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
          <h3 class="card-title">Lista de Socios</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>ID Usuario</th>
                <th>Sexo</th>
                <td>
                  <button class="btn btn-primary" style="width: 100%;" onclick="MNuevoSocio()">Nuevo</button>
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              // Obtener información de los socios desde el controlador
              $socios = ControladorSocio::ctrInfoSocios();
              foreach ($socios as $socio) {
              ?>
                <tr>
                  <td onclick="MVerSocio(<?php echo $socio['id_socio']; ?>)">
                    <?php echo $socio['id_socio']; ?>
                  </td>
                  <td><?php echo $socio['nombre']; ?></td>
                  <td><?php echo $socio['apellido']; ?></td>
                  <td><?php echo $socio['direccion']; ?></td>
                  <td><?php echo $socio['telefono']; ?></td>
                  <td><?php echo $socio['id_usuario']; ?></td>
                  <td><?php echo $socio['sexo']; ?></td>
                  <td>
                    <div class="btn-group">
                      <!-- <button class="btn btn-info" onclick="MVerSocio(<?php echo $socio['id_socio']; ?>)">
                        <i class="fas fa-eye"></i>
                      </button> -->
                      <button class="btn btn-success" onclick="MEditSocio(<?php echo $socio['id_socio']; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliSocio(<?php echo $socio['id_socio']; ?>)">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
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
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
