<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegUsuario" ||
        $ruta["query"] == "ctrEditUsuario" ||
        $ruta["query"] == "ctrEliUsuario"
    ) {
        $metodo = $ruta["query"];
        $usuario = new ControladorUsuario();
        $usuario->$metodo();
    }
}

class ControladorUsuario
{
    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["usuario"])) {
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $resultado = ModeloUsuario::mdlAccesoUsuario($usuario);
            
            if ($resultado == false) {
                echo "Este usuario no existe";
            } else {
                if ($resultado["usuario"] == $usuario && 
                    password_verify($password, $resultado["password"]) == true && 
                    $resultado["rol"] == 1 && 
                    $resultado["estado_usuario"] == 1) {
                    
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["idUsuario"] = $resultado["id_usuario"];
                    $_SESSION["ingreso"] = "ok";

                    date_default_timezone_set("America/La_Paz");
                    $fechaHora = date("Y-m-d H:i:s");
                    $id = $resultado["id_usuario"];

                    $ultimoLogin = ModeloUsuario::mdlActualizarAcceso($fechaHora, $id);

                    if ($ultimoLogin == "ok") {
                        echo '<script> window.location="inicio";  </script>';
                    }
                } else {
                    if (password_verify($password, $resultado["password"]) == false) {
                        echo "Contraseña incorrecta";
                    } else {
                        if ($resultado["estado_usuario"] == 0) {
                            echo "Usuario inactivo";
                        }
                    }
                }
            }
        }
    }

    static public function ctrInfoUsuarios()
    {
        $respuesta = ModeloUsuario::mdlInfoUsuarios();
        return $respuesta;
    }

    static public function ctrRegUsuario()
    {
        require "../modelo/usuarioModelo.php";
        
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $data = array(
            "usuario" => $_POST["usuario"],
            "password" => $password,
            "rol" => 2 // Default rol as Moderador
        );
        
        $respuesta = ModeloUsuario::mdlRegUsuario($data);
        echo $respuesta;
    }

    static public function ctrInfoUsuario($id)
    {
        $respuesta = ModeloUsuario::mdlInfoUsuario($id);
        return $respuesta;
    }

    static function ctrEditUsuario()
    {
        require "../modelo/usuarioModelo.php";

        if ($_POST["password"] == $_POST["passActual"]) {
            $password = $_POST["password"];
        } else {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        $data = array(
            "password" => $password,
            "id" => $_POST["idUsuario"],
            "rol" => $_POST["rol"],
            "estado" => $_POST["estado"]
        );

        $respuesta = ModeloUsuario::mdlEditUsuario($data);
        echo $respuesta;
    }

    static function ctrEliUsuario()
    {
        require "../modelo/usuarioModelo.php";
        $id = $_POST["id"];

        $respuesta = ModeloUsuario::mdlEliUsuario($id);
        echo $respuesta;
    }

    static public function ctrCantidadUsuarios()
    {
        $respuesta = ModeloUsuario::mdlCantidadUsuarios();
        return $respuesta;
    }
}