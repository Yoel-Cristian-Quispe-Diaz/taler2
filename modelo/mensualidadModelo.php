<?php
require_once "conexion.php";

class ModeloMensualidad
{
    static public function mdlInfoMensualidades()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM mensualidad");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlRegMensualidad($data)
    {
        $monto = $data["monto"];
        $fecha_pago = $data["fecha_pago"];
        $descripcion = $data["descripcion"];
        $id_usuario = $data["id_usuario"];
        $id_socio = $data["id_socio"];

        $stmt = Conexion::conectar()->prepare("INSERT INTO mensualidad (monto, fecha_pago, descripcion, id_usuario, id_socio) VALUES ('$monto', '$fecha_pago', '$descripcion', '$id_usuario', '$id_socio')");
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlInfoMensualidad($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM mensualidad WHERE id_cuota=$id");
        $stmt->execute();
        $result = $stmt->fetch();

        return $result;
    }

    static public function mdlEditMensualidad($data)
    {
        $id_cuota = $data["id_cuota"];
        $monto = $data["monto"];
        $fecha_pago = $data["fecha_pago"];
        $descripcion = $data["descripcion"];
        $id_usuario = $data["id_usuario"];
        $id_socio = $data["id_socio"];
        $estado = $data["estado"];

        $stmt = Conexion::conectar()->prepare("UPDATE mensualidad SET monto='$monto', fecha_pago='$fecha_pago', descripcion='$descripcion', id_usuario='$id_usuario', id_socio='$id_socio', estado='$estado' WHERE id_cuota='$id_cuota'");
        
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliMensualidad($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM mensualidad WHERE id_cuota=$id");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlDatosMensualidad($idMensualidad)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM mensualidad WHERE id_cuota='$idMensualidad'");
        $stmt->execute();
        return $stmt->fetch();
    }
    
    static public function mdlCantidadMensualidades()
    {
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as mensualidad FROM mensualidad");
        $stmt->execute();
        return $stmt->fetch();
    }
}