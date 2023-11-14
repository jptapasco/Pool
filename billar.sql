-- Creación de la tabla CLIENTES
CREATE TABLE clientes (
    id_cliente VARCHAR(50) PRIMARY KEY,
    documento VARCHAR(50),
    nombres VARCHAR(50),
    telefono VARCHAR(50),
    horas_jugadas INT(50),
    horas_regalo INT(50)
);

-- Creación de la tabla USUARIOS
CREATE TABLE usuarios (
    id_usuario VARCHAR(10) PRIMARY KEY,
    documento VARCHAR(30),
    nombres VARCHAR(50),
    telefono VARCHAR(50),
    rol ENUM('admin', 'cajero', 'mesera'),
    correo VARCHAR(50),
    contrasena VARCHAR(50)
);

-- Creación de la tabla MESAS
CREATE TABLE mesas (
    id_mesa VARCHAR(50) PRIMARY KEY,
    tipo ENUM('billar', 'clientes')
);

-- Creación de la tabla PRODUCTOS
CREATE TABLE productos (
    id_producto VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(50),
    categoria ENUM('alcoholicas', 'no alcoholicas', 'snacks', 'bocadillos'),
    fecha_registro DATETIME,
    descripcion VARCHAR(100)
);

-- Creación de la tabla INVENTARIO
CREATE TABLE inventario (
    id_inventario VARCHAR(50) PRIMARY KEY,
    id_producto VARCHAR(50),
    unidad_medida ENUM('pack', 'canasta', 'unidad'),
    cantidad INT(100),
    punto_reorden INT(100),
    valor_compra FLOAT(10,2),
    valor_venta FLOAT(10,2),
    observaciones VARCHAR(100),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);

-- Creación de la tabla ASIGNACION_MESAS
CREATE TABLE asignacion_mesas (
    id_asignacion VARCHAR(50) PRIMARY KEY,
    id_usuario VARCHAR(10),
    id_mesa VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_mesa) REFERENCES mesas(id_mesa)
);


-- Creación de la tabla FACTURA
CREATE TABLE factura (
    id_factura VARCHAR(50) PRIMARY KEY
);

-- Creación de la tabla JUEGO
CREATE TABLE juego (
    id_juego VARCHAR(50) PRIMARY KEY,
    cliente VARCHAR(50),
    id_asignacion VARCHAR(50),
    hora_inicio DATETIME,
    hora_fin DATETIME,
    FOREIGN KEY (cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_asignacion) REFERENCES asignacion_mesas(id_asignacion)
);

CREATE TABLE consumos (
    id_consumo VARCHAR(50) PRIMARY KEY,
    id_asignacion VARCHAR(50),
    id_producto VARCHAR(50),
    cantidad INT(20),
    FOREIGN KEY (id_asignacion) REFERENCES asignacion_mesas(id_asignacion),
    FOREIGN KEY (id_producto) REFERENCES productos(id_producto)
);


-- Creación de la tabla DETALLE_FACTURA_JUEGO
CREATE TABLE detalle_factura_juego (
    id_detalle VARCHAR(50),
    id_factura VARCHAR(50),
    id_juego VARCHAR(50),
    id_consumo VARCHAR(50),
    PRIMARY KEY (id_detalle),
    FOREIGN KEY (id_factura) REFERENCES factura(id_factura),
    FOREIGN KEY (id_juego) REFERENCES juego(id_juego),
    FOREIGN KEY (id_consumo) REFERENCES consumos(id_consumo)
);

-- Creación de la tabla DETALLE_FACTURA_NORMAL
CREATE TABLE detalle_factura_normal (
    id_detalle VARCHAR(50),
    id_factura VARCHAR(50),
    id_consumo VARCHAR(50),
    PRIMARY KEY (id_detalle),
    FOREIGN KEY (id_factura) REFERENCES FACTURA(id_factura),
    FOREIGN KEY (id_consumo) REFERENCES consumos(id_consumo)
);


