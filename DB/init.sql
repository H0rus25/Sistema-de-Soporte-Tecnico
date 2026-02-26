USE soporte_tecnico;

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(100) NOT NULL,
    descripcion_falla TEXT NOT NULL,
    fecha_reporte DATETIME DEFAULT CURRENT_TIMESTAMP,
    resuelto BOOLEAN DEFAULT FALSE
);