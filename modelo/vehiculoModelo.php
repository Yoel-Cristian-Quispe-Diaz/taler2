<?php
require_once "conexion.php";

class ModeloVehiculo
{
    static public function mdlInfoVehiculos()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM vehiculo");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function mdlInfoVehiculo($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM vehiculo WHERE id_vehiculo = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Asegúrate de que devuelva un solo resultado
    }
    
    static public function mdlRegVehiculo($data)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO vehiculo (color, marca, capacidad, id_socio, anio, placa) 
             VALUES (:color, :marca, :capacidad, :id_socio, :anio, :placa)"
        );
        $stmt->bindParam(":color", $data["color"]);
        $stmt->bindParam(":marca", $data["marca"]);
        $stmt->bindParam(":capacidad", $data["capacidad"]);
        $stmt->bindParam(":id_socio", $data["id_socio"]);
        $stmt->bindParam(":anio", $data["anio"]);
        $stmt->bindParam(":placa", $data["placa"]);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEditVehiculo($data)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE vehiculo 
             SET color = :color, marca = :marca, capacidad = :capacidad, estado = :estado, 
                 id_socio = :id_socio, anio = :anio, placa = :placa 
             WHERE id_vehiculo = :id_vehiculo"
        );
        $stmt->bindParam(":id_vehiculo", $data["id_vehiculo"]);
        $stmt->bindParam(":color", $data["color"]);
        $stmt->bindParam(":marca", $data["marca"]);
        $stmt->bindParam(":capacidad", $data["capacidad"]);
        $stmt->bindParam(":estado", $data["estado"]);
        $stmt->bindParam(":id_socio", $data["id_socio"]);
        $stmt->bindParam(":anio", $data["anio"]);
        $stmt->bindParam(":placa", $data["placa"]);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlEliVehiculo($id)
    {
        if (!is_numeric($id) || $id <= 0) return "error"; // Validación básica del ID
    
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM vehiculo WHERE id_vehiculo = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            return ($stmt->execute()) ? "ok" : "error"; // Retorna "ok" si la eliminación fue exitosa, sino "error"
        } catch (PDOException $e) {
            return "error"; // Retorna "error" en caso de una excepción
        }
    }
    

    static public function mdlDatosVehiculo($idVehiculo)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM vehiculo WHERE id_vehiculo = :id_vehiculo");
        $stmt->bindParam(":id_vehiculo", $idVehiculo);
        $stmt->execute();
        return $stmt->fetch();
    }
    // Contar la cantidad total de vehículos
static public function mdlCantidadVehiculos()
{
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as vehiculos FROM vehiculo");
    $stmt->execute();
    return $stmt->fetch();
}

}
