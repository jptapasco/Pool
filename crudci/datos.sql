CREATE DATABASE datos;
USE datos;

CREATE TABLE productos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(200),
    costo FLOAT(10,2) NOT NULL,
    precio FLOAT(10,2) NOT NULL,
    cantidad INT(10)
) ENGINE = InnoDB DEFAULT CHARSET =utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO productos (nombre, descripcion, costo, precio, cantidad)
VALUES
    ('Jabón de manos', 'Jabón líquido para lavar las manos', 500, 2700, 100),
    ('Champú', 'Champú para el cabello', 5000, 23500, 80),
    ('Papel higiénico', 'Rollo de papel higiénico', 400, 2000, 200),
    ('Cepillo de dientes', 'Cepillo con cerdas suaves', 3000, 11000, 150),
    ('Toallas de papel', 'Toallas de papel multiusos', 2800, 8500, 120);