<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegMensualidad" ||
        $ruta["query"] == "ctrEditMensualidad" ||
        $ruta["query"] == "ctrDatosMensualidad" ||
        $ruta["query"] == "ctrEliMensualidad"
    ) {
        $metodo = $ruta["query"];
        $Mensualidad = new ControladorMensualidad();
        $Mensualidad->$metodo();
    }
}

class ControladorMensualidad
{
    static public function ctrInfoMensualidades()
    {
        $respuesta = ModeloMensualidad::mdlInfoMensualidades();
        return $respuesta;
    }

    static public function ctrRegMensualidad()
    {
        require "../modelo/mensualidadModelo.php";
        $data = array(
            "monto" => $_POST["monto"],
            "fecha_pago" => $_POST["fecha_pago"],
            "descripcion" => $_POST["descripcion"],
            "id_usuario" => $_POST["id_usuario"],
            "id_socio" => $_POST["id_socio"]
        );
        $respuesta = ModeloMensualidad::mdlRegMensualidad($data);
        echo $respuesta;
    }

    static public function ctrInfoMensualidad($id)
    {
        $respuesta = ModeloMensualidad::mdlInfoMensualidad($id);
        return $respuesta;
    }

    static public function ctrEditMensualidad()
    {
        require "../modelo/mensualidadModelo.php";
        $data = array(
            "id_cuota" => $_POST["id_cuota"],
            "monto" => $_POST["monto"],
            "fecha_pago" => $_POST["fecha_pago"],
            "descripcion" => $_POST["descripcion"],
            "id_usuario" => $_POST["id_usuario"],
            "id_socio" => $_POST["id_socio"],
            "estado" => $_POST["estado"]
        );
        $respuesta = ModeloMensualidad::mdlEditMensualidad($data);
        echo $respuesta;
    }

    static public function ctrEliMensualidad()
    {
        require "../modelo/mensualidadModelo.php";
        $id = $_POST["id"];

        $respuesta = ModeloMensualidad::mdlEliMensualidad($id);
        echo $respuesta;
    }

    static public function ctrDatosMensualidad()
    {
        require "../modelo/mensualidadModelo.php";
        $idMensualidad = $_POST["idMensualidad"];
        $respuesta = ModeloMensualidad::mdlDatosMensualidad($idMensualidad);
        echo json_encode($respuesta);
    }

    static public function ctrCantidadMensualidades()
    {
        $respuesta = ModeloMensualidad::mdlCantidadMensualidades();
        return $respuesta;
    }
}