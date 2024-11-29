<?php
require_once "conexion.php";
class ModeloUsuario
{
    static public function mdlAccesoUsuario($usuario)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlInfoUsuarios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlActualizarAcceso($fechaHora, $id)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET ultimo_login = :fechaHora WHERE id_usuario = :id");
        $stmt->bindParam(":fechaHora", $fechaHora, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlRegUsuario($data)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuario (usuario, password, rol) VALUES (:usuario, :password, :rol)");
        $stmt->bindParam(":usuario", $data["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlInfoUsuario($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlEditUsuario($data)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET password = :password, rol = :rol, estado_usuario = :estado WHERE id_usuario = :id");
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $data["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliUsuario($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM usuario WHERE id_usuario = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlCantidadUsuarios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as usuario FROM usuario");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}