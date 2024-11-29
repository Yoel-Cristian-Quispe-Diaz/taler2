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
          <h3 class="card-title">Lista de roles registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre del Rol</th>
                <td>
                  <button class="btn btn-primary" style="width: 100%;" onclick="MNuevoRol()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $roles = ControladorRol::ctrInfoRoles();
              foreach ($roles as $value) {
              ?>
                <tr>
                  <td><?php echo $value["id_rol"]; ?></td>
                  <td><?php echo $value["nombre"]; ?></td>
                  <td>
                  <center>

                  <div class="btn-group">
                  <button class="btn btn-success" onclick="MEditRol(<?php echo $value["id_rol"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliRol(<?php echo $value["id_rol"]; ?>)">
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