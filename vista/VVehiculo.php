<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid"></div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Vehículos</h3>
        </div>

        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID Vehículo</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Capacidad</th>
                <th>Socio</th>
                <th>Año</th>
                <th>Placa</th>
                <th>Estado</th>

                <th>
                  <button class="btn btn-primary" onclick="MNuevoVehiculo()">Nuevo</button>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php
              $vehiculos = ControladorVehiculo::ctrInfoVehiculos();
              foreach ($vehiculos as $value) {
              ?>
                <tr>
                  <td><?php echo $value["id_vehiculo"]; ?></td>
                  <td><?php echo $value["color"]; ?></td>
                  <td><?php echo $value["marca"]; ?></td>
                  <td><?php echo $value["capacidad"]; ?></td>
                  <?php
                  $socio = ControladorSocio::ctrInfoSocio($value["id_socio"]);
                  ?>
                  <td>
                    <?php
                    echo $socio["nombre"];
                    ?>
                  </td>

                  <td><?php echo $value["anio"]; ?></td>
                  <td><?php echo $value["placa"]; ?></td>
                  <td>
                    <?php if ($value["estado"] == 1) { ?>
                      <span class="badge badge-success">Activo</span>
                    <?php } else { ?>
                      <span class="badge badge-danger">Inactivo</span>
                    <?php } ?>
                  </td>

                  <td>
                    <center>
                      <div class="btn-group">
                        <!-- <button class="btn-info" onclick="MVerVehiculo(<?php echo $value['id_vehiculo']; ?>)">
                          <i class="fas fa-eye"></i>
                        </button> -->
                        <button class="btn-success" onclick="MEditVehiculo(<?php echo $value['id_vehiculo']; ?>)">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-danger" onclick="MEliVehiculo(<?php echo $value['id_vehiculo']; ?>)">
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
      </div>
    </div>
  </div>
</div>