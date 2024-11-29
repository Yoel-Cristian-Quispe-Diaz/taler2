<?php
require_once "conexion.php";
class ModeloRol
{
    static public function mdlInfoRoles()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM rol");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlRegRol($data)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO rol (nombre) VALUES (:nombre)");
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlInfoRol($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM rol WHERE id_rol = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static public function mdlEditRol($data)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE rol SET nombre = :nombre WHERE id_rol = :id");
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id_rol"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliRol($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM rol WHERE id_rol = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlCantidadRoles()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as total_roles FROM rol");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}