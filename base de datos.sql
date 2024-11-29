-- Create tables for the transportation management system

CREATE TABLE Sancion (
    id_sancion INT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion VARCHAR(100),
    costo INT
);

CREATE TABLE Socio (
    id_socio INT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    direccion VARCHAR(200),
    telefono VARCHAR(20),
    fecha_de_ingreso DATE,
    id_rol INT,
    estado VARCHAR(50),
    sexo VARCHAR(20),
    categoria_licencia VARCHAR(50)
);

CREATE TABLE Usuario (
    id_usuario INT PRIMARY KEY,
    usuario VARCHAR(100),
    password VARCHAR(100),
    id_socio INT,
    FOREIGN KEY (id_socio) REFERENCES Socio(id_socio)
);

CREATE TABLE Sancion_Socio (
    id_sancion_socio INT PRIMARY KEY,
    id_socio INT,
    id_sancion INT,
    fecha_fin DATE,
    fecha_inicio DATE,
    id_adm INT,
    FOREIGN KEY (id_socio) REFERENCES Socio(id_socio),
    FOREIGN KEY (id_sancion) REFERENCES Sancion(id_sancion),
    FOREIGN KEY (id_adm) REFERENCES Administrador(id_adm)
);

CREATE TABLE Administrador (
    id_adm INT PRIMARY KEY,
    id_socio INT,
    FOREIGN KEY (id_socio) REFERENCES Socio(id_socio)
);

CREATE TABLE Mensualidad (
    ID_Cuota INT PRIMARY KEY,
    Monto INT,
    Fecha_Pago DATE,
    Descripcion VARCHAR(200),
    id_adm INT,
    ID_Socio INT,
    Estado VARCHAR(50),
    FOREIGN KEY (id_adm) REFERENCES Administrador(id_adm),
    FOREIGN KEY (ID_Socio) REFERENCES Socio(id_socio)
);

CREATE TABLE Rol (
    id_rol INT PRIMARY KEY,
    nombre VARCHAR(100)
);

CREATE TABLE Vehiculo (
    ID_Vehiculo INT PRIMARY KEY,
    color VARCHAR(50),
    Marca VARCHAR(100),
    Capacidad INT,
    Estado VARCHAR(50),
    ID_Socio INT,
    Año VARCHAR(4),
    Placa VARCHAR(20),
    FOREIGN KEY (ID_Socio) REFERENCES Socio(id_socio)
);

CREATE TABLE Ruta (
    ID_Ruta INT PRIMARY KEY,
    Nombre_de_la_Ruta VARCHAR(200),
    Tarifa DECIMAL(10,2),
    Distancia INT,
    Descripción VARCHAR(200)
);

CREATE TABLE Salida_de_Oficina (
    ID_Salida INT PRIMARY KEY,
    Fecha DATE,
    Hora_de_salida TIME,
    Cantidad_de_pasajero INT,
    estado VARCHAR(50),
    ID_Vehiculo INT,
    ID_Ruta INT,
    FOREIGN KEY (ID_Vehiculo) REFERENCES Vehiculo(ID_Vehiculo),
    FOREIGN KEY (ID_Ruta) REFERENCES Ruta(ID_Ruta)
);

CREATE TABLE Ingreso (
    id_ingreso INT PRIMARY KEY,
    fecha DATE,
    descripcion VARCHAR(200),
    monto DECIMAL(10,2),
    id_socio INT,
    id_adm INT,
    FOREIGN KEY (id_socio) REFERENCES Socio(id_socio),
    FOREIGN KEY (id_adm) REFERENCES Administrador(id_adm)
);

CREATE TABLE Egreso (
    id_egreso INT PRIMARY KEY,
    descripcion VARCHAR(200),
    monto DECIMAL(10,2),
    id_socio INT,
    id_adm INT,
    fecha DATE,
    FOREIGN KEY (id_socio) REFERENCES Socio(id_socio),
    FOREIGN KEY (id_adm) REFERENCES Administrador(id_adm)
);

CREATE TABLE Caja (
    id_caja INT PRIMARY KEY,
    total_ingresos DECIMAL(10,2),
    total_egresos DECIMAL(10,2),
    saldo DECIMAL(10,2),
    fecha_actualizacion TIMESTAMP
);