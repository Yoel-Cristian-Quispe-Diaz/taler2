<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegSocio" ||
        $ruta["query"] == "ctrEditSocio" ||
        $ruta["query"] == "ctrDatosSocio" ||
        $ruta["query"] == "ctrEliSocio"
    ) {
        $metodo = $ruta["query"];
        $Socio = new ControladorSocio();
        $Socio->$metodo();
    }
}

class ControladorSocio
{
    static public function ctrInfoSocios()
    {
        $respuesta = ModeloSocio::mdlInfoSocios();
        return $respuesta;
    }

    static public function ctrRegSocio()
    {
        require "../modelo/socioModelo.php";
        
        
        $data = array(
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "direccion" => $_POST["direccion"],
            "telefono" => $_POST["telefono"],
            "fecha_de_ingreso" => $_POST["fecha_de_ingreso"],
            "id_usuario" => $_POST["id_usuario"],
            "sexo" => $_POST["sexo"],
            "categoria_licencia" => $_POST["categoria_licencia"]
        );
        
        $respuesta = ModeloSocio::mdlRegSocio($data);
        echo $respuesta;
    }


    static public function ctrInfoSocio($id)
    {
        $respuesta = ModeloSocio::mdlInfoSocio($id);
        return $respuesta;
    }

    static public function ctrEditSocio()
{
    require "../modelo/socioModelo.php";
    
    $data = array(
        "id_socio" => $_POST["id_socio"],
        "nombre" => $_POST["nombre"],
        "apellido" => $_POST["apellido"],
        "direccion" => $_POST["direccion"],
        "telefono" => $_POST["telefono"],
        "fecha_de_ingreso" => $_POST["fecha_de_ingreso"],
        "id_usuario" => $_POST["id_usuario"],
        "sexo" => $_POST["sexo"],
        "categoria_licencia" => $_POST["categoria_licencia"]
    );
    
    $respuesta = ModeloSocio::mdlEditSocio($data);
    echo $respuesta;
}

    static public function ctrEliSocio()
    {
        require "../modelo/socioModelo.php";
        $id = $_POST["id"];

        $respuesta = ModeloSocio::mdlEliSocio($id);
        echo $respuesta;
    }

    static public function ctrDatosSocio()
    {
        require "../modelo/socioModelo.php";
        $idSocio = $_POST["idSocio"];
        $respuesta = ModeloSocio::mdlDatosSocio($idSocio);
        echo json_encode($respuesta);
    }

    static public function ctrCantidadSocios()
    {
        $respuesta = ModeloSocio::mdlCantidadSocios();
        return $respuesta;
    }
}