<?php
$Mensualidad = ControladorMensualidad::ctrCantidadMensualidades();
$Socios = ControladorSocio::ctrCantidadSocios();
$rol = ControladorRol::ctrCantidadRoles();
$usuario = ControladorUsuario::ctrCantidadUsuarios();
$vehiculos = ControladorVehiculo::ctrCantidadVehiculos();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Panel de Administración</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Pagina Principal</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $Mensualidad["mensualidad"] ?></h3>
              <p>Mensualidads</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="VMensualidad" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $Socios["socios"] ?></h3>
              <p>Socios</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="VSocio" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $vehiculos["vehiculos"] ?></h3>
              <p>Vehiculos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="VVehiculo" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $rol["total_roles"] ?></h3>
              <p>rols Registrado</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="VRol" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $usuario["usuario"] ?></h3>
              <p>usuario Registrado</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="VUsuario" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </div><!-- /.container-fluid -->


    
  </div>
</div>