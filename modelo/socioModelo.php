<?php
require_once "conexion.php";

class ModeloSocio
{
    // Obtener información de todos los socios
    static public function mdlInfoSocios()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM socio");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlRegSocio($data)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO socio (nombre, apellido, direccion, telefono, fecha_de_ingreso, id_usuario, sexo, categoria_licencia) 
             VALUES (:nombre, :apellido, :direccion, :telefono, :fecha_de_ingreso, :id_usuario, :sexo, :categoria_licencia)"
        );

        $stmt->bindParam(":nombre", $data["nombre"]);
        $stmt->bindParam(":apellido", $data["apellido"]);
        $stmt->bindParam(":direccion", $data["direccion"]);
        $stmt->bindParam(":telefono", $data["telefono"]);
        $stmt->bindParam(":fecha_de_ingreso", $data["fecha_de_ingreso"]);
        $stmt->bindParam(":id_usuario", $data["id_usuario"]);
        $stmt->bindParam(":sexo", $data["sexo"]);
        $stmt->bindParam(":categoria_licencia", $data["categoria_licencia"]);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditSocio($data)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE socio 
             SET nombre = :nombre, 
                 apellido = :apellido, 
                 direccion = :direccion, 
                 telefono = :telefono, 
                 fecha_de_ingreso = :fecha_de_ingreso, 
                 id_usuario = :id_usuario, 
                 sexo = :sexo, 
                 categoria_licencia = :categoria_licencia
             WHERE id_socio = :id_socio"
        );

        $stmt->bindParam(":id_socio", $data["id_socio"]);
        $stmt->bindParam(":nombre", $data["nombre"]);
        $stmt->bindParam(":apellido", $data["apellido"]);
        $stmt->bindParam(":direccion", $data["direccion"]);
        $stmt->bindParam(":telefono", $data["telefono"]);
        $stmt->bindParam(":fecha_de_ingreso", $data["fecha_de_ingreso"]);
        $stmt->bindParam(":id_usuario", $data["id_usuario"]);
        $stmt->bindParam(":sexo", $data["sexo"]);
        $stmt->bindParam(":categoria_licencia", $data["categoria_licencia"]);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    // Obtener información de un socio por ID
    static public function mdlInfoSocio($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM socio WHERE id_socio = $id");
        $stmt->execute();
        return $stmt->fetch();
    }


    // Eliminar un socio
    static public function mdlEliSocio($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM socio WHERE id_socio = $id");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    // Obtener información específica de un socio
    static public function mdlDatosSocio($idSocio)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM socio WHERE id_socio = '$idSocio'");
        $stmt->execute();
        return $stmt->fetch();
    }

    // Contar la cantidad total de socios
    static public function mdlCantidadSocios()
    {
        $stmt = Conexion::conectar()->prepare("select COUNT(*) as socios from socio");

        $stmt->execute();
        return $stmt->fetch();
    }
}
