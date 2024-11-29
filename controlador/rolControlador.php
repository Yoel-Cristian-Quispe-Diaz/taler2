<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegRol" ||
        $ruta["query"] == "ctrEditRol" ||
        $ruta["query"] == "ctrEliRol"
    ) {
        $metodo = $ruta["query"];
        $Rol = new ControladorRol();
        $Rol->$metodo();
    }
}

class ControladorRol
{
    static public function ctrInfoRoles()
    {
        $respuesta = ModeloRol::mdlInfoRoles();
        return $respuesta;
    }

    static public function ctrRegRol()
    {
        require "../modelo/rolModelo.php";

        $data = array(
            "nombre" => $_POST["nombre"]
        );

        $respuesta = ModeloRol::mdlRegRol($data);
        echo $respuesta;
    }

    static public function ctrInfoRol($id)
    {
        $respuesta = ModeloRol::mdlInfoRol($id);
        return $respuesta;
    }

    static public function ctrEditRol()
    {
        require "../modelo/rolModelo.php";

        $data = array(
            "id_rol" => $_POST["id_rol"],
            "nombre" => $_POST["nombre"]
        );

        $respuesta = ModeloRol::mdlEditRol($data);
        echo $respuesta;
    }

    static public function ctrEliRol()
    {
        require "../modelo/rolModelo.php";
        $id = $_POST["id"];

        $respuesta = ModeloRol::mdlEliRol($id);
        echo $respuesta;
    }

    static public function ctrCantidadRoles()
    {
        $respuesta = ModeloRol::mdlCantidadRoles();
        return $respuesta;
    }
}