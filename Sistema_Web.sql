DROP DATABASE IF EXISTS Sistema_Web;
CREATE DATABASE IF NOT EXISTS Sistema_Web;
USE Sistema_Web;

CREATE TABLE socios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    fecha_nacimiento DATE,
    genero CHAR(1),
    telefono CHAR(10),
    correo VARCHAR(100),
    contrasena VARCHAR(100),
    tag VARCHAR(20),
    foto VARCHAR(40),
    monedas DECIMAL(9,2)
);

CREATE TABLE plataformas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE consolas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_plataforma INT(11),
    numero INT(11),
    serial_consola VARCHAR(50),
    costo_renta DECIMAL(4,1),
    total_monedas INT(9),

    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE juegos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    imagen VARCHAR(50)
);

CREATE TABLE juegos_plataformas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_juego INT(11),
    id_plataforma INT(11),
    FOREIGN KEY (id_plataforma) REFERENCES plataformas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE juegos_consolas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_consola INT(11),
    id_juego INT(11),
    fecha DATE,
    FOREIGN KEY (id_consola) REFERENCES consolas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE torneos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    id_juego INT(11),
    fecha DATE,
    hora TIME,
    modalidad VARCHAR(50),
    forma VARCHAR(60),
    cantidad_jugadores INT(3),
    descripcion VARCHAR(255),
    estatus VARCHAR(30),
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE socio_torneo(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_torneo INT(11),
    id_socio INT(11),

    FOREIGN KEY (id_torneo) REFERENCES torneos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE equipos(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(100),
    creador INT(11),

    FOREIGN KEY (creador) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE equipo_gamers(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_equipo int(11),
    id_socio int(11),

    FOREIGN KEY (id_equipo) REFERENCES equipos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE equipo_torneo(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_torneo INT(11),
    id_equipo INT(11),

    FOREIGN KEY (id_torneo) REFERENCES torneos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_equipo) REFERENCES equipos(id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE rentas(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    hora TIME,
    id_consola INT(11),
    id_juego INT(11),
    id_socio INT(11),
    numero_horas INT(4),
    tipo_pago VARCHAR(20),
    FOREIGN KEY (id_consola) REFERENCES consolas(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_juego) REFERENCES juegos(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_socio) REFERENCES socios(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE accesorios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    descripcion VARCHAR(255),
    costo_renta DECIMAL(5,2)
);

CREATE TABLE renta_accesorios(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_renta INT(11),
    id_accesorio INT(11),
    numero_horas DECIMAL(5,2),
    FOREIGN KEY (id_accesorio) REFERENCES accesorios(id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_renta) REFERENCES rentas(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE dulces(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio DECIMAL(5,2),
    descripcion VARCHAR(255),
    total_monedas INT(9)

);

CREATE TABLE usuarios(
	usuario_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre varchar(100) NOT NULL,
	rol varchar(50) NOT NULL,
	correo varchar(50) NOT NULL,
	contrasena char(32) NOT NULL
);

INSERT INTO plataformas VALUES (1,'XBOX ONE');
INSERT INTO plataformas VALUES (2,'PS4');
INSERT INTO plataformas VALUES (3,'NINTENDO SWITCH');

INSERT INTO usuarios VALUES(1, "admin", "administrador", "admin@admin.com", MD5("admin") );
INSERT INTO socios VALUES(1, "gamer prueba", "2020-04-10", "M", '8341609881', 'gamer@gamer.com', MD5('gamer'), 'gamer1', null, 1000);