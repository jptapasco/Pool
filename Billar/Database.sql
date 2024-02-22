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
    estado ENUM('activo','inactivo'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mesa(
    id_mesa INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('pool','tres_bandas','mesa_clientes','caja'),
    created_at TIMESTAMP
);

CREATE TABLE productos(
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    categoria ENUM('alcoholicas','no_alcoholicas','comida','snacks'),
    unidad_medida ENUM('unidad','paquete','canasta'),
    cantidad INT,
    punto_reorden INT,
    precio_compra FLOAT(10,2),
    valor_venta FLOAT(10,2),
    observaciones VARCHAR(200),
    created_at TIMESTAMP
);

CREATE TABLE asignacion(
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_mesa INT,
    created_at TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_mesa) REFERENCES mesa(id_mesa)
);

CREATE TABLE juego(
    id_juego INT AUTO_INCREMENT PRIMARY KEY,
    cliente INT,
    asignacion INT,
    hora_inicio TIMESTAMP,
    hora_fin DATETIME,
    FOREIGN KEY (cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (asignacion) REFERENCES asignacion(id_asignacion)
);

CREATE TABLE consumo(
    id_consumo INT AUTO_INCREMENT PRIMARY KEY,
    asignacion INT,
    producto INT,
    cantidad INT,
    subtotal FLOAT(10,2),
    created_at TIMESTAMP,
    FOREIGN KEY (asignacion) REFERENCES asignacion(id_asignacion),
    FOREIGN KEY (producto) REFERENCES productos(id_producto)
);

CREATE TABLE factura(
    id_factura INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP
);


CREATE TABLE factura_juego(
    id_factura_juego INT AUTO_INCREMENT PRIMARY KEY,
    id_juego INT,
    id_factura INT,
    total FLOAT(10,2),
    created_at DATETIME,
    FOREIGN KEY (id_juego) REFERENCES juego(id_juego),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura)
);


CREATE TABLE factura_normal(
    id_factura_normal INT AUTO_INCREMENT PRIMARY KEY,
    consumo INT,
    id_factura INT,
    FOREIGN KEY (consumo) REFERENCES consumo(id_consumo),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura)
);

INSERT INTO clientes (documento, nombres, telefono, horas_jugadas, horas_regalo) VALUES
('101', 'Juan Perez', '555-1234', 10, 2),
('102', 'Maria Rodriguez', '555-5678', 5, 1),
('103', 'Pedro Gomez', '555-9876', 8, 0),
('104', 'Ana Martinez', '555-4321', 12, 3),
('105', 'Luis Hernandez', '555-8765', 15, 5);


INSERT INTO usuarios (documento, nombres, telefono, rol, correo, contrasena, estado) VALUES
('111', 'JP', '3136320559', 'admin', 'jp@gmail.com.com', '123', 'activo'),
('222', 'erick', '555-2222', 'cajero', 'erick@gmail.com', '123', 'activo'),
('333', 'Franchesca', '555-3333', 'mesera', 'ms@gmail.com', '123', 'activo'),
('444', 'Usuario Inactivo', '555-4444', 'mesera', 'voce@gmail.com', 'inactivo123', 'inactivo'),
('555', 'Usuario Activo', '555-5555', 'mesera', 'activo@example.com', 'activo123', 'activo');


INSERT INTO mesa (tipo) VALUES
('pool'),
('tres_bandas'),
('mesa_clientes'),
('caja');


INSERT INTO productos (nombre, categoria, unidad_medida, cantidad, punto_reorden, precio_compra, valor_venta, observaciones) VALUES
('Cerveza', 'alcoholicas', 'unidad', 100, 20, 1.5, 3.0, 'Promoción 2x1'),
('Pepsi', 'no_alcoholicas', 'paquete', 50, 10, 0.8, 1.5, 'Sin azúcar'),
('Hamburguesa', 'comida', 'unidad', 30, 5, 2.5, 5.0, 'Con queso'),
('Papas Fritas', 'snacks', 'canasta', 20, 5, 1.0, 2.0, 'Tamaño grande');

