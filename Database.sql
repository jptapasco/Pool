CREATE DATABASE billar;

USE billar;

CREATE TABLE clientes (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    documento VARCHAR(50),
    nombres VARCHAR(50),
    telefono VARCHAR(50),
    horas_jugadas INT(50),
    horas_regalo INT(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    documento VARCHAR(30),
    nombres VARCHAR(50),
    telefono VARCHAR(50),
    rol ENUM('admin', 'cajero', 'mesera'),
    correo VARCHAR(50),
    contrasena VARCHAR(50),
    estado ENUM('activo','inactivo');
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mesas (
    id_mesa INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('billar', 'clientes'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    categoria ENUM('alcoholicas', 'no alcoholicas', 'snacks', 'bocadillos'),
    fecha_registro DATETIME,
    descripcion VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inventario (
    id_inventario INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT,
    unidad_medida ENUM('pack', 'canasta', 'unidad'),
    cantidad INT(100),
    punto_reorden INT(100),
    valor_compra FLOAT(10,2),
    valor_venta FLOAT(10,2),
    observaciones VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

CREATE TABLE asignacion_mesas (
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_mesa INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_mesa) REFERENCES mesas(id_mesa)
);

CREATE TABLE factura (
    id_factura INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE juego (
    id_juego INT AUTO_INCREMENT PRIMARY KEY,
    cliente INT,
    id_asignacion INT,
    hora_inicio DATETIME,
    hora_fin DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_asignacion) REFERENCES asignacion_mesas(id_asignacion)
);

CREATE TABLE consumos (
    id_consumo INT AUTO_INCREMENT PRIMARY KEY,
    id_asignacion INT,
    id_producto INT,
    cantidad INT(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_asignacion) REFERENCES asignacion_mesas(id_asignacion),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

CREATE TABLE detalle_factura_juego (
    id_detalle_factura_juego INT AUTO_INCREMENT,
    id_factura INT,
    id_juego INT,
    id_consumo INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_detalle_factura_juego),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura),
    FOREIGN KEY (id_juego) REFERENCES juego(id_juego),
    FOREIGN KEY (id_consumo) REFERENCES consumos(id_consumo)
);

CREATE TABLE detalle_factura_normal (
    id_detalle_factura_normal INT AUTO_INCREMENT,
    id_factura INT,
    id_consumo INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_detalle_factura_normal),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura),
    FOREIGN KEY (id_consumo) REFERENCES consumos(id_consumo)
);
