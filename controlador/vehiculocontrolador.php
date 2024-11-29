<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegVehiculo" ||
        $ruta["query"] == "ctrEditVehiculo" ||
        $ruta["query"] == "ctrDatosVehiculo" ||
        $ruta["query"] == "ctrEliVehiculo"
    ) {
        $metodo = $ruta["query"];
        $Vehiculo = new ControladorVehiculo();
        $Vehiculo->$metodo();
    }
}

class ControladorVehiculo
{
    static public function ctrInfoVehiculos()
    {
        $respuesta = ModeloVehiculo::mdlInfoVehiculos();
        return $respuesta;
    }

    static public function ctrInfoVehiculo($id)
    {
        $respuesta = ModeloVehiculo::mdlInfoVehiculo($id);
        return $respuesta;
    }
    

    static public function ctrRegVehiculo()
    {
        require "../modelo/vehiculoModelo.php";
        $data = array(
            "color" => $_POST["color"],
            "marca" => $_POST["marca"],
            "capacidad" => $_POST["capacidad"],
            "id_socio" => $_POST["id_socio"],
            "anio" => $_POST["anio"],
            "placa" => $_POST["placa"]
        );
        $respuesta = ModeloVehiculo::mdlRegVehiculo($data);
        echo $respuesta;
    }

    static public function ctrEditVehiculo()
    {
        require "../modelo/vehiculoModelo.php";
        $data = array(
            "id_vehiculo" => $_POST["id_vehiculo"],
            "color" => $_POST["color"],
            "marca" => $_POST["marca"],
            "capacidad" => $_POST["capacidad"],
            "estado" => $_POST["estado"],
            "id_socio" => $_POST["id_socio"],
            "anio" => $_POST["anio"],
            "placa" => $_POST["placa"]
        );
        $respuesta = ModeloVehiculo::mdlEditVehiculo($data);
        echo $respuesta;
    }

    static public function ctrEliVehiculo()
    {
        require "../modelo/vehiculoModelo.php";
        $id = $_POST["id"];

        $respuesta = ModeloVehiculo::mdlEliVehiculo($id);
        echo $respuesta;
    }

    static public function ctrDatosVehiculo()
    {
        require "../modelo/vehiculoModelo.php";
        $idVehiculo = $_POST["idVehiculo"];
        $respuesta = ModeloVehiculo::mdlDatosVehiculo($idVehiculo);
        echo json_encode($respuesta);
    }
    static public function ctrCantidadVehiculos()
    {
        $respuesta = ModeloVehiculo::mdlCantidadVehiculos();
        return $respuesta;
    }
}
